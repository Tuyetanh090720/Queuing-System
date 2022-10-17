@extends('layouts.admins')
@section('service-detail')
<div class="container-fluid">
    <span class="title-page">Quản lý dịch vụ</span>
    <div class="container-block">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="container-white detail-left-block">
                    <span class="title-add">Thông tin dịch vụ</span>
                    <div class="detail-group">
                        <label>Mã dịch vụ: </label>
                        <span>{{$service->serviceCode}}</span>
                    </div>
                    <div class="detail-group">
                        <label>Tên dịch vụ: </label>
                        <span>{{$service->serviceName}}</span>
                    </div>
                    <div class="detail-group">
                        <label>Mô tả: </label>
                        <span>{{$service->serviceDescription}}</span>
                    </div>
                    <span class="title-add">Quy tắc cấp số</span>
                    @foreach ($serviceRuleNumber as $item)
                        @if ($item == 'increment')
                            <div class="checkbox-group">
                                <label for="increment">Tăng tự động từ:</label>
                                <div class="numb-block">
                                    <span>001</span>
                                </div>
                                <span>đến</span>
                                <div class="numb-block">
                                    <span>999</span>
                                </div>
                            </div>
                        @endif
                        @if ($item == 'prefix')
                            <div class="checkbox-group">
                                <label for="prefix">Prefix:</label>
                                <div class="numb-block">
                                    <span>001</span>
                                </div>
                            </div>
                        @endif
                        @if ($item == 'surfix')
                            <div class="checkbox-group">
                                <label for="surfix">Surfix:</label>
                                <div class="numb-block">
                                    <span>001</span>
                                </div>
                            </div>
                        @endif
                        @if ($item == 'reset')
                            <div class="checkbox-group">
                                <label for="reset">Reset mỗi ngày</label>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="container-white col-lg-7 col-md-7 col-sm-7">
                <span class="title-page">Danh sách dịch vụ</span>
                <div class="filter-block">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm 6">
                            <div class="select">
                                <div class="dropdown">
                                    <div class="dropdown-block form-group">
                                        <label for="numberST">Trạng thái</label>
                                        <input type="text" id="numberST" placeholder="Tất cả" readonly>
                                        <div class="option numberST">
                                            <div class="option-item active" onclick="chooseOption('numberST', 0)">Tất cả</div>
                                            <div class="option-item" onclick="chooseOption('numberST', 1)">Đã hoàn thành</div>
                                            <div class="option-item" onclick="chooseOption('numberST', 2)">Đang thực hiện</div>
                                            <div class="option-item" onclick="chooseOption('numberST', 3)">Vắng</div>
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
                <div class="table-responsive"  id="pagination-ajax">
                    @include('admins/services/table-detail')
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

                            $('.numberST .option-item').on('click', function() {
                                $value = $(this).val();
                                getMore();
                            });
                        });

                        function getMore(page) {
                            var search = $('#keywords').val();

                            var numberST = $('#numberST').val();

                            $.ajax({
                                type: "GET",
                                data: {
                                    'keywords':search,
                                    'numberST': numberST,
                                },
                                url: "/admins/services/getMoreDetail/{{$service->serviceId}}"+"?page=" + page,
                                success:function(data) {
                                    $('#pagination-ajax').html(data);
                                }
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-control">
        <button>
            <a href="/admins/services/edit/{{$service->serviceId}}">
                <i class="fa fa-square-pen"></i>
                <br/>
                Cập nhật danh sách
            </a>
        </button>
        <button>
            <a href="/admins/services/list">
                <i class="fa fa-hand-point-left"></i>
                <br/>
                Quay lại
            </a>
        </button>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection
