<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deviceType extends Model
{
    use HasFactory;
    protected $table = 'device_types';

    public function insertDeviceType($data){
        return DB::table($this->table)->insertGetId($data);
    }

    public function getAllDeviceTypes($perPage){
        $deviceTypes = DB::table($this->table);

        return $deviceTypes->paginate($perPage);
    }

    public function getDeviceTypes(){
        return DB::table($this->table)->get();
    }

    public function getDeviceTypeName($name){
        return DB::table($this->table)->where('deviceTypeName', $name)->first();
    }

    public function getDeviceTypeId($id){
        return DB::table($this->table)->where('deviceTypeId', $id)->first();
    }

    public function updateDeviceType($data, $id){
        return  DB::table($this->table)->where('deviceTypeId', $id)->update($data);
    }

    public function deleteDeviceType($id){
        return  DB::table($this->table)->where('deviceTypeId', $id)->delete();
    }

}
