@extends('layouts.admins')
@section('device-list')
<div class="container-fluid">
    <div class="devices">
        <div class="container-block">
            <span class="title-page">Danh sách thiết bị</span>
            <div class="filter-block">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm 6">
                        <div class="select">
                            <div class="dropdown">
                                <div class="dropdown-block form-group">
                                    <label for="active-status">Trạng thái hoạt động</label>
                                    <input type="text" id="active-status" placeholder="Tất cả" readonly>
                                    <div class="option active-status">
                                        <div class="option-item active" onclick="chooseOption('active-status', 0)">Tất cả</div>
                                        <div class="option-item" onclick="chooseOption('active-status', 1)">Hoạt động</div>
                                        <div class="option-item" onclick="chooseOption('active-status', 2)">Ngưng hoạt động</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm 6">
                        <div class="select">
                            <div class="dropdown">
                                <div class="dropdown-block form-group">
                                    <label for="connected-status">Trạng thái kết nối</label>
                                    <input type="text" id="connected-status" placeholder="Tất cả" readonly>
                                    <div class="option connected-status">
                                        <div class="option-item active" onclick="chooseOption('connected-status', 0)">Tất cả</div>
                                        <div class="option-item" onclick="chooseOption('connected-status', 1)">Kết nối</div>
                                        <div class="option-item" onclick="chooseOption('connected-status', 2)">Ngưng kết nối</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm 6">
                        <div class="form-group">
                            <form action=""></form>
                            <label>Từ khóa</label>
                            <div class="search">
                                <input type="text" required="required" name="Title"  class="form-control" id="txtTitle" placeholder="Tiêu đề">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive" id="pagination-ajax">
                @include('admins/devices/table')
                <script>
                    $(document).ready(function() {
                        $(document).on('click', '.pagination a', function(event) {
                            event.preventDefault();
                            var page = $(this).attr('href').split('page=')[1];
                            getMore(page);
                        });
                    });

                    function getMore(page) {
                        var search = $('#keywords').val();

                        var accountActiveST = $('#accountActiveST').val();

                        $.ajax({
                            type: "GET",
                            url: "{{ route('admins.device_types.getMore') }}"+ "?page=" + page,
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
                <a href="{{route('admins.devices.add')}}">
                    <i class="fa fa-square-plus"></i>
                    <br/>
                    Thêm thiết bị
                </a>
            </button>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection
