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

    public function getAllnumbers($perPage, $keywords, $serviceName, $numberST, $numberSupply){
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

        return $numbers->paginate($perPage);
    }

    public function getNumberSerialMax(){
        return DB::table($this->table)->max('numberSerial');
    }

    public function getNumbers($perPage, $keywords){
        $numbers = DB::table($this->table)->leftjoin('services', 'numbers.serviceId', '=', 'services.serviceId');

        if($keywords && !empty($keywords)) {
            $numbers = $numbers->where('numbers.numberSerial', 'like', "%{$keywords}%")
                                ->orwhere('numbers.created_at', 'like', "%{$keywords}%");
        }

        return $numbers->paginate($perPage);
    }

    public function getNumberDetail($id){
        return DB::table($this->table)->leftjoin('services', 'numbers.serviceId', '=', 'services.serviceId')
                                        ->leftjoin('customers', 'numbers.customerId', '=', 'customers.customerId')
                                        ->where('numbers.numberId', $id)->first();
    }

    public function countNumbers(){
        $numbers = DB::table($this->table)->count();

        return $numbers;
    }

    public function countNumberST($st){
        $numbers = DB::table($this->table)->where('numberST', $st)->count();

        return $numbers;
    }

    public function AllNumbers(){
        $numbers = DB::table($this->table)->leftjoin('services', 'numbers.serviceId', '=', 'services.serviceId')
                                            ->leftjoin('customers', 'numbers.customerId', '=', 'customers.customerId')->get();

        return $numbers;
    }

    public function countNumberYear(){
        $numbers = DB::table($this->table)->whereMonth('created_at', $month)->count();

        return $numbers;
    }

    public function countNumberMonth($month){
        $numbers = DB::table($this->table)->whereMonth('created_at', $month)->count();

        return $numbers;
    }

    public function countNumberAjax($dateD, $month, $year){
        $numbers = DB::table($this->table);

        if($dateD && !empty($dateD)) {
            $numbers = $numbers->whereDate('created_at', $dateD);
        }

        if($month && !empty($month)) {
            $numbers = DB::table($this->table)->whereYear('created_at', $year)
                                                ->whereMonth('created_at', $month);
        }

        return $numbers->count();
    }
}
