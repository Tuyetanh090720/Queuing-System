<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\device;
use App\Models\service;
use App\Models\deviceDetail;



class DeviceController extends Controller
{
    const _PER_PAGE = 3;

    public function index()
    {
        $devices = new device();
        $devicesList = $devices->getAllDevices(self::_PER_PAGE, '', '');

        dd($devicesList);
        $services = new service();
        $servicesList = $services->getFirstService($devicesList->serviceId);

        return view('admins.devices.list', compact('devicesList'));
    }

    public function getMore(Request $rq)
    {
        $devices = new device();
        $keywords = $rq->keywords;
        $deviceActiveST = $rq->deviceActiveST;

        if($rq->ajax()) {
            $devicesList = $devices->getAlldevices(self::_PER_PAGE, $keywords, $deviceActiveST);
            return view('admins.devices.table', compact('devicesList'))->render();
        }
    }

    public function add()
    {
        $services = new service();

        $servicesList = $services->getServices();
        $index = 0;

        return view('admins.devices.add', compact('servicesList', 'index'));
    }

    public function store(Request $rq)
    {
        $devices = new device();
        $services = new service();
        $deviceDetails = new deviceDetail();

        $servicesList = $services->getServices();
        $serviceNameList = explode('/',$rq->serviceName);
        $serviceIdList = [];
        foreach($serviceNameList as $res){
            foreach($servicesList as $item){
                if($item->serviceName == $res){
                    $serviceIdList[] = $item->serviceId;
                }
            };
        }

        $arrdate = ['updated_at' => date('Y-m-d'), 'created_at' => date('Y-m-d')];

        $dataD = array_merge($rq->only('deviceName', 'deviceAddressIp', 'deviceActiveST', 'deviceConnectST'), $arrdate);
        $deviceId = $devices->insertDevice($dataD);

        for($i = 0; $i < count($serviceIdList); $i++){
            $dataDD = array_merge(['deviceId'=>$deviceId], ['serviceId'=>$serviceIdList[$i]], $arrdate);
            $insertDeviceDetail = $deviceDetails->insertDeviceDetail($dataDD);
        }

        return redirect()->route('admins.devices.list');
    }

    public function detail($id)
    {
        $devices = new device();
        $device = $devices->getdeviceDetail($id);

        return view('admins.devices.detail', compact('device'));
    }

    public function edit($id)
    {
        $devices = new device();
        $device = $devices->getdeviceDetail($id);

        $rights = new right();
        $right = $rights->getRightID($device->rightId);
        $rightList = $rights->getAllRights();
        $index = 0;

        return view('admins.devices.edit', compact('device', 'right', 'rightList', 'index'));

    }

    public function update(Request $rq, $id)
    {
        $devices = new device();

        $rights = new right();
        $rightsList = $rights->getAllRights();

        foreach($rightsList as $item){
            if($item->rightName == $rq->rightName){
                $rightId = $item->rightId;
            }
        };

        $arrdate = ['created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')];

        $data = array_merge($rq->only('deviceName','deviceLogin', 'devicePw', 'devicePhone', 'deviceEmail', 'deviceActiveST'), ['rightId' => $rightId], $arrdate);

        $update = $devices->updatedevice($data, $id);

        return redirect()->route('admins.devices.list');
    }
}
