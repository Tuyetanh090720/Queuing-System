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
}
