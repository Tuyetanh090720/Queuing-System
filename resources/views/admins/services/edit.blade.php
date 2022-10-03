@extends('layouts.admins')
@section('service-edit')
<div class="container-fluid">
    <span class="title-page">Quản lý thiết bị</span>
    <div class="container-white">
        <div class="service-add">
            <span class="title-add">Thông tin dịch vụ</span>
            <form action="">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                        <div class="form-group">
                            <label for="serviceId">Mã dịch vụ</label>
                            <input type="text" class="form-control" name="serviceId" required>
                        </div>
                        <div class="form-group">
                            <label for="serviceName">Tên dịch vụ</label>
                            <input type="text" class="form-control" name="serviceId" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="password">Mô tả</label>
                            <textarea name="service-description" class="form-control" cols="30" rows="6"></textarea>
                        </div>
                    </div>
                </div>
                <span class="title-add">Quy tắc cấp số</span>
                <div class="checkbox-group">
                    <input type="checkbox" name="service" required>
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
                    <input type="checkbox" name="service" required>
                    <label for="service">Prefix:</label>
                    <div class="numb-block">
                        <span>001</span>
                    </div>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" name="service" required>
                    <label for="service">Surfix:</label>
                    <div class="numb-block">
                        <span>001</span>
                    </div>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" name="service" required>
                    <label for="service">Reset mỗi ngày</label>
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
                        <a href="">Cập nhật</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
<script src='{{asset('assets/admins/js/input-tag.js')}}'></script>
@endsection
