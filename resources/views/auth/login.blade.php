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
                    <form method="POST" action="/">
                        @csrf
                        <div class="form-group">
                            <label for="accountLogin">Tên đăng nhập *</label>
                            <input type="text" class="form-control" name="accountLogin" id="accountLogin" value="{{ old('accountLogin') }}" autocomplete="accountLogin" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu *</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" autocomplete="password" >
                        </div>
                        <div class="error-block">
                            @if (!empty($message))
                                <span class="error"><i class="fa fa-circle-exclamation"></i> {{$message}}</span>
                            @endif
                        </div>
                        <div class="input-group-btn">
                            <button class="btn btn-login" type="submit">
                                Đăng nhập
                            </button><br/>
                            <a href="/forget-password" class="forget">Quên mật khẩu?</a>
                        </div>
                    </form>
                </div>
                <div class="img-login col-lg-7 col-sm-7">
                    <img src="{{asset('assets/admins/img/login.png')}}" alt="">
                    <div class="img-login-title">
                        <span class="title-1">Hệ thống</span><br/>
                        <span class="title-2">QUẢN LÝ XẾP HÀNG</span>
                    </div>
                </div>
            </div>
        </div>
    </body>
