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
                                    <label for="service-name">Tên dịch vụ</label>
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
                    <div class="col-lg-2 col-md-2 col-sm 6">
                        <div class="select">
                            <div class="dropdown">
                                <div class="dropdown-block form-group">
                                    <label for="service-name">Tên dịch vụ</label>
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
                    <div class="col-lg-2 col-md-2 col-sm 6">
                        <div class="select">
                            <div class="dropdown">
                                <div class="dropdown-block form-group">
                                    <label for="service-name">Tên dịch vụ</label>
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
                    <div class="col-lg-3 col-md-3 col-sm 6">
                        <div class="form-group">
                            <label>Chọn thời gian</label>
                            <div class="filter-time">
                                <input type="text" name="start-at"  class="form-control"  placeholder="10/10/1995" required>
                                <i class="fa fa-caret-right"></i>
                                <input type="text" name="start-at"  class="form-control"  placeholder="10/10/1995" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm 6">
                        <div class="form-group">
                            <label>Từ khóa</label>
                            <div class="search">
                                <input type="text" required="required" name="Title"  class="form-control" id="txtTitle" placeholder="Tiêu đề">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên khách hàng</th>
                            <th>Tên dịch vụ</th>
                            <th>Thời gian cấp</th>
                            <th>Hạn sử dụng</th>
                            <th>Trạng thái</th>
                            <th>Nguồn cấp</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td>192.168.1.10</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #4277FF"></i> Đang chờ</td>
                            <td>192.168.1.10</td>
                            <td style="text-align: center;">
                                <a href="/admins/numbers/detail/1">Chi tiết
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td>192.168.1.10</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #EC3740"></i> Ngưng hoạt động</td>
                            </td>
                            <td>192.168.1.10</td>
                            <td style="text-align: center;">
                                <a href="">Chi tiết
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td>192.168.1.10</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #7E7D88"></i> Đã sử dụng</td>
                            </td>
                            <td>192.168.1.10</td>
                            <td style="text-align: center;">
                                <a href="">Chi tiết
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td>192.168.1.10</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #EC3740"></i> Bỏ qua</td>
                            </td>
                            <td>192.168.1.10</td>
                            <td style="text-align: center;">
                                <a href="">Chi tiết
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
