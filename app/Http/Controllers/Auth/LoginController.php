<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLogin(){
        $message = '';
        return view('auth.login', compact('message'));
    }

    public function login(Request $rq){
        $arr = [
            'accountLogin' => $rq->accountLogin,
            'password' => $rq->password,
        ];

        if (Auth::guard('accounts')->attempt($arr)) {
            $accountId = Auth::guard('accounts')->user()->accountId;

            $rq->session()->put('accountId', $accountId);

            return redirect()->route('admins.dashboard');
        }
        else {
            $message = 'Nhập sai mật khẩu hoặc tên đăng nhập';
            return view('auth.login', compact('message'));
        }
    }

    public function logout(Request $rq){
        Auth::logout();
        $rq->session()->invalidate();
        $rq->session()->regenerateToken();
        return redirect('/');
    }
}
