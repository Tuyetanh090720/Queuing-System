@extends('layouts.admins')
@section('device-add')
<div class="container-fluid">
    <span class="title-page">Quản lý thiết bị</span>
    <div class="container-white">
        <div class="device-add">
            <span class="title-add">Thông tin thiết bị</span>
            <form method="POST" action="/admins/devices/add">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                        <div class="form-group">
                            <label for="deviceId">Mã thiết bị</label>
                            <input type="text" class="form-control" name="deviceId" required>
                        </div>
                        <div class="form-group">
                            <label for="deviceName">Tên thiết bị</label>
                            <input type="text" class="form-control" name="deviceName" required>
                        </div>
                        <div class="form-group">
                            <label for="deviceAddressIp">Địa chỉ IP</label>
                            <input type="text" class="form-control" name="deviceAddressIp" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="select-input">
                            <div class="dropdown">
                                <div class="form-group">
                                    <label for="deviceActiveST">Trạng thái hoạt động</label>
                                    <input type="text" id="deviceActiveST" name="deviceActiveST" placeholder="Tất cả" readonly>
                                    <div class="option deviceActiveST">
                                        <div class="option-item active" onclick="chooseOption('deviceActiveST', 0)">Tất cả</div>
                                        <div class="option-item" onclick="chooseOption('deviceActiveST', 1)">Hoạt động</div>
                                        <div class="option-item" onclick="chooseOption('deviceActiveST', 2)">Ngưng hoạt động</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="select-input">
                            <div class="dropdown">
                                <div class="form-group">
                                    <label for="deviceConnectST">Trạng thái kết nối</label>
                                    <input type="text" id="deviceConnectST" name="deviceConnectST" placeholder="Tất cả" readonly>
                                    <div class="option deviceConnectST">
                                        <div class="option-item active" onclick="chooseOption('deviceConnectST', 0)">Tất cả</div>
                                        <div class="option-item" onclick="chooseOption('deviceConnectST', 1)">Kết nối</div>
                                        <div class="option-item" onclick="chooseOption('deviceConnectST', 2)">Ngưng kết nối</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="service">Dịch vụ sử dụng</label>
                    <div class="input-tag">
                        <div class="select-input">
                            <div class="dropdown">
                                <div class="form-group">
                                    <ul id="ul-input-tag">
                                    </ul>
                                    <input type="hidden" class="form-control" name="serviceName" id="input-tag">
                                    <div class="option serviceName">
                                        @foreach ($servicesList as $item)
                                            <div class="option-item" onclick="addTag('serviceName', {{$index++}})">{{$item->serviceName}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="error-required">
                    <i class="fa fa-star-of-life"></i>
                    <span>Là trường thông tin bắt buộc</span>
                </div>
                <div class="input-group-btn">
                    <button class="btn btn-cancel">
                        <a href="/admins/devices/list">Hủy</a>
                    </button>
                    <button class="btn btn-login" type="submit">
                        Thêm thiết bị
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
<script src='{{asset('assets/admins/js/input-tag.js')}}'></script>
@endsection
