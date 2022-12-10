@extends('layouts.admins')
@section('number-add')
<div class="container-fluid">
    <span class="title-page">Quản lý cấp số</span>
    <div class="container-white">
        <span class="title-center">Cấp số mới</span><br/>
        <form method="POST" action="/admins/numbers/add">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                    <div class="form-group">
                        <label for="customerName">Tên khách hàng</label>
                        <input type="text" class="form-control" name="customerName" required>
                    </div>
                    <div class="form-group">
                        <label for="customerCCCD">CCCD</label>
                        <input type="text" class="form-control" name="customerCCCD" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="customerPhone">Số điện thoại</label>
                        <input type="text" class="form-control" name="customerPhone" required>
                    </div>
                    <div class="form-group">
                        <label for="customerEmail">Email</label>
                        <input type="text" class="form-control" name="customerEmail" required>
                    </div>
                </div>
            </div>
            <div class="select" style="width: 100%">
                <div class="dropdown">
                    <div class="dropdown-block form-group">
                        <label for="serviceName">Dịch vụ khách lựa chọn</label>
                        <input type="text" id="serviceName" name="serviceName" placeholder="Tất cả" readonly>
                        <div class="option serviceName">
                            @foreach ($servicesList as $item)
                                <div class="option-item" onclick="chooseOption('serviceName', {{$i++}})">{{$item->serviceName}}</div>
                            @endforeach
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
                    <a href="/admins/numbers/list">Hủy</a>
                </button>
                <button class="btn btn-login" type="submit">
                    In số
                </button>
            </div>
        </form>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
<script src='{{asset('assets/admins/js/popup.js')}}'></script>

@endsection
