@extends('layouts.admins')
@section('account-list')
<div class="container-fluid">
    <div class="accounts">
        <div class="container-block">
            <span class="title-page">Danh sách dịch vụ</span>
            <div class="filter-block">
                <div class="row justify-content-sb">
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
                            <th>Tên đăng nhập</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Trạng thái hoạt động</th>
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
                            <td><i class="fa fa-circle" style="color: #34CD26"></i> Hoạt động</td>
                            <td style="text-align: center;">
                                <a href="/admins/accounts/edit/1">Cập nhật
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
                            <td>192.168.1.10</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #34CD26"></i> Hoạt động</td>
                            </td>
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
                            <td>192.168.1.10</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #EC3740"></i> Ngưng hoạt động</td>
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
