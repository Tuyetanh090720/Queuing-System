<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\activityLog;
use App\Models\account;

class ActivityLogController extends Controller
{
    const _PER_PAGE = 3;

    public function index()
    {
        $activityLogs = new activityLog();
        $accounts = new account();

        $activityLogsList = $activityLogs->getAllActivityLog(self::_PER_PAGE, '');
        $accountLogin = [];

        for($i = 0; $i < count($activityLogsList); $i++){
            $description = $activityLogsList[$i]->description;
            $accountId = substr($description, 15, 1);

            $accountLogin[] = $accounts->getAccountDetail($accountId)->accountLogin;
        }
        $j = 0;

        return view('admins.diary.list', compact('activityLogsList', 'accountLogin', 'j'));
    }

    public function getMore(Request $rq)
    {
        $activityLogs = new activityLog();
        $accounts = new account();

        $keywords = $rq->keywords;

        if($rq->ajax()) {
            $activityLogsList = $activityLogs->getAllActivityLog(self::_PER_PAGE, '');
            $accountLogin = [];

            for($i = 0; $i < count($activityLogsList); $i++){
                $description = $activityLogsList[$i]->description;
                $accountId = substr($description, 15, 1);

                $accountLogin[] = $accounts->getAccountDetail($accountId)->accountLogin;
            }

            $j = 0;

            return view('admins.diary.table', compact('activityLogsList', 'accountLogin', 'j'))->render();
        }
    }
}
