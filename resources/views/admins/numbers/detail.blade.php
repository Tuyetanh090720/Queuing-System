@extends('layouts.admins')
@section('number-detail')
<div class="container-fluid">
    <span class="title-page">Quản lý dịch vụ</span>
    <div class="container-block">
        <div class="container-white">
            <span class="title-add">Thông tin dịch vụ</span>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                    <div class="detail-group">
                        <label>Họ tên: </label>
                        <span>{{$numberDetail->customerName}}</span>
                    </div>
                    <div class="detail-group">
                        <label>Tên dịch vụ: </label>
                        <span>{{$numberDetail->serviceName}}</span>
                    </div>
                    <div class="detail-group">
                        <label>Số thứ tự: </label>
                        <span>{{$numberDetail->numberSerial}}</span>
                    </div>
                    <div class="detail-group">
                        <label>Thời gian cấp: </label>
                        <span>{{$numberDetail->created_at}}</span>
                    </div>
                    <div class="detail-group">
                        <label>Hạn sử dụng: </label>
                        <span>{{$numberDetail->numberExpiry}}</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                    <div class="detail-group">
                        <label>Nguồn cấp: </label>
                        <span>{{$numberDetail->numberSupply}}</span>
                    </div>
                    <div class="detail-group">
                        <label>Trạng thái: </label>
                        <span>{{$numberDetail->numberST}}</span>
                    </div>
                    <div class="detail-group">
                        <label>Số điện thoại: </label>
                        <span>{{$numberDetail->customerPhone}}</span>
                    </div>
                    <div class="detail-group">
                        <label>Địa chỉ Email: </label>
                        <span>{{$numberDetail->customerEmail}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-control">
        <button>
            <a href="/admins/numbers/list">
                <i class="fa fa-hand-point-left"></i>
                <br/>
                Quay lại
            </a>
        </button>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection
