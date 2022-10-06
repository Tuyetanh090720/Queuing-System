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

        $accountsList = $accounts->getAllAccounts();

        return view('admins.accounts.list', compact('accountsList'));

    }

    // public function diary()
    // {
    //     return view('admins.accounts.diary');
    // }

    public function add()
    {
        return view('admins.accounts.add');
    }

    public function store(Request $rq)
    {
        $accounts = new account();

        $rights = new right();
        $rightsList = $rights->getAllRights();

        foreach($rightsList as $item){
            if($item->rightName == $rq->rightName){
                $rightId = $item->rightId;
            }
        };

        $accounts->accountName = $rq->accountName;

        $accounts->accountPhone = $rq->accountPhone;

        $accounts->accountEmail = $rq->accountEmail;

        $accounts->rightId = $rightId;

        $accounts->accountLogin = $rq->accountLogin;

        $accounts->accountPw = bcrypt($rq->accountPw);

        $accounts->updated_at = date('Y-m-d');

        $accounts->created_at = date('Y-m-d');

        $accounts->accountActiveST = $rq->accountActiveST;

        $accounts->save();

        return redirect()->route('login');
    }

    public function detail($id)
    {
        $accounts = new account();
        $account = $accounts->getAccountDetail($id);

        $rights = new right();
        $right = $rights->getRightID($account->rightId);

        return view('admins.accounts.detail', compact('account', 'right'));
    }

    public function edit($id)
    {
        $accounts = new account();
        $account = $accounts->getAccountDetail($id);

        $rights = new right();
        $right = $rights->getRightID($account->rightId);

        return view('admins.accounts.edit', compact('account', 'right'));

    }

    // public function update(Request $request, $id)
    // {
    //     $ticketTypes = new ticketType();

    //     $update_at = ['updated_at' => date('Y-m-d')];

    //     // gán dữ liệu gửi lên vào biến data
    //     $data = array_merge($request->only('ticketTypeName', 'ticketTypeHeight', 'weekdays', 'money', 'created_at'), $update_at);

    //     $updateorder = $ticketTypes->updateTicketTypes($data, $id);

    //     return redirect()->route('admins.ticket_types.lists');
    // }

    // public function delete($id)
    // {
    //     $ticketTypes = new ticketType();

    //     $delete = $ticketTypes->deleteTicketTypes($id);

    //     return redirect()->route('admins.ticket_types.lists');
    // }

}
