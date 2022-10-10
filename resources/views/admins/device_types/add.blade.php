@extends('layouts.admins')
@section('device-type-add')
<div class="container-fluid">
    <span class="title-page">Quản lý loại thiết bị</span>
    <div class="container-white">
        <div class="device-type-add">
            <span class="title-add">Thông tin loại thiết bị</span>
            <form method="POST" action="/admins/device_types/add">
                @csrf
                <div class="form-group">
                    <label for="deviceTypeName">Tên thiết bị</label>
                    <input type="text" class="form-control" name="deviceTypeName" required>
                </div>
                <div class="error-required">
                    <i class="fa fa-star-of-life"></i>
                    <span>Là trường thông tin bắt buộc</span>
                </div>
                <div class="input-group-btn">
                    <button class="btn btn-cancel">
                        <a href="/admins/device_types/list">Hủy</a>
                    </button>
                    <button class="btn btn-login" type="submit">
                        Thêm loại thiết bị
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection
