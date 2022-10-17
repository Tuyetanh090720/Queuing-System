<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\account;
use App\Models\right;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
class AccountController extends Controller
{
    const _PER_PAGE = 3;
    // public function showLogin(){
    //     return view('auth.login');
    // }

    // public function login(Request $rq){

    //     dd(Auth::attempt(['accountLogin' => $rq->accountLogin]));

    //     if (Auth::attempt(['accountLogin' => $rq->accountLogin, 'accountPw' => $rq->password])) {
    //         dd($rq->accountLogin);
    //         return redirect()->route('admins.dashboard');
    //     } else {
    //         dd($rq->accountLogin);
    //     }
    // }
    public function index()
    {
        $accounts = new account();
        $accountsList = $accounts->getAllAccounts(self::_PER_PAGE, '', '');

        return view('admins.accounts.list', compact('accountsList'));
    }

    public function getMore(Request $rq)
    {
        $accounts = new account();
        $keywords = $rq->keywords;
        $accountActiveST = $rq->accountActiveST;

        if($rq->ajax()) {
            $accountsList = $accounts->getAllAccounts(self::_PER_PAGE, $keywords, $accountActiveST);

            return view('admins.accounts.table', compact('accountsList'))->render();
        }
    }

    // public function diary()
    // {
    //     return view('admins.accounts.diary');
    // }

    public function add()
    {
        $rights = new right();
        $rightList = $rights->getRights();
        $index = 0;

        return view('admins.accounts.add', compact('rightList', 'index'));
    }

    public function store(Request $rq)
    {
        $accounts = new account();

        $rights = new right();
        $rightsList = $rights->getRights();

        foreach($rightsList as $item){
            if($item->rightName == $rq->rightName){
                $rightId = $item->rightId;
            }
        };


        $arrdate = ['created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')];

        $data = array_merge($rq->only('accountName','accountLogin', 'accountPw', 'accountPhone', 'accountEmail', 'accountActiveST'), ['rightId' => $rightId], $arrdate);

        $insert = $accounts->insertAccount($data);

        return redirect()->route('admins.accounts.list');
    }

    public function detail($id)
    {
        $accounts = new account();
        $account = $accounts->getAccountDetail($id);

        return view('admins.accounts.detail', compact('account'));
    }

    public function edit($id)
    {
        $accounts = new account();
        $account = $accounts->getAccountDetail($id);

        $rights = new right();
        $right = $rights->getRightID($account->rightId);
        $rightList = $rights->getRights();
        $index = 0;

        return view('admins.accounts.edit', compact('account', 'right', 'rightList', 'index'));

    }

    public function update(Request $rq, $id)
    {
        $accounts = new account();

        $rights = new right();
        $rightsList = $rights->getRights();

        foreach($rightsList as $item){
            if($item->rightName == $rq->rightName){
                $rightId = $item->rightId;
            }
        };

        $arrdate = ['created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')];

        $data = array_merge($rq->only('accountName','accountLogin', 'accountPw', 'accountPhone', 'accountEmail', 'accountActiveST'), ['rightId' => $rightId], $arrdate);

        $update = $accounts->updateAccount($data, $id);

        return redirect()->route('admins.accounts.list');
    }
}
