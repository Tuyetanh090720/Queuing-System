<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\number;
use App\Models\service;
use App\Models\customer;


class NumberController extends Controller
{
    const _PER_PAGE = 3;

    public function index()
    {
        $numbers = new number();
        $services = new service();

        $numbersList = $numbers->getAllnumbers(self::_PER_PAGE, '', '', '', '', '', '', '');

        $servicesList = $services->getServices();
        $i = 1;

        return view('admins.numbers.list', compact('numbersList', 'servicesList', 'i'));
    }

    public function getMore(Request $rq)
    {
        $numbers = new number();
        $services = new service();

        $keywords = $rq->keywords;
        $serviceName = $rq->serviceName;
        $numberST = $rq->numberST;
        $numberSupply = $rq->numberSupply;
        $created_at = $rq->created_at;
        $numberExpiry = $rq->numberExpiry;

        $servicesList = $services->getServices();

        $i = 1;

        if($rq->ajax()) {
            $numbersList = $numbers->getAllnumbers(self::_PER_PAGE, $keywords, $serviceName, $numberST, $numberSupply, $created_at, $numberExpiry);

            return view('admins.numbers.table', compact('numbersList', 'servicesList', 'i'))->render();
        }
    }

    public function reports()
    {
        return view('admins.reports');
    }

    public function add()
    {
        $services = new service();

        $servicesList = $services->getServices();

        $i = 0;

        $services = new service();
        return view('admins.numbers.add', compact('servicesList', 'i'));
    }

    public function store(Request $rq)
    {
        $numbers = new number();
        $customers = new customer();
        $services = new service();

        $arrdate = ['updated_at' => date('Y-m-d'), 'created_at' => date('Y-m-d')];

        $dataC = array_merge($rq->only('customerName', 'customerCCCD', 'customerPhone', 'customerEmail'), $arrdate);
        $customerId = $customers->insertCustomer($dataC);

        $numberSerial = $numbers->getNumberSerialMax() + 1;

        $serviceId = $services->getServiceName($rq->serviceName)->serviceId;

        $created_at = date('Y-m-d');
        $numberExpiry = strtotime(date("Y-m-d", strtotime($created_at)) . " +5 day");
        $numberExpiry = strftime("%Y-%m-%d", $numberExpiry);

        $numberST = "Đang thực hiện";
        $numberSupply = "Hệ thống";

        $dataN = array_merge(['numberSerial'=>$numberSerial], ['customerId'=>$customerId], ['serviceId'=>$serviceId], ['created_at' => date('Y-m-d')], ['numberExpiry' => $numberExpiry], ['numberST' => $numberST], ['numberSupply' => $numberSupply], ['updated_at' => date('Y-m-d')]);


        $numberId = $numbers->insertGetId($dataN);

        return redirect()->route('admins.numbers.list');
    }

    public function detail()
    {
        return view('admins.numbers.detail');
    }
}
