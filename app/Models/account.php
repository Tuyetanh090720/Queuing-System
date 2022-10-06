<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class account extends Model
{
    use HasFactory;
    protected $table = 'accounts';

    public function getAllAccounts(){
        return DB::table($this->table)->get();
    }

    public function getAccountDetail($accountId){
        $event = DB::table($this->table)->where('accountId', $accountId)->first();

        return $event;
    }

    public function updateEvent($data, $id){
        return  DB::table($this->table)->where('eventId', $id)->update($data);
    }

    public function deleteEvent($id){
        return  DB::table($this->table)->where('eventId', $id)->delete();
    }

}
