{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Linh test -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Trang Chủ - SB Admin</title>
        <link rel="stylesheet" href="{{asset('assets/admins/css/styles.css')}}">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    </head>
    <body>
        <div class="login">
            <div class="row">
                <div class="form-login col-lg-5 col-sm-5">
                    <div class="logo">
                        <img src="{{asset('assets/admins/img/Logo alta.png')}}" alt="">
                    </div>
                    <div class="title-forget">
                        <span>Đặt lại mật khẩu mới</span>
                    </div>
                    <form action="">
                        @csrf
                        <div class="form-group">
                            <label for="accountPw">Mật khẩu</label>
                            <input type="text" class="form-control" name="accountPw" id="accountPw" autocomplete="accountPw" required>
                        </div>
                        <div class="error-block">
                            @error('accountPw')
                                <span class="error"> *{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Nhập lại mật khẩu </label>
                            <input type="text" class="form-control" name="password-confirm" id="password-confirm" autocomplete="password-confirm"required>
                        </div>
                        <div class="error-block">
                            @error('password-confirm')
                                <span class="error"> *{{$message}}</span>
                            @enderror
                        </div>
                        <div class="input-group-btn">
                            <button class="btn btn-login">
                                <a href="">Xác nhận</a>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="img-login col-lg-7 col-sm-7">
                    <img src="{{asset('assets/admins/img/reset.png')}}" alt="">
                </div>
            </div>
        </div>
    </body>
