<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;


class ServiceController extends Controller
{

    const _PER_PAGE = 3;

    public function index()
    {
        $services = new service();

        $servicesList = $services->getAllServices(self::_PER_PAGE, '', '');

        return view('admins.services.list', compact('servicesList'));

    }

    public function getMore(Request $rq)
    {
        $services = new service();

        $keywords = $rq->keywords;

        $serviceActiveST = $rq->serviceActiveST;

        if($rq->ajax()) {
            $servicesList = $services->getAllServices(self::_PER_PAGE, $keywords, $serviceActiveST);

            return view('admins.services.table', compact('servicesList'))->render();
        }
    }

    public function detail($id)
    {
        $services = new service();

        $service =  $services->getFirstService($id);

        $serviceDetail = $services->getServiceDetail($id, self::_PER_PAGE, '', '');

        $serviceRuleNumber = explode(', ',$service->serviceRuleNumber);

        return view('admins.services.detail', compact('service', 'serviceRuleNumber', 'serviceDetail'));
    }

    public function getMoreDetail(Request $rq, $id)
    {
        $services = new service();

        $keywords = $rq->keywords;

        $numberST = $rq->numberST;

        $service =  $services->getFirstService($id);

        if($rq->ajax()) {

            $serviceDetail = $services->getServiceDetail($id, self::_PER_PAGE, $keywords, $numberST);

            $serviceRuleNumber = explode(', ',$service->serviceRuleNumber);

            return view('admins.services.table-detail', compact('service', 'serviceRuleNumber', 'serviceDetail'))->render();
        }
    }

    public function add()
    {
        return view('admins.services.add');
    }

    public function store(Request $rq)
    {
        $services = new service();

        $arrdate = ['updated_at' => date('Y-m-d'), 'created_at' => date('Y-m-d')];

        $serviceRuleNumber = implode($rq->serviceRuleNumber, ', ');

        $data = array_merge($rq->only('serviceCode', 'serviceName', 'serviceDescription', 'serviceActiveST'), ['serviceRuleNumber'=>$serviceRuleNumber], $arrdate);

        $serviceId = $services->insertService($data);

        $accountId = session()->get('accountId');
        activity()
            ->performedOn($services)
            ->createdAt(now()->subDays(10))
            ->log('Ng?????i d??ng '.$accountId.' ???? th??m d???ch v??? '.$serviceId );

        return redirect()->route('admins.services.list');
    }

    public function edit($id)
    {
        $services = new service();

        $service =  $services->getFirstService($id);

        $serviceRuleNumber = explode(', ',$service->serviceRuleNumber);

        return view('admins.services.edit',  compact('service', 'serviceRuleNumber'));

    }

    public function update(Request $rq, $id)
    {
        $services = new service();

        $serviceRuleNumber = implode($rq->serviceRuleNumber, ', ');

        $data = array_merge($rq->only('serviceCode', 'serviceName', 'serviceDescription', 'serviceActiveST', 'created_at'), ['serviceRuleNumber'=>$serviceRuleNumber], ['updated_at' => date('Y-m-d')]);

        $services->updateService($data, $id);

        $accountId = session()->get('accountId');
        activity()
            ->performedOn($services)
            ->createdAt(now()->subDays(10))
            ->log('Ng?????i d??ng '.$accountId.' ???? c???p nh???t d???ch v??? '.$id );

        return redirect()->route('admins.services.list');
    }
}
