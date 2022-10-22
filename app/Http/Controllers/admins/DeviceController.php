<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\device;
use App\Models\service;
use App\Models\deviceDetail;
use App\Models\deviceType;


class DeviceController extends Controller
{
    const _PER_PAGE = 3;

    public function index()
    {
        $devices = new device();
        $deviceDetails = new deviceDetail();

        $devicesList = $devices->getAllDevices(self::_PER_PAGE, '', '', '');

        for($i = 0; $i < count($devicesList); $i++){
            $deviceId = $devicesList[$i]->deviceId;

            $deviceDetail = $deviceDetails->getServiceId($deviceId);

            $serviceNameList = $deviceDetail->implode('serviceName', ', ');

            $deviceDetailList[] = $serviceNameList;
        }
        $j = 0;
        return view('admins.devices.list', compact('devicesList', 'deviceDetailList', 'j'));
    }

    public function getMore(Request $rq)
    {
        $devices = new device();
        $deviceDetails = new deviceDetail();
        $keywords = $rq->keywords;
        $deviceActiveST = $rq->deviceActiveST;

        $deviceConnectST = $rq->deviceConnectST;

        if($rq->ajax()) {
            $devicesList = $devices->getAllDevices(self::_PER_PAGE, $keywords, $deviceActiveST, $deviceConnectST);

            for($i = 0; $i < count($devicesList); $i++){
                $deviceId = $devicesList[$i]->deviceId;

                $deviceDetail = $deviceDetails->getServiceId($deviceId);

                $serviceNameList = $deviceDetail->implode('serviceName', ', ');

                $deviceDetailList[] = $serviceNameList;
            }

            $j = 0;

            return view('admins.devices.table', compact('devicesList', 'deviceDetailList', 'j'))->render();
        }
    }

    public function add()
    {
        $services = new service();

        $servicesList = $services->getServices();
        $i = 0;

        $deviceTypes = new deviceType();
        $deviceTypeList =  $deviceTypes->getDeviceTypes();
        $j = 0;

        return view('admins.devices.add', compact('servicesList', 'deviceTypeList', 'i', 'j'));
    }

    public function store(Request $rq)
    {
        $devices = new device();
        $services = new service();
        $deviceTypes = new deviceType();
        $deviceDetails = new deviceDetail();

        $servicesList = $services->getServices();
        $serviceNameList = explode(', ',$rq->serviceName);
        $serviceIdList = [];
        foreach($serviceNameList as $res){
            foreach($servicesList as $item){
                if($item->serviceName == $res){
                    $serviceIdList[] = $item->serviceId;
                }
            };
        }


        $deviceTypeId = $deviceTypes->getDeviceTypeName($rq->deviceTypeName)->deviceTypeId;

        $arrdate = ['updated_at' => date('Y-m-d'), 'created_at' => date('Y-m-d')];

        $dataD = array_merge($rq->only('deviceName', 'deviceAddressIp', 'deviceActiveST', 'deviceConnectST'), ['deviceTypeId'=>$deviceTypeId], $arrdate);
        $deviceId = $devices->insertDevice($dataD);

        for($i = 0; $i < count($serviceIdList); $i++){
            $dataDD = array_merge(['deviceId'=>$deviceId], ['serviceId'=>$serviceIdList[$i]], $arrdate);
            $insertDeviceDetail = $deviceDetails->insertDeviceDetail($dataDD);
        }

        $accountId = session()->get('accountId');
        activity()
            ->performedOn($devices)
            ->createdAt(now()->subDays(10))
            ->log('Người dùng '.$accountId.' đã thêm thiết bị '.$deviceId );

        return redirect()->route('admins.devices.list');
    }

    public function detail($id)
    {
        $devices = new device();
        $deviceDetails = new deviceDetail();

        $device = $devices->getdeviceDetail($id);

        $deviceDetail = $deviceDetails->getServiceId($id);
        $serviceNameList = $deviceDetail->implode('serviceName', ', ');

        return view('admins.devices.detail', compact('device', 'serviceNameList'));
    }

    public function edit($id)
    {
        $devices = new device();
        $deviceDetails = new deviceDetail();
        $services = new service();
        $deviceTypes = new deviceType();

        $servicesList = $services->getServices();
        $i = 0;

        $deviceTypeList =  $deviceTypes->getDeviceTypes();
        $j = 0;

        $device = $devices->getdeviceDetail($id);
        $deviceDetail = $deviceDetails->getServiceId($id);
        $serviceNames = $deviceDetail->implode('serviceName', ', ');
        $serviceNameList = explode(', ',$serviceNames);

        return view('admins.devices.edit', compact('servicesList', 'deviceTypeList', 'i', 'j', 'device', 'serviceNameList', 'serviceNames'));

    }

    public function update(Request $rq, $id)
    {
        $devices = new device();
        $services = new service();
        $deviceTypes = new deviceType();
        $deviceDetails = new deviceDetail();

        $servicesList = $services->getServices();
        $serviceNameList = explode(', ',$rq->serviceName);
        $serviceIdList = [];

        foreach($serviceNameList as $res){
            foreach($servicesList as $item){
                if($item->serviceName == $res){
                    $serviceIdList[] = $item->serviceId;
                }
            };
        }

        $deviceTypeId = $deviceTypes->getDeviceTypeName($rq->deviceTypeName)->deviceTypeId;

        $dataD = array_merge($rq->only('deviceName', 'deviceAddressIp', 'deviceActiveST', 'deviceConnectST', 'created_at'), ['deviceTypeId'=>$deviceTypeId], ['updated_at' => date('Y-m-d')]);
        $deviceUpdate = $devices->updateDevice($dataD, $id);

        $deviceDetailList = $deviceDetails->getServiceId($id);

        if(count($serviceIdList) == count($deviceDetailList)){
            for($i = 0; $i < count($serviceIdList); $i++){
                $dataDD = array_merge($rq->only('deviceId', 'created_at'), ['serviceId'=>$serviceIdList[$i]], ['updated_at' => date('Y-m-d')]);
                $deviceDetailId = $deviceDetailList[$i]->deviceDetailId;
                $deviceDetails->updateDeviceDetail($dataDD, $deviceDetailId);
            }
        }

        if(count($serviceIdList) < count($deviceDetailList)){
            for($i = 0; $i < count($serviceIdList); $i++){
                $dataDD = array_merge($rq->only('deviceId', 'created_at'), ['serviceId'=>$serviceIdList[$i]], ['updated_at' => date('Y-m-d')]);
                $deviceDetailId = $deviceDetailList[$i]->deviceDetailId;
                $deviceDetails->updateDeviceDetail($dataDD, $deviceDetailId);
            }

            while($i<count($deviceDetailList)){
                $deviceDetails->deleteDeviceDetail($deviceDetailList[$i]->deviceDetailId);
                $i++;
            }
        }

        $arrdate = ['created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')];

        if(count($serviceIdList) > count($deviceDetailList)){
            for($i = 0; $i < count($deviceDetailList); $i++){
                $dataDD = array_merge($rq->only('deviceId', 'created_at'), ['serviceId'=>$serviceIdList[$i]], ['updated_at' => date('Y-m-d')]);
                $deviceDetailId = $deviceDetailList[$i]->deviceDetailId;
                $deviceDetails->updateDeviceDetail($dataDD, $deviceDetailId);
            }

            while($i<count($serviceIdList)){
                $dataDD = array_merge(['deviceId'=>$id], ['serviceId'=>$serviceIdList[$i]], $arrdate);
                $deviceDetails->insertDeviceDetail($dataDD);
                $i++;
            }
        }

        $accountId = session()->get('accountId');
        activity()
            ->performedOn($devices)
            ->createdAt(now()->subDays(10))
            ->log('Người dùng '.$accountId.' đã cập nhật thiết bị '.$id );

        return redirect()->route('admins.devices.list');
    }
}
