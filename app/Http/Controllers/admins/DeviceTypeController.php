<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\deviceType;

class DeviceTypeController extends Controller
{
    const _PER_PAGE = 3;
    public function index()
    {
        $deviceTypes = new deviceType();

        $deviceTypesList = $deviceTypes->getAllDeviceTypes(self::_PER_PAGE);

        return view('admins.device_types.list', compact('deviceTypesList'));
    }

    public function getMore(Request $rq)
    {
        $deviceTypes = new deviceType();

        if($rq->ajax()) {
            $deviceTypesList = $deviceTypes->getAllDeviceTypes(self::_PER_PAGE);
            return view('admins.device_types.table', compact('deviceTypesList'))->render();
        }
    }

    public function add()
    {
        return view('admins.device_types.add');
    }

    public function store(Request $rq)
    {
        $deviceTypes = new deviceType();

        $arrdate = ['updated_at' => date('Y-m-d'), 'created_at' => date('Y-m-d')];

        $data = array_merge($rq->only('deviceTypeName'), $arrdate);

        $deviceTypeList = $deviceTypes->insertDeviceType($data);

        return redirect()->route('admins.device_types.list');
    }

    public function edit($id)
    {
        $deviceTypes = new deviceType();

        $deviceType = $deviceTypes->getDeviceTypeId($id);

        return view('admins.device_types.edit', compact('deviceType'));

    }

    public function update(Request $rq, $id)
    {
        $deviceTypes = new deviceType();

        $update_at = ['updated_at' => date('Y-m-d')];

        $data = array_merge($rq->only('deviceTypeName', 'created_at'), $update_at);

        $updateDeviceType = $deviceTypes->updateDeviceType($data, $id);

        return redirect()->route('admins.device_types.list');
    }

    public function delete($id)
    {
        $deviceTypes = new deviceType();

        $delete = $deviceTypes->deleteDeviceType($id);

        return redirect()->route('admins.device_types.list');
    }
}
