@extends('layouts.admins')
@section('number-list')
<div class="container-fluid">
    <div class="numbers">
        <div class="container-block">
            <span class="title-page">Danh sách dịch vụ</span>
            <div class="filter-block">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm 6">
                        <div class="select">
                            <div class="dropdown">
                                <div class="dropdown-block form-group">
                                    <label for="serviceName">Tên dịch vụ</label>
                                    <input type="text" id="serviceName" placeholder="Tất cả" readonly>
                                    <div class="option serviceName">
                                        <div class="option-item active" onclick="chooseOption('serviceName', 0)">Tất cả</div>
                                        @foreach ($servicesList as $item)
                                            <div class="option-item" onclick="chooseOption('serviceName', {{$i++}})">{{$item->serviceName}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm 6">
                        <div class="select">
                            <div class="dropdown">
                                <div class="dropdown-block form-group">
                                    <label for="numberST">Tình trạng<label>
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
                    <div class="col-lg-2 col-md-2 col-sm 6">
                        <div class="select">
                            <div class="dropdown">
                                <div class="dropdown-block form-group">
                                    <label for="numberSupply">Nguồn cấp</label>
                                    <input type="text" id="numberSupply" placeholder="Tất cả" readonly>
                                    <div class="option numberSupply">
                                        <div class="option-item active" onclick="chooseOption('numberSupply', 0)">Tất cả</div>
                                        <div class="option-item" onclick="chooseOption('numberSupply', 1)">Hệ thống</div>
                                        <div class="option-item" onclick="chooseOption('numberSupply', 2)">Kiosk</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm 6">
                        <div class="form-group">
                            <label>Chọn thời gian</label>
                            <div class="filter-time">
                                <input type="text" name="created_at" id="created_at" class="form-control"  placeholder="10/10/1995" required>
                                <i class="fa fa-caret-right"></i>
                                <input type="text" name="numberExpiry" id="numberExpiry" class="form-control"  placeholder="10/10/1995" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm 6">
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
                @include('admins/numbers/table')
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

                        $('.serviceName .option-item').on('click', function() {
                            $value = $(this).val();
                            getMore();
                        });

                        $('.numberST .option-item').on('click', function() {
                            $value = $(this).val();
                            getMore();
                        });

                        $('.numberSupply .option-item').on('click', function() {
                            $value = $(this).val();
                            getMore();
                        });

                        $('#created_at').on('keyup', function() {
                            $value = $(this).val();
                            getMore();
                        });

                        $('#numberExpiry').on('keyup', function() {
                            $value = $(this).val();
                            getMore();
                        });
                    });

                    function getMore(page) {
                        var search = $('#keywords').val();

                        var serviceName = $('#serviceName').val();

                        var numberST = $('#numberST').val();

                        var numberSupply = $('#numberSupply').val();

                        var created_at = $('#created_at').val();

                        var numberExpiry = $('#numberExpiry').val();

                        $.ajax({
                            type: "GET",
                            data: {
                                'keywords':search,
                                'serviceName': serviceName,
                                'numberST': numberST,
                                'numberSupply': numberSupply,
                                'created_at': created_at,
                                'numberExpiry': numberExpiry,
                            },
                            url: "{{ route('admins.numbers.getMore') }}"+ "?page=" + page,
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
                <a href="{{route('admins.numbers.add')}}">
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
