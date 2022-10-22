<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class activityLog extends Model
{
    use HasFactory;
    protected $table = 'activity_log';

    public function getAllActivityLog($perPage, $keywords){
        $activityLog = DB::table($this->table);

        if($keywords && !empty($keywords)) {
            $activityLog = $activityLog->where('created_at', 'like', "%{$keywords}%");
        }

        return $activityLog->paginate($perPage);
    }

}
