<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class right extends Model
{
    use HasFactory;

    protected $table = 'rights';

    public function insertRight($data){
        return DB::table($this->table)->insertGetId($data);
    }

    public function getAllRights($perPage, $keywords){
        $rights = DB::table($this->table);

        if($keywords && !empty($keywords)) {
            $rights = $rights->where('rightName', 'like', "%{$keywords}%");
        }

        return $rights->paginate($perPage);
    }

    public function getRightDetail($id){
        $Rights = DB::table($this->table)->join('rights', 'rights.rightId', '=', 'rights.rightId');
        $Rights = $Rights->where('rightId', $id)->first();

        return $Rights;
    }

    public function getRights(){
        return DB::table($this->table)->get();
    }

    public function getRightID($id){
        $right = DB::table($this->table)->where('rightId', $id)->first();
        return $right;
    }

    public function countRight($id){
        $right = DB::table($this->table)->join('accounts', 'accounts.rightId', '=', 'rights.rightId')->get();
        $right = $right->where('rightId', $id)->count();
        return $right;
    }

    public function updateRight($data, $id){
        return  DB::table($this->table)->where('rightId', $id)->update($data);
    }

    public function deleteRight($id){
        return  DB::table($this->table)->where('rightId', $id)->delete();
    }
}
