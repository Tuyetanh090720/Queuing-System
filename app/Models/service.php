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

    public function getServices(){
        return DB::table($this->table)->get();
    }

    public function getFirstService($id){
        return DB::table($this->table)->where('serviceId', $id)->first();
    }
}


