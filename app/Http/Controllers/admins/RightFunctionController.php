<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rightFunction;
use Illuminate\Support\Facades\Auth;

class RightFunctionController extends Controller
{

    public function index()
    {
        $rightFunctions = new rightFunction();

        $rightFunctionList = $rightFunctions->getAllRightFunctions();

        return view('admins.right_functions.list', compact('rightFunctionList'));

    }

    public function add()
    {
        return view('admins.right_functions.add');
    }

    public function store(Request $rq)
    {
        $rightFunctions = new rightFunction();

        $arrdate = ['updated_at' => date('Y-m-d'), 'created_at' => date('Y-m-d')];

        $data = array_merge($rq->only('rightFunctionName', 'rightFunctionType'), $arrdate);

        $rightFunctionId = $rightFunctions->insertRightFunction($data);

        $accountId = session()->get('accountId');
        activity()
            ->performedOn($rightFunctions)
            ->createdAt(now()->subDays(10))
            ->log('Người dùng '.$accountId.' đã thêm phân quyền tài khoản '.$rightFunctionId );

        return redirect()->route('admins.right_functions.list');
    }

    public function edit($id)
    {
        $rightFunctions = new rightFunction();

        $rightFunction = $rightFunctions->getRightFunctionDetail($id);

        return view('admins.right_functions.edit', compact('rightFunction'));

    }

    public function update(Request $request, $id)
    {
        $rightFunctions = new rightFunction();

        $update_at = ['updated_at' => date('Y-m-d')];

        $data = array_merge($request->only('rightFunctionName', 'rightFunctionType', 'created_at'), $update_at);

        $updateorder = $rightFunctions->updateRightFunction($data, $id);

        $accountId = session()->get('accountId');
        activity()
            ->performedOn($rightFunctions)
            ->createdAt(now()->subDays(10))
            ->log('Người dùng '.$accountId.' đã cập nhật phân quyền tài khoản '.$id );

        return redirect()->route('admins.right_functions.list');
    }

    public function delete($id)
    {
        $rightFunctions = new rightFunction();

        $delete = $rightFunctions->deleteRightFunction($id);

        $accountId = session()->get('accountId');

        activity()
        ->performedOn($rightFunctions)
        ->createdAt(now()->subDays(10))
        ->log('Người dùng '.$accountId.' đã xóa phân quyền tài khoản '.$id );

        return redirect()->route('admins.right_functions.list');
    }
}
