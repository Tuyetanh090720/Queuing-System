<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class number extends Model
{
    use HasFactory;
    protected $table = 'numbers';

    public function insertNumber($data){
        return DB::table($this->table)->insertGetId($data);
    }

    public function getAllnumbers($perPage, $keywords, $serviceName, $numberST, $numberSupply, $created_at, $numberExpiry){
        $numbers = DB::table($this->table)->leftjoin('services', 'numbers.serviceId', '=', 'services.serviceId')
                                            ->leftjoin('customers', 'numbers.customerId', '=', 'customers.customerId');

        if($keywords && !empty($keywords)) {
            $numbers = $numbers->where('numberSerial', 'like', "%{$keywords}%")
                                ->orwhere('customerName', 'like', "%{$keywords}%");
        }

        if($serviceName && !empty($serviceName)) {
            if($serviceName == "Tất cả"){
                $numbers = $numbers;
            }
            else{
                $numbers = $numbers->where('serviceName', $serviceName);
            }
        }

        if($numberST && !empty($numberST)) {
            if($numberST == "Tất cả"){
                $numbers = $numbers;
            }
            else{
                $numbers = $numbers->where('numberST', $numberST);
            }
        }

        if($numberSupply && !empty($numberSupply)) {
            if($numberSupply == "Tất cả"){
                $numbers = $numbers;
            }
            else{
                $numbers = $numbers->where('numberSupply', $numberSupply);
            }
        }

        if($created_at && !empty($created_at)) {
            $numbers = $numbers->where('created_at', '>', $created_at);
        }



        return $numbers->paginate($perPage);
    }

    public function getNumberSerialMax(){
        return DB::table($this->table)->max('numberSerial');
    }

}
