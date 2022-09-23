@extends('layouts.admins')
@section('account')
<div class="container-fluid">
    <div class="account-block row">
        <div class=" col-lg-3 col-md-3 col-sm-6">
            <div class="avatar">
                <img src="{{asset('assets/admins/img/avatar.jpg')}}" alt="">
            </div>
            <div class="camera"><i class="fa fa-camera"></i></div>
            <span>Lê Thị Thu Thuy</span>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-6">
            <div class="form-group">
                <label for="username">Tên người dùng</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="loginname">Tên đăng nhập</label>
                <input type="text" class="form-control" name="loginname" value="" id="loginname">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" value="" id="phone">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="text" class="form-control" name="password" value="" id="password">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="" id="email">
            </div>
            <div class="form-group">
                <label for="type">Vai trò</label>
                <input type="text" class="form-control" name="type" value="" id="type">
            </div>
        </div>
    </div>
</div>
@endsection
