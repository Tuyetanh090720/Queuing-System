@extends('layouts.admins')
@section('account')
<div class="container-fluid">
    <div class="account-white row">
        <div class="avatar-block col-lg-3 col-md-6 col-sm-6">
            <div class="avatar">
                <div class="avatar-img"><img src="{{asset('assets/admins/img/avatar.jpg')}}" alt=""></div>
                <div class="camera"><i class="fa fa-camera"></i></div>
            </div>
            <span>{{$item->accountName}}</span>
        </div>
        <div class="account-information col-lg-9 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="accountName">Tên người dùng</label>
                <input type="text" class="form-control" name="accountName" value="{{$item->accountName}}" id="accountName" readonly>
            </div>
            <div class="form-group">
                <label for="accountLogin">Tên đăng nhập</label>
                <input type="text" class="form-control" name="accountLogin" value="{{$item->accountLogin}}" id="accountLogin" readonly>
            </div>
            <div class="form-group">
                <label for="accountPhone">Số điện thoại</label>
                <input type="text" class="form-control" name="accountPhone" value="{{$item->accountPhone}}" id="accountPhone" readonly>
            </div>
            <div class="form-group">
                <label for="accountPw">Mật khẩu</label>
                <input type="text" class="form-control" name="accountPw" value="{{$item->accountPw}}" id="accountPw" readonly>
            </div>
            <div class="form-group">
                <label for="accountEmail">Email</label>
                <input type="text" class="form-control" name="accountEmail" value="{{$item->accountEmail}}" id="accountEmail" readonly>
            </div>
            <div class="form-group">
                <label for="rightName">Vai trò</label>
                <input type="text" class="form-control" name="rightName" value="{{$right->rightname}}" id="rightName" readonly>
            </div>
        </div>
    </div>
</div>
@endsection
