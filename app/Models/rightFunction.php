<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class rightFunction extends Model
{
    use HasFactory;

    protected $table = 'right_functions';

    public function insertRightFunction($data){
        return DB::table($this->table)->insertGetId($data);
    }

    public function getAllRightFunctions(){
        return DB::table($this->table)->get();
    }

    public function getRightFunctionDetail($id){
        return DB::table($this->table)->where('rightFunctionId', $id)->first();
    }

    public function getRightFunctionName($name){
        $rightFunctions =  DB::table($this->table)->where('rightFunctionName', $name)->first();
        return $rightFunctions->rightFunctionId;
    }

    public function updateRightFunction($data, $id){
        return  DB::table($this->table)->where('RightFunctionId', $id)->update($data);
    }

    public function deleteRightFunction($id){
        return  DB::table($this->table)->where('RightFunctionId', $id)->delete();
    }
}
