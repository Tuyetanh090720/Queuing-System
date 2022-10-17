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
                                    <label for="deviceActiveST">Trạng thái hoạt động</label>
                                    <input type="text" id="deviceActiveST" value="" readonly>
                                    <div class="option deviceActiveST">
                                        <div class="option-item active" onclick="chooseOption('deviceActiveST', 0)">Tất cả</div>
                                        <div class="option-item" onclick="chooseOption('deviceActiveST', 1)">Hoạt động</div>
                                        <div class="option-item" onclick="chooseOption('deviceActiveST', 2)">Ngưng hoạt động</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm 6">
                        <div class="select">
                            <div class="dropdown">
                                <div class="dropdown-block form-group">
                                    <label for="deviceConnectST">Trạng thái kết nối</label>
                                    <input type="text" id="deviceConnectST" placeholder="Tất cả" readonly>
                                    <div class="option deviceConnectST">
                                        <div class="option-item active" onclick="chooseOption('deviceConnectST', 0)">Tất cả</div>
                                        <div class="option-item" onclick="chooseOption('deviceConnectST', 1)">Kết nối</div>
                                        <div class="option-item" onclick="chooseOption('deviceConnectST', 2)">Ngưng kết nối</div>
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
                                <input type="text" required="required" class="form-control" id="keywords" value="{{request()->keywords}}" placeholder="Từ khóa">
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

                        $('#keywords').on('keyup', function() {
                            $value = $(this).val();
                            getMore();
                        });

                        $('.deviceActiveST .option-item').on('click', function() {
                            $value = $(this).val();
                            getMore();
                        });

                        $('.deviceConnectST .option-item').on('click', function() {
                            $value = $(this).val();
                            getMore();
                        });
                    });

                    function getMore(page) {
                        var search = $('#keywords').val();

                        var deviceActiveST = $('#deviceActiveST').val();

                        var deviceConnectST = $('#deviceConnectST').val();

                        $.ajax({
                            type: "GET",
                            data: {
                                'keywords':search,
                                'deviceActiveST': deviceActiveST,
                                'deviceConnectST': deviceConnectST
                            },
                            url: "{{ route('admins.devices.getMore') }}"+ "?page=" + page,
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
