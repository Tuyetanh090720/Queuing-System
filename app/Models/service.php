<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class service extends Model
{
    use HasFactory;

    protected $table = 'services';

    public function insertService($data){
        return DB::table($this->table)->insert($data);
    }

    public function getAllServices($perPage, $keywords, $serviceActiveST){
        $services = DB::table($this->table);

        if($keywords && !empty($keywords)) {
            $services = $services->where('serviceCode', 'like', "%{$keywords}%")
                                ->orwhere('serviceName', 'like', "%{$keywords}%");
        }

        if($serviceActiveST && !empty($serviceActiveST)) {
            if($serviceActiveST == "Tất cả"){
                $services = $services;
            }
            else{
                $services = $services->where('serviceActiveST', $serviceActiveST);
            }
        }

        return $services->paginate($perPage);
    }

    public function getServices(){
        return DB::table($this->table)->get();
    }

    public function getFirstService($id){
        return DB::table($this->table)->where('serviceId', $id)->first();
    }

    public function getServiceDetail($id, $perPage, $keywords, $numberST){
        $services = DB::table($this->table)->leftjoin('numbers', 'numbers.serviceId', '=', 'services.serviceId')
        ->where('numbers.serviceId', $id);

        if($keywords && !empty($keywords)) {
            $services = $services->where('numberSerial', 'like', "%{$keywords}%");
        }

        if($numberST && !empty($numberST)) {
            if($numberST == "Tất cả"){
                $services = $services;
            }
            else{
                $services = $services->where('numberST', $numberST);
            }
        }

        return $services->paginate($perPage);
    }

    public function getServiceName($name){
        return DB::table($this->table)->where('serviceName', $name)->first();
    }

    public function updateService($data, $id){
        return  DB::table($this->table)->where('serviceId', $id)->update($data);
    }
}


