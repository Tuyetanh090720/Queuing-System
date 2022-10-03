<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\account;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = new account();

        // $ticketTypesList = $devices->getAllTicketTypes();

        // return view('admins.ticket_types.lists', compact('ticketTypesList'));

        return view('admins.accounts.list');

    }

    public function add()
    {
        return view('admins.accounts.add');
    }

    // public function store(Request $rq)
    // {
    //     $arrdate = ['updated_at' => date('Y-m-d'), 'created_at' => date('Y-m-d')];

    //     $data = array_merge($rq->only('ticketTypeName', 'ticketTypeHeight', 'weekdays', 'money'), $arrdate);

    //     $ticketTypes = new ticketType();

    //     $ticketTypesList = $ticketTypes->addTicketTypes($data);

    //     return redirect()->route('admins.ticket_types.lists');
    // }

    public function detail()
    {
        return view('admins.accounts.detail');
    }

    public function edit($id)
    {
        // $ticketTypes = new ticketType();

        // $ticketType = $ticketTypes->getTicketTypes($id);

        // return view('admins.ticket_types.edit', compact('ticketType'));
        return view('admins.accounts.edit');

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
    public function diary()
    {
        return view('admins.accounts.diary');
    }
}
