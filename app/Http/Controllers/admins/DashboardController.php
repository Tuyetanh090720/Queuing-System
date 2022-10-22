<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\number;
use App\Models\service;
use App\Models\device;
use App\Charts\NumberChart;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function dashboard(){
        $numbers = new number();
        $services = new service();
        $devices = new device();

        $numberList = $numbers->AllNumbers();

        $countNumbers = $numbers->countNumbers();
        $numberSt[] = $numbers->countNumberST('Đã hoàn thành');
        $numberSt[] = $numbers->countNumberST('Đang thực hiện');
        $numberSt[] = $numbers->countNumberST('Bỏ qua');

        $countDevices = $devices->countDevices();
        $deviceActiveST[] = $devices->countDeviceST('Hoạt động');
        $deviceActiveST[] = $devices->countDeviceST('Ngưng hoạt động');

        $countServices = $services->countServices();
        $serviceActiveST[] = $services->countServiceST('Hoạt động');
        $serviceActiveST[] = $services->countServiceST('Ngưng hoạt động');

        $daysInMonth = Carbon::now()->daysInMonth;
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;

        // chart theo ngày
        for($i = 1; $i <= $daysInMonth; $i++){
            $labelDay[] = ''.$i.'';
            $d = Carbon::create($year, $month, $i, 0);
            $dateD = $d->toDateString();
            $a = $numbers->countNumberAjax($dateD, '', $year);
            $dataDay[] = $a;
        }

        $NumberChartDay = new NumberChart;
        $NumberChartDay->labels($labelDay);
        $NumberChartDay->dataset('Cấp số', 'line', $dataDay)
                        ->color("#5185F7")
                        ->backgroundcolor("#CEDDFF");

        // chart theo tuần
        $tuan1 = 0;
        $tuan2 = 0;
        $tuan3 = 0;

        for($j = 1; $j <= $daysInMonth; $j++){
            $labelWeek[] = ''.$j.'';
            $d = Carbon::create($year, $month, $j, 0);
            $datew = $d->toDateString();

            if($j <= 7){
                $a = $numbers->countNumberAjax($datew, '', '');
                $tuan1 += $a;
            }
            if($j >= 8 && $j <= 14){
                $b = $numbers->countNumberAjax($datew, '', '');
                $tuan2 += $b;
            }
            if($j >= 15){
                $c = $numbers->countNumberAjax($datew, '', '');
                $tuan3 += $c;
            }
        }

        $dataWeek = [$tuan1, $tuan2, $tuan3];

        $NumberChartWeek = new NumberChart;
        $NumberChartWeek->labels(["Tuần 1", "Tuần 2", "Tuần 3", "Tuần 4"]);
        $NumberChartWeek->dataset('Users by trimester', 'line', $dataWeek)
                        ->color("#5185F7")
                        ->backgroundcolor("#CEDDFF");

        // chart theo tháng
        for($k = 1; $k <= 12; $k++){
            $labelMonth[] = ''.$k.'';
            $a = $numbers->countNumberAjax('', $k, $year);
            $dataMonth[] = $a;
        }

        $NumberChartMonth = new NumberChart;
        $NumberChartMonth->labels($labelMonth);
        $NumberChartMonth->dataset('Users by trimester', 'line', $dataMonth)
                        ->color("#5185F7")
                        ->backgroundcolor("#CEDDFF");


        return view('admins.dashboards.dashboard', compact('numberList', 'countNumbers', 'numberSt', 'countDevices', 'deviceActiveST', 'countServices', 'serviceActiveST', 'NumberChartDay', 'NumberChartWeek', 'NumberChartMonth', 'month', 'year'));
    }

    function chartDay(){
        $numbers = new number();

        $daysInMonth = Carbon::now()->daysInMonth;
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;

        for($i = 1; $i <= $daysInMonth; $i++){
            $labelDay[] = ''.$i.'';
            $d = Carbon::create($year, $month, $i, 0);
            $dateD = $d->toDateString();
            $a = $numbers->countNumberAjax($dateD, '', $year);
            $dataDay[] = $a;
        }

        $NumberCharts = new NumberChart;
        $NumberCharts->labels($labelDay);
        $NumberCharts->dataset('Cấp số', 'line', $dataDay)
                        ->color("#5185F7")
                        ->backgroundcolor("#CEDDFF");

        return $NumberCharts;
    }

    function chartWeek(){
        $daysInMonth = Carbon::now()->daysInMonth;
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;

        $numbers = new number();
        $tuan1 = 0;
        $tuan2 = 0;
        $tuan3 = 0;

        for($i = 1; $i <= $daysInMonth; $i++){
            $labelDay[] = ''.$i.'';
            $d = Carbon::create($year, $month, $i, 0);
            $dateD = $d->toDateString();

            if($i <= 7){
                $a = $numbers->countNumberAjax($dateD, '', '');
                $tuan1 += $a;
            }
            if($i >= 8 && $i <= 14){
                $b = $numbers->countNumberAjax($dateD, '', '');
                $tuan2 += $b;
            }
            if($i >= 15){
                $c = $numbers->countNumberAjax($dateD, '', '');
                $tuan3 += $c;
            }
        }

        $dataWeek = [$tuan1, $tuan2, $tuan3];

        $NumberCharts = new NumberChart;
        $NumberCharts->labels(["Tuần 1", "Tuần 2", "Tuần 3", "Tuần 4"]);
        $NumberCharts->dataset('Users by trimester', 'line', $dataWeek)
                        ->color("#5185F7")
                        ->backgroundcolor("#CEDDFF");

        return $NumberCharts;
    }

    function chartMonth(){
        $numbers = new number();

        $daysInMonth = Carbon::now()->daysInMonth;
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;

        for($i = 1; $i <= 12; $i++){
            $labelDay[] = ''.$i.'';
            $a = $numbers->countNumberAjax('', $i, $year);
            $dataMonth[] = $a;
        }

        $NumberCharts = new NumberChart;
        $NumberCharts->labels($labelDay);
        $NumberCharts->dataset('Users by trimester', 'line', $dataMonth)
                        ->color("#5185F7")
                        ->backgroundcolor("#CEDDFF");

        return $NumberCharts;
    }
}
