<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class deviceDetail extends Model
{
    use HasFactory;

    protected $table = 'device_details';

    public function insertDeviceDetail($data){
        return DB::table($this->table)->insertGetId($data);
    }

    public function getServiceId($id){
        return DB::table($this->table)->join('services', 'device_details.serviceId', '=', 'services.serviceId')
        ->where('deviceId', $id)->get();
    }

    public function updateDeviceDetail($data, $id){
        return  DB::table($this->table)->where('deviceDetailId', $id)->update($data);
    }

    public function deleteDeviceDetail($id){
        return  DB::table($this->table)->where('deviceDetailId', $id)->delete();
    }

}
