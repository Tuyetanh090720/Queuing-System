@extends('layouts.admins')
@section('account-list')
<div class="container-fluid">
    <div class="accounts">
        <div class="container-block">
            <span class="title-page">Danh sách tài khoản</span>
            <div class="filter-block">
                <div class="row justify-content-sb">
                    <div class="col-lg-4 col-md-4 col-sm 6">
                        <div class="select">
                            <div class="dropdown">
                                <div class="dropdown-block form-group">
                                    <label for="accountActiveST">Trạng thái hoạt động</label>
                                    <input type="text" id="accountActiveST" value="" readonly>
                                    <div class="option accountActiveST">
                                        <div class="option-item active" onclick="chooseOption('accountActiveST', 0)">Tất cả</div>
                                        <div class="option-item" onclick="chooseOption('accountActiveST', 1)">Hoạt động</div>
                                        <div class="option-item" onclick="chooseOption('accountActiveST', 2)">Ngưng hoạt động</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm 6">
                        <div class="form-group">
                            <label>Từ khóa</label>
                            <div class="search">
                                <input type="text" required="required" class="form-control" id="keywords" value="{{request()->keywords}}" placeholder="Từ khóa">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive" id="pagination-ajax">
                @include('admins.accounts.table')
                <script>
                    $(document).ready(function() {
                        $(document).on('click', '.pagination a', function(event) {
                            event.preventDefault();
                            var page = $(this).attr('href').split('page=')[1];
                            getMore(page);
                        });

                        $('#keywords').on('keyup', function() {
                            $value = $(this).val();
                            getMore();
                        });

                        $('.accountActiveST .option-item').on('click', function() {
                            $value = $(this).val();
                            getMore();
                        });
                    });

                    function getMore(page) {
                        var search = $('#keywords').val();

                        var accountActiveST = $('#accountActiveST').val();

                        $.ajax({
                            type: "GET",
                            data: {
                                'keywords':search,
                                'accountActiveST': accountActiveST,
                            },
                            url: "{{ route('admins.accounts.getMore') }}"+ "?page=" + page,
                            success:function(data) {
                            $('#pagination-ajax').html(data);
                            }
                        });
                    }
                </script>
            </div>
        </div>
        <div class="btn-control">
            <button>
                <a href="{{route('admins.accounts.add')}}">
                    <i class="fa fa-square-plus"></i>
                    <br/>
                    Thêm tài khoản
                </a>
            </button>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection

