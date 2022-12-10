@extends('layouts.admins')
@section('device-detail')
<div class="container-fluid">
    <span class="title-page">Quản lý loại thiết bị</span>
    <div class="container-block">
        <div class="container-white">
            <div class="device-detail">
                <span class="title-add">Thông tin loại thiết bị</span>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                        <div class="detail-group">
                            <label>Mã thiết bị: </label>
                            <span>KIO_01</span>
                        </div>
                        <div class="detail-group">
                            <label>Tên thiết bị: </label>
                            <span>KIO_01</span>
                        </div>
                        <div class="detail-group">
                            <label>Địa chỉ IP: </label>
                            <span>KIO_01</span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                        <div class="detail-group">
                            <label>Loại thiết bị: </label>
                            <span>KIO_01</span>
                        </div>
                        <div class="detail-group">
                            <label>Tên đăng nhập: </label>
                            <span>KIO_01</span>
                        </div>
                        <div class="detail-group">
                            <label>Mật khẩu: </label>
                            <span>KIO_01</span>
                        </div>
                    </div>
                </div>
                <div class="detail-group">
                    <label>Dịch vụ sử dụng: </label>
                    <span>KIO_01</span>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-control">
        <button>
            <a href="/admins/devices/edit/1">
                <i class="fa fa-square-pen"></i>
                <br/>
                Cập nhật thiết bị
            </a>
        </button>
    </div>
</div>
@endsection
