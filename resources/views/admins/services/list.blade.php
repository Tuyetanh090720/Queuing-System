@extends('layouts.admins')
@section('service-list')
<div class="container-fluid">
    <div class="services">
        <div class="container-block">
            <span class="title-page">Danh sách dịch vụ</span>
            <div class="filter-block">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm 6">
                        <div class="select">
                            <div class="dropdown">
                                <div class="dropdown-block form-group">
                                    <label for="serviceActiveST">Trạng thái hoạt động</label>
                                    <input type="text" id="serviceActiveST" placeholder="Tất cả" readonly>
                                    <div class="option serviceActiveST">
                                        <div class="option-item active" onclick="chooseOption('serviceActiveST', 0)">Tất cả</div>
                                        <div class="option-item" onclick="chooseOption('serviceActiveST', 1)">Hoạt động</div>
                                        <div class="option-item" onclick="chooseOption('serviceActiveST', 2)">Ngưng hoạt động</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
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
                @include('admins/services/table')
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

                        $('.serviceActiveST .option-item').on('click', function() {
                            $value = $(this).val();
                            getMore();
                        });
                    });

                    function getMore(page) {
                        var search = $('#keywords').val();

                        var serviceActiveST = $('#serviceActiveST').val();

                        $.ajax({
                            type: "GET",
                            data: {
                                'keywords':search,
                                'serviceActiveST': serviceActiveST,
                            },
                            url: "{{ route('admins.services.getMore') }}"+ "?page=" + page,
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
                <a href="{{route('admins.services.add')}}">
                    <i class="fa fa-square-plus"></i>
                    <br/>
                    Thêm dịch vụ
                </a>
            </button>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection
