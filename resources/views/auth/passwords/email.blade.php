{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
                        <span>Đặt lại mật khẩu</span>
                    </div>
                    <form >
                        @csrf
                        <div class="form-group">
                            <label for="accountEmail">Vui lòng nhập email để đặt lại mật khẩu của bạn *</label>
                            <input type="text" class="form-control" name="accountEmail" value="{{ old('accountEmail') }}" autocomplete="accountEmail" id="accountEmail" required>
                        </div>
                        <div class="error-block">
                            @error('accountEmail')
                                <span class="error"> *{{$message}}</span>
                            @enderror
                        </div>
                        <div class="input-group-btn">
                            <button class="btn btn-cancel">
                                <a href="">Hủy</a>
                            </button>
                            <button class="btn btn-login">
                                <a href="">Tiếp tục</a>
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

