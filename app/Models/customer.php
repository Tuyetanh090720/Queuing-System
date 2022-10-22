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


    public function getAllCustomers(){
        $customers =  DB::table($this->table)->leftjoin('numbers', 'numbers.customerId', '=', 'customers.customerId')
                                            ->orderBy('created_at', 'desc')->get();

        return $customers;
    }



}
