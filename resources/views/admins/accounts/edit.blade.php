@extends('layouts.admins')
@section('account-edit')
<div class="container-fluid">
    <span class="title-page">Quản lý tài khoản</span>
    <div class="container-white">
        <div class="account-edit">
            <span class="title-add">Thông tin tài khoản</span>
            <form method="POST" action="/admins/accounts/edit/{{$account->accountId}}">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                        <div class="form-group">
                            <label for="accountName">Họ tên</label>
                            <input type="text" class="form-control" name="accountName" value="{{$account->accountName}}" required>
                        </div>
                        <div class="form-group">
                            <label for="accountPhone">Số điện thoại</label>
                            <input type="text" class="form-control" name="accountPhone" value="{{$account->accountPhone}}" required>
                        </div>
                        <div class="form-group">
                            <label for="accountEmail">Email</label>
                            <input type="text" class="form-control" name="accountEmail" value="{{$account->accountEmail}}" required>
                        </div>
                        <div class="select-input">
                            <div class="dropdown">
                                <div class="form-group">
                                    <label for="rightName">Vai trò</label>
                                    <input type="text" id="rightName" name="rightName" placeholder="Tất cả" value="{{$right->rightName}}" required>
                                    <div class="option rightName">
                                        @foreach ($rightList as $item)
                                            <div class="option-item" onclick="chooseOption('rightName', {{$index ++}})">{{$item->rightName}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="accountLogin">Tên đăng nhập</label>
                            <input type="text" class="form-control" name="accountLogin" value="{{$account->accountLogin}}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="text" class="form-control" name="password" value="{{$account->password}}" required>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Nhập lại mật khẩu</label>
                            <input type="text" class="form-control" name="password-confirm" value="{{$account->password}}" required>
                        </div>
                        <div class="select-input">
                            <div class="dropdown">
                                <div class="form-group">
                                    <label for="accountActiveST">Trạng thái hoạt động</label>
                                    <input type="text" name="accountActiveST" id="accountActiveST" placeholder="Tất cả" value="{{$account->accountActiveST}}" readonly>
                                    <div class="option accountActiveST">
                                        <div class="option-item active" onclick="chooseOption('accountActiveST', 0)">Hoạt động</div>
                                        <div class="option-item" onclick="chooseOption('accountActiveST', 1)">Ngưng hoạt động</div>
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
                        <a href="/admins/accounts/list">Hủy</a>
                    </button>
                    <button class="btn btn-login" type="submit">
                        Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
<script src='{{asset('assets/admins/js/input-tag.js')}}'></script>
@endsection
