<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class passwordReset extends Model
{
    use HasFactory;
    protected $table = 'password_resets';

    public function insertPassword($data){
        return DB::table($this->table)->insertGetId($data);
    }

    public function getPassword($accountEmail, $token){
        return DB::table($this->table)->where('accountEmail', $accountEmail)
                                       ->where('token', $token)->first();
    }

    public function deletePassword($accountEmail){
        return DB::table($this->table)->where('accountEmail', $accountEmail)
                                    ->delete();
    }
}
