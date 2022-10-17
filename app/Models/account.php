<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class account extends Model
{
    use HasFactory;
    protected $table = 'accounts';

    public function insertAccount($data){
        return DB::table($this->table)->insert($data);
    }

    public function getAllAccounts($perPage, $keywords, $accountActiveST){
        $accounts = DB::table($this->table)->join('rights', 'accounts.rightId', 'rights.rightId');

        if($keywords && !empty($keywords)) {
            $accounts = $accounts->where('accounts.accountLogin', 'like', "%{$keywords}%")
                                ->orwhere('rights.rightName', 'like', "%{$keywords}%");
        }

        if($accountActiveST && !empty($accountActiveST)) {
            if($accountActiveST == "Tất cả"){
                $devices = $devices;
            }
            else{
                $devices = $devices->where('accounts.accountActiveST', $accountActiveST);
            }
        }

        return $accounts->paginate($perPage);
    }

    public function getAccountDetail($id){
        $accounts = DB::table($this->table)->join('rights', 'accounts.rightId', '=', 'rights.rightId');
        $accounts = $accounts->where('accountId', $id)->first();

        return $accounts;
    }

    public function updateAccount($data, $id){
        return  DB::table($this->table)->where('accountId', $id)->update($data);
    }
}
