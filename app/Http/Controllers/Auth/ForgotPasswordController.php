<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\passwordReset;
use App\Models\account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Mail;
use Hash;
use App\Mail\SendMail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showForgetPasswordForm()
    {
       return view('auth.passwords.forgetPW');
    }

    public function submitForgetPasswordForm(Request $rq)
    {
        $passwordResets = new passwordReset();

        $rq->validate([
            'accountEmail' => 'required|email|exists:accounts',
        ]);

        $token = Str::random(64);

        $accountEmail = $rq->accountEmail;

        $data = array_merge(['accountEmail'=>$accountEmail], ['token'=>$token], ['created_at' => date('Y-m-d')]);

        $passwordResets->insertPassword($data);

        // Mail::send('auth.passwords.forgetPasswordEmail', ['token' => $token], function($message) use($rq){
        //     $message->to($rq->accountEmail);
        //     $message->subject('Reset Password');
        // });

        $mailable = new SendMail($token, $accountEmail);

        Mail::to($accountEmail)->send($mailable);

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token) {
        return view('auth.passwords.pwNew', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $passwordResets = new passwordReset();

        $request->validate([
            'accountEmail' => 'required|email|exists:accounts',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = $passwordResets->getPassword($request->accountEmail, $request->token);

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $account = account::where('accountEmail', $request->accountEmail)
                    ->update(['password' => Hash::make($request->password)]);

        $passwordResets->deletePassword($request->accountEmail);

        return redirect('/')->with('message', 'Your password has been changed!');
    }

}
