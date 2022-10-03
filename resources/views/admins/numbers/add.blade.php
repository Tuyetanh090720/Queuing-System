@extends('layouts.admins')
@section('number-add')
<div class="container-fluid">
    <span class="title-page">Quản lý dịch vụ</span>
    <div class="container-white">
        <div class="number-add">
            <span class="title-center">Cấp số mới</span><br/>
            <span class="span-center">Dịch vụ khách lựa chọn</span>
            <div class="dropdown">
                <div class="dropdown-block form-group">
                    <label for="service-name"></label>
                    <input type="text" id="active-status" placeholder="Tất cả" readonly>
                    <div class="option active-status">
                        <div class="option-item active" onclick="chooseOption('active-status', 0)">Tất cả</div>
                        <div class="option-item" onclick="chooseOption('active-status', 1)">Hoạt động</div>
                        <div class="option-item" onclick="chooseOption('active-status', 2)">Ngưng hoạt động</div>
                    </div>
                </div>
            </div>
            <div class="input-group-btn">
                <button class="btn btn-cancel">
                    <a href="">Hủy</a>
                </button>
                <button class="btn btn-login" id="popup">
                    <a>In số</a>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="popup-block container-fluid">
    <div class="pop-up">
        <i class="fa fa-xmark" id="fa-xmark"></i>
        <div class="content-popup">
            <span class="title-popup">Số thứ tự được cấp</span>
            <span class="number-popup">2222222</span><br/>
            <span class="service-popup">2222222</span><br/>
        </div>
        <div class="time-popup">
            <span>Thời gian cấp: 09:30 11/10/2021</span><br/>
            <span>Thời gian cấp: 09:30 11/10/2021</span>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
<script src='{{asset('assets/admins/js/popup.js')}}'></script>

@endsection
