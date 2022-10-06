{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.admins')
@section('account-add')
<div class="container-fluid">
    <span class="title-page">Quản lý dịch vụ</span>
    <div class="container-white">
        <div class="account-add">
            <span class="title-add">Thông tin tài khoản</span>
            <form action="">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                        <div class="form-group">
                            <label for="accountName">Họ tên</label>
                            <input type="text" class="form-control" name="accountName" value="{{ old('accountName') }}" autocomplete="accountName" required>
                        </div>
                        <div class="form-group">
                            <label for="accountPhone">Số điện thoại</label>
                            <input type="text" class="form-control" name="accountPhone" value="{{ old('accountPhone') }}" autocomplete="accountPhone" required>
                        </div>
                        <div class="form-group">
                            <label for="accountEmail">Email</label>
                            <input type="text" class="form-control" name="accountEmail" value="{{ old('accountEmail') }}" autocomplete="accountEmail" required>
                        </div>
                        <div class="select-input">
                            <div class="dropdown">
                                <div class="form-group">
                                    <label for="rightName">Vai trò</label>
                                    <input type="text" id="rightName" placeholder="Tất cả" value="{{ old('rightName') }}" autocomplete="rightName"  readonly>
                                    <div class="option rightId">
                                        <div class="option-item active" onclick="chooseOption('rightName', 0)">Tất cả</div>
                                        <div class="option-item" onclick="chooseOption('rightName', 1)">Hoạt động</div>
                                        <div class="option-item" onclick="chooseOption('rightName', 2)">Ngưng hoạt động</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="accountLogin">Tên đăng nhập</label>
                            <input type="text" class="form-control" name="accountLogin" value="{{ old('accountLogin') }}" autocomplete="accountLogin" required>
                        </div>
                        <div class="form-group">
                            <label for="accountPw">Mật khẩu</label>
                            <input type="text" class="form-control" name="accountPw" value="{{ old('accountPw') }}" autocomplete="accountPw" required>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Nhập lại mật khẩu</label>
                            <input type="text" class="form-control" name="password-confirm" value="{{ old('password-confirm') }}" autocomplete="accountPw" required>
                        </div>
                        <div class="select-input">
                            <div class="dropdown">
                                <div class="form-group">
                                    <label for="accountActiveST">Trạng thái hoạt động</label>
                                    <input type="text" id="accountActiveST" placeholder="Tất cả" readonly>
                                    <div class="option accountActiveST">
                                        <div class="option-item active" onclick="chooseOption('accountActiveST', 0)">Tất cả</div>
                                        <div class="option-item" onclick="chooseOption('accountActiveST', 1)">Hoạt động</div>
                                        <div class="option-item" onclick="chooseOption('accountActiveST', 2)">Ngưng hoạt động</div>
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
                        <a href="">Hủy</a>
                    </button>
                    <button class="btn btn-login">
                        <a href="">Thêm</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection

