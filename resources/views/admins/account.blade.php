@extends('layouts.admins')
@section('account')
<div class="container-fluid">
    <div class="account-block row">
        <div class="avatar-block col-lg-3 col-md-6 col-sm-6">
            <div class="avatar">
                <div class="avatar-img"><img src="{{asset('assets/admins/img/avatar.jpg')}}" alt=""></div>
                <div class="camera"><i class="fa fa-camera"></i></div>
            </div>
            <span>Lê Thị Thu Thuy</span>
        </div>
        <div class="account-information col-lg-9 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="username">Tên người dùng</label>
                <input type="text" class="form-control" name="username" id="username" readonly>
            </div>
            <div class="form-group">
                <label for="loginname">Tên đăng nhập</label>
                <input type="text" class="form-control" name="loginname" value="" id="loginname" readonly>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" value="" id="phone" readonly>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="text" class="form-control" name="password" value="" id="password" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="" id="email" readonly>
            </div>
            <div class="form-group">
                <label for="type">Vai trò</label>
                <input type="text" class="form-control" name="type" value="" id="type" readonly>
            </div>
        </div>
    </div>


</div>
@endsection
