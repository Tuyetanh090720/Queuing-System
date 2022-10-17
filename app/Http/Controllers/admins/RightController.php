<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\right;
use App\Models\rightFunction;
use App\Models\rightDetail;


class RightController extends Controller
{
    const _PER_PAGE = 3;
    public function index()
    {
        $rights = new right();

        $rightsList = $rights->getAllRights(self::_PER_PAGE, '');

        foreach($rightsList as $item){
            $countRight = $rights->countRight($item->rightId);
            $countRightList[] = $countRight;
        }
        $i = 0;

        return view('admins.rights.list', compact('rightsList', 'countRightList', 'i'));

    }

    public function getMore(Request $rq)
    {
        $rights = new right();
        $keywords = $rq->keywords;

        if($rq->ajax()) {
            $rightsList = $rights->getAllRights(self::_PER_PAGE, $keywords);

            foreach($rightsList as $item){
                $countRight = $rights->countRight($item->rightId);
                $countRightList[] = $countRight;
            }
            $i = 0;

            return view('admins.rights.table', compact('rightsList', 'countRightList', 'i'))->render();
        }
    }

    public function add()
    {
        $rights = new right();
        $rightFunctions = new rightFunction();

        $rightFunctionList = $rightFunctions->getAllRightFunctions();

        $rightAndFunction1 = [];
        $rightAndFunction2 = [];
        $rightAndFunction3 = [];

        for($i = 0; $i < count($rightFunctionList); $i++){
            if($rightFunctionList[$i]->rightFunctionType == 1){
                $rightAndFunction1[] = $rightFunctionList[$i]->rightFunctionName;
            }
            if($rightFunctionList[$i]->rightFunctionType == 2){
                $rightAndFunction2[] = $rightFunctionList[$i]->rightFunctionName;
            }
            if($rightFunctionList[$i]->rightFunctionType == 3){
                $rightAndFunction3[] = $rightFunctionList[$i]->rightFunctionName;
            }
        }

        return view('admins.rights.add', compact('rightAndFunction1', 'rightAndFunction2', 'rightAndFunction3'));
    }

    public function store(Request $rq)
    {
        $rights = new right();
        $rightFunctions = new rightFunction();
        $rightDetails = new rightDetail();

        $arrdate = ['updated_at' => date('Y-m-d'), 'created_at' => date('Y-m-d')];

        $dataR = array_merge($rq->only('rightName', 'rightDescription'), $arrdate);
        $rightId = $rights->insertRight($dataR);

        $rightFunctionList = $rq->rightFunction;
        foreach($rightFunctionList as $item){
            $rightFunctionId[] = $rightFunctions->getRightFunctionName($item);
        }

        foreach($rightFunctionId as $item){
            $data = array_merge(['rightId'=>$rightId], ['rightFunctionId'=>$item], $arrdate);
            $rightDetails->insertRightDetail($data);
        }

        return redirect()->route('admins.rights.list');
    }

    public function edit($id)
    {
        $rights = new right();
        $rightFunctions = new rightFunction();
        $rightDetails = new rightDetail();

        $rightFunctionList = $rightFunctions->getAllRightFunctions();
        $rightAndFunction1 = [];
        $rightAndFunction2 = [];
        $rightAndFunction3 = [];

        for($i = 0; $i < count($rightFunctionList); $i++){
            if($rightFunctionList[$i]->rightFunctionType == 1){
                $rightAndFunction1[] = $rightFunctionList[$i]->rightFunctionName;
            }
            if($rightFunctionList[$i]->rightFunctionType == 2){
                $rightAndFunction2[] = $rightFunctionList[$i]->rightFunctionName;
            }
            if($rightFunctionList[$i]->rightFunctionType == 3){
                $rightAndFunction3[] = $rightFunctionList[$i]->rightFunctionName;
            }
        }

        $right = $rights->getRightID($id);

        $rightDetail = $rightDetails->getRightDetail($id);
        $functionName1 = [];
        $functionName2 = [];
        $functionName3 = [];

        for($i=0; $i<count($rightDetail); $i++){
            if($rightDetail[$i]->rightFunctionType == 1){
                $functionName1[] = $rightDetail[$i]->rightFunctionName;
            }
            if($rightDetail[$i]->rightFunctionType == 2){
                $functionName2[] = $rightDetail[$i]->rightFunctionName;
            }
            if($rightDetail[$i]->rightFunctionType == 3){
                $functionName3[] = $rightDetail[$i]->rightFunctionName;
            }
        }

        $x = 0;
        $y = 0;
        $z = 0;

        return view('admins.rights.edit', compact('right', 'rightAndFunction1', 'rightAndFunction2', 'rightAndFunction3', 'x', 'y', 'z', 'functionName1', 'functionName2', 'functionName3'));

    }

    public function update(Request $rq, $id)
    {
        $rights = new right();
        $rightFunctions = new rightFunction();
        $rightDetails = new rightDetail();

        $rightFunctionList = $rq->rightFunction;
        foreach($rightFunctionList as $item){
            $rightFunctionIdList[] = $rightFunctions->getRightFunctionName($item);
        }

        $dataR = array_merge($rq->only('rightName', 'rightDescription', 'created_at'), ['updated_at' => date('Y-m-d')]);
        $rights->updateRight($dataR, $id);

        $rightDetailList = $rightDetails->getRightDetailId($id);

        if(count($rightFunctionIdList) == count($rightDetailList)){
            for($i = 0; $i < count($rightFunctionIdList); $i++){
                $dataRD = array_merge($rq->only('rightId', 'created_at'), ['rightFunctionId'=>$rightFunctionIdList[$i]], ['updated_at' => date('Y-m-d')]);
                $rightDetailId = $rightDetailList[$i]->rightDetailId;
                $rightDetails->updateRightDetail($dataRD, $rightDetailId);
            }
        }

        if(count($rightFunctionIdList) < count($rightDetailList)){
            for($i = 0; $i < count($rightFunctionIdList); $i++){
                $dataRD = array_merge($rq->only('rightId', 'created_at'), ['rightFunctionId'=>$rightFunctionIdList[$i]], ['updated_at' => date('Y-m-d')]);
                $rightDetailId = $rightDetailList[$i]->rightDetailId;
                $rightDetails->updateRightDetail($dataRD, $rightDetailId);
            }

            while($i<count($rightDetailList)){
                $rightDetails->deleteRightDetail($rightDetailList[$i]->rightDetailId);
                $i++;
            }
        }

        $arrdate = ['created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')];

        if(count($rightFunctionIdList) > count($rightDetailList)){
            for($i = 0; $i < count($rightDetailList); $i++){
                $dataRD = array_merge($rq->only('rightId', 'created_at'), ['rightFunctionId'=>$rightFunctionIdList[$i]], ['updated_at' => date('Y-m-d')]);
                $rightDetailId = $rightDetailList[$i]->rightDetailId;
                $rightDetails->updateRightDetail($dataRD, $rightDetailId);
            }

            while($i<count($rightFunctionIdList)){
                $dataRD = array_merge(['rightId'=>$id], ['rightFunctionId'=>$rightFunctionIdList[$i]], $arrdate);
                $rightDetails->insertRightDetail($dataRD);
                $i++;
            }
        }
        return redirect()->route('admins.rights.list');
    }

    public function delete($id)
    {
        $rights = new right();

        $delete = $rights->deleteRight($id);

        return redirect()->route('admins.rights.list');
    }
}
