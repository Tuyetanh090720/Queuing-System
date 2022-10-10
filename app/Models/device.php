<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class device extends Model
{
    use HasFactory;
    protected $table = 'devices';

    public function insertDevice($data){
        return DB::table($this->table)->insertGetId($data);
    }

    public function getAlldevices($perPage, $keywords, $deviceActiveST){
        $devices = DB::table($this->table)->join('device_details', 'devices.deviceId', '=', 'device_details.deviceId');

        if($keywords && !empty($keywords)) {
            $devices = $devices->where('devices.deviceLogin', 'like', "%{$keywords}%")
                                ->orwhere('rights.rightName', 'like', "%{$keywords}%");
        }

        if($deviceActiveST && !empty($deviceActiveST)) {
            $devices = $devices->where('devices.deviceActiveST', $deviceActiveST);
        }

        return $devices->paginate($perPage);
    }

    public function getdeviceDetail($id){
        $devices = DB::table($this->table)->join('rights', 'devices.rightId', '=', 'rights.rightId');
        $devices = $devices->where('deviceId', $id)->first();

        return $devices;
    }

    public function updatedevice($data, $id){
        return  DB::table($this->table)->where('deviceId', $id)->update($data);
    }
}
