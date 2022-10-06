@extends('layouts.admins')
@section('device-add')
<div class="container-fluid">
    <span class="title-page">Quản lý thiết bị</span>
    <div class="container-white">
        <div class="device-add">
            <span class="title-add">Thông tin thiết bị</span>
            <form action="">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                        <div class="form-group">
                            <label for="deviceId">Mã thiết bị</label>
                            <input type="text" class="form-control" name="deviceId" required>
                        </div>
                        <div class="form-group">
                            <label for="deviceName">Tên thiết bị</label>
                            <input type="text" class="form-control" name="deviceId" required>
                        </div>
                        <div class="form-group">
                            <label for="addressIp">Địa chỉ IP</label>
                            <input type="text" class="form-control" name="addressIp" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="select-input">
                            <div class="dropdown">
                                <div class="form-group">
                                    <label for="deviceType">Trạng thái hoạt động</label>
                                    <input type="text" id="deviceType" placeholder="Tất cả" readonly>
                                    <div class="option deviceType">
                                        <div class="option-item active" onclick="chooseOption('deviceType', 0)">Tất cả</div>
                                        <div class="option-item" onclick="chooseOption('deviceType', 1)">Hoạt động</div>
                                        <div class="option-item" onclick="chooseOption('deviceType', 2)">Ngưng hoạt động</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="loginname">Tên đăng nhập</label>
                            <input type="text" class="form-control" name="loginname" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="text" class="form-control" name="password" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="service">Dịch vụ sử dụng</label>
                    <input type="text" class="form-control" name="service" required>
                </div>
                <div class="error-required">
                    <i class="fa fa-star-of-life"></i>
                    <span>Là trường thông tin bắt buộc</span>
                </div>
                <div class="input-group-btn">
                    <button class="btn btn-cancel">
                        <a href="">Hủy</a>
                    </button>
                    <button class="btn btn-login">
                        <a href="">Thêm thiết bị</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection