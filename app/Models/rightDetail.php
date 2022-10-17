<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class rightDetail extends Model
{
    use HasFactory;

    protected $table = 'right_details';

    public function insertRightDetail($data){
        return DB::table($this->table)->insert($data);
    }

    public function getRightDetail($id){
        return DB::table($this->table)->join('rights', 'rights.rightId', '=', 'right_details.rightId')
        ->join('right_functions', 'right_functions.rightFunctionId', '=', 'right_details.rightFunctionId')
        ->where('right_details.rightId', $id)->get();
    }

    public function getRightDetailId($id){
        return DB::table($this->table)->join('rights', 'rights.rightId', '=', 'right_details.rightId')
        ->where('right_details.rightId', $id)->get();
    }

    public function updateRightDetail($data, $id){
        return  DB::table($this->table)->where('rightDetailId', $id)->update($data);
    }

    public function deleteRightDetail($id){
        return  DB::table($this->table)->where('rightDetailId', $id)->delete();
    }
}
