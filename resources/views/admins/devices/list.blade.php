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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã thiết bị</th>
                            <th>Tên thiết bị</th>
                            <th>Địa chỉ IP</th>
                            <th>Trạng thái hoạt động</th>
                            <th>Trạng thái kết nối</th>
                            <th>Dịch vụ sử dụng</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #34CD26"></i> Hoạt động</td>
                            <td><i class="fa fa-circle" style="color: #34CD26"></i> Kết nối</td>
                            <td>
                                <div style="width: 200px;">
                                    <p class="text-overflow">Khám tim mạch, Khám Sản - Phụ khoa, Khám răng hàm mặt,
                                        Khám tai mũi họng, Khám hô hấp, Khám tổng quát</p>
                                    <a href="">Xem thêm</a>
                                    <div class="full-content">
                                        <span>Khám tim mạch, Khám Sản - Phụ khoa, Khám răng hàm mặt,
                                                Khám tai mũi họng, Khám hô hấp, Khám tổng quát</span>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align: center;">
                                <a href="/admins/devices/detail/1">Chi tiết
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                            <td style="text-align: center;">
                                <a href="/admins/devices/edit/1">Cập nhật
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #EC3740"></i> Ngưng hoạt động</td>
                            <td><i class="fa fa-circle" style="color: #EC3740"></i> Mất kết nối</td>
                            <td>
                                <div style="width: 200px;">
                                    <p class="text-overflow">Khám tim mạch, Khám Sản - Phụ khoa, Khám răng hàm mặt,
                                        Khám tai mũi họng, Khám hô hấp, Khám tổng quát</p>
                                    <a href="">Xem thêm</a>
                                    <div class="full-content">
                                        <span>Khám tim mạch, Khám Sản - Phụ khoa, Khám răng hàm mặt,
                                                Khám tai mũi họng, Khám hô hấp, Khám tổng quát</span>
                                    </div>
                                </div>
                            </td>
                            </td>
                            <td style="text-align: center;">
                                <a href="">Chi tiết
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                            <td style="text-align: center;">
                                <a href="">Cập nhật
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #34CD26"></i> Hoạt động</td>
                            <td><i class="fa fa-circle" style="color: #34CD26"></i> Kết nối</td>
                            <td>
                                <div style="width: 200px;">
                                    <p class="text-overflow">Khám tim mạch, Khám Sản - Phụ khoa, Khám răng hàm mặt,
                                        Khám tai mũi họng, Khám hô hấp, Khám tổng quát</p>
                                    <a href="">Xem thêm</a>
                                    <div class="full-content">
                                        <span>Khám tim mạch, Khám Sản - Phụ khoa, Khám răng hàm mặt,
                                                Khám tai mũi họng, Khám hô hấp, Khám tổng quát</span>
                                    </div>
                                </div>
                            </td>
                            </td>
                            <td style="text-align: center;">
                                <a href="">Chi tiết
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                            <td style="text-align: center;">
                                <a href="">Cập nhật
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #EC3740"></i> Ngưng hoạt động</td>
                            <td><i class="fa fa-circle" style="color: #EC3740"></i> Mất kết nối</td>
                            <td>
                                <div style="width: 200px;">
                                    <p class="text-overflow">Khám tim mạch, Khám Sản - Phụ khoa, Khám răng hàm mặt,
                                        Khám tai mũi họng, Khám hô hấp, Khám tổng quát</p>
                                    <a href="">Xem thêm</a>
                                    <div class="full-content">
                                        <span>Khám tim mạch, Khám Sản - Phụ khoa, Khám răng hàm mặt,
                                                Khám tai mũi họng, Khám hô hấp, Khám tổng quát</span>
                                    </div>
                                </div>
                            </td>
                            </td>
                            <td style="text-align: center;">
                                <a href="">Chi tiết
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                            <td style="text-align: center;">
                                <a href="">Cập nhật
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
