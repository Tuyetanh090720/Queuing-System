<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\number;

class ReportController extends Controller
{

    const _PER_PAGE = 3;

    public function index()
    {
        $numbers = new number();

        $numbersList = $numbers->getNumbers(self::_PER_PAGE, '');

        return view('admins.reports.list', compact('numbersList'));
    }

    public function getMore(Request $rq)
    {
        $numbers = new number();

        $keywords = $rq->keywords;

        if($rq->ajax()) {
            $numbersList = $numbers->getNumbers(self::_PER_PAGE, $keywords);

            return view('admins.reports.table', compact('numbersList'))->render();
        }
    }

}
