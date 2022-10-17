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

    public function getAllDevices($perPage, $keywords, $deviceActiveST, $deviceConnectST){
        $devices = DB::table($this->table);

        if($keywords && !empty($keywords)) {
            $devices = $devices->where('deviceName', 'like', "%{$keywords}%")
                                ->orwhere('deviceAddressIp', 'like', "%{$keywords}%");
        }

        if($deviceActiveST && !empty($deviceActiveST)) {
            if($deviceActiveST == "Tất cả"){
                $devices = $devices;
            }
            else{
                $devices = $devices->where('deviceActiveST', $deviceActiveST);
            }
        }

        if($deviceConnectST && !empty($deviceConnectST)) {
            if($deviceConnectST == "Tất cả"){
                $devices = $devices;
            }
            else{
                $devices = $devices->where('deviceConnectST', $deviceConnectST);
            }
        }

        return $devices->paginate($perPage);
    }

    public function getDevice($id){
        $devices = DB::table($this->table)->leftjoin('device_details', 'device_details.deviceId', '=', 'devices.deviceId')
                                            ->leftjoin('services', 'services.serviceId', '=', 'device_details.serviceId')
                                            ->where('deviceId', $id)->get();

        return $devices;
    }

    public function getdeviceDetail($id){
        $devices = DB::table($this->table)->leftjoin('device_types', 'device_types.deviceTypeId', '=', 'devices.deviceTypeId')
                                            ->where('deviceId', $id)
                                            ->first();

        return $devices;
    }

    public function updatedevice($data, $id){
        return  DB::table($this->table)->where('deviceId', $id)->update($data);
    }
}
