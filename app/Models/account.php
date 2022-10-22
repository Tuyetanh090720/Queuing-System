<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class account extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'accounts';

    protected $fillable = [
        'accountLogin', 'accountPw',
    ];

    protected $hidden = [
        'accountPw', 'remember_token',
    ];

    public function insertAccount($data){
        return DB::table($this->table)->insertGetId($data);
    }

    public function getAllAccounts($perPage, $keywords, $accountActiveST){
        $accounts = DB::table($this->table)->join('rights', 'accounts.rightId', 'rights.rightId');

        if($keywords && !empty($keywords)) {
            $accounts = $accounts->where('accounts.accountLogin', 'like', "%{$keywords}%")
                                ->orwhere('rights.rightName', 'like', "%{$keywords}%");
        }

        if($accountActiveST && !empty($accountActiveST)) {
            if($accountActiveST == "Tất cả"){
                $accounts = $accounts;
            }
            else{
                $accounts = $accounts->where('accounts.accountActiveST', $accountActiveST);
            }
        }

        return $accounts->paginate($perPage);
    }

    public function getAccountDetail($id){
        $accounts = DB::table($this->table)->join('rights', 'accounts.rightId', '=', 'rights.rightId');
        $accounts = $accounts->where('accounts.accountId', $id)->first();

        return $accounts;
    }

    public function updateAccount($data, $id){
        return  DB::table($this->table)->where('accountId', $id)->update($data);
    }

    public function checkMail($email){
        return  DB::table($this->table)->where('accountEmail', $email)->exists();
    }
}
