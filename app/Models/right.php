<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class right extends Model
{
    use HasFactory;

    protected $table = 'rights';

    public function insertGetId($data){
        $id = DB::table($this->table)->insertGetId($data);

        return $id;
    }

    public function getAllRights(){
        return DB::table($this->table)->get();
    }

    public function getRightID($id){
        $right = DB::table($this->table)->where('rightId', $id)->first();
        return $right;
    }
}
