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
                        <span>KIO_01</span>
                    </div>
                    <div class="detail-group">
                        <label>Tên dịch vụ: </label>
                        <span>KIO_01</span>
                    </div>
                    <div class="detail-group">
                        <label>Mô tả: </label>
                        <span>KIO_01</span>
                    </div>
                    <span class="title-add">Quy tắc cấp số</span>
                    <div class="checkbox-group">
                        <label for="service">Tăng tự động từ:</label>
                        <div class="numb-block">
                            <span>001</span>
                        </div>
                        <span>đến</span>
                        <div class="numb-block">
                            <span>999</span>
                        </div>
                    </div>
                    <div class="checkbox-group">
                        <label for="service">Prefix:</label>
                        <div class="numb-block">
                            <span>001</span>
                        </div>
                    </div>
                    <div class="checkbox-group">
                        <label for="service">Surfix:</label>
                        <div class="numb-block">
                            <span>001</span>
                        </div>
                    </div>
                    <div class="checkbox-group">
                        <label for="service">Reset mỗi ngày</label>
                    </div>
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
                            <div class="form-group">
                                <label>Chọn thời gian</label>
                                <div class="filter-time">
                                    <input type="text" name="start-at"  class="form-control"  placeholder="10/10/1995" required>
                                    <i class="fa fa-caret-right"></i>
                                    <input type="text" name="start-at"  class="form-control"  placeholder="10/10/1995" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm 6">
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
                                <th>Mã dịch vụ</th>
                                <th>Tên dịch vụ</th>
                                <th>Mô tả</th>
                                <th>Trạng thái hoạt động</th>
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
                                <td style="text-align: center;">
                                    <a href="/admins/services/detail/1">Chi tiết
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <a href="/admins/services/edit/1">Cập nhật
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>KIO_01</td>
                                <td>Kiosk</td>
                                <td>192.168.1.10</td>
                                <td><i class="fa fa-circle" style="color: #EC3740"></i> Ngưng hoạt động</td>
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
        </div>
    </div>
    <div class="btn-control">
        <button>
            <a href="/admins/services/edit/1">
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
