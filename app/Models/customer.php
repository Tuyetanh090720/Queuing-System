<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class customer extends Model
{
    use HasFactory;
    protected $table = 'customers';

    public function insertCustomer($data){
        return DB::table($this->table)->insertGetId($data);
    }

}
