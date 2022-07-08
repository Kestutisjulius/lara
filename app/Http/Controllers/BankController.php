<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;


class BankController extends Controller
{

    public function index(Request $request)
    {
        $accounts = Bank::all();
        $msg = $request->session()->get('msg', '');
        return view('bank.index', ['accounts'=>$accounts, 'msg'=>$msg]);
    }

    public function create()
    {
        return view('bank.create');
    }

    public function store(Request $request)
    {
        $account = new Bank;
        $account->name = $request->name;
        $account->email = $request->email;
        $account->person_code = $request->p_code;
        $account->bank_code = $request->a_code;
        $account->amount = $request->amount;

        $account->save();
        return redirect()->route('bank_index');
    }

    public function show(Bank $bank)
    {
        //
    }

    public function edit(Bank $bank)
    {
        return view('bank.edit', ['bank'=>$bank]);
    }

    public function update(Request $request, Bank $bank)
    {
        $bank->name = $request->name;
        $bank->email = $request->email;
        $bank->person_code = $request->p_code;
        $bank->bank_code = $request->a_code;
        $bank->amount = $request->amount;
        $bank->save();
        return redirect()->route('bank_index');
    }

    public function destroy(Bank $bank)
    {
        if ($bank->amount != 0){
            return redirect()->route('bank_index')->with('msg', 'still not NULL');
        }
        $bank->delete();
        return redirect()->route('bank_index');
    }
    public function transfer(Bank $bank) //GET
    {
        return view('bank.transfer', ['bank'=>$bank]);
    }
    public function transferDo(Request $request, Bank $bank) //PUT
    {
        $bank->amount -= $request->suma;
        $bank->save();
        foreach (Bank::all() as $account)
        {
            if ($account->bank_code === $request->toAccount) {
                $account->amount += $request->suma;
                $account->save();
            }
        }
        return redirect()->route('bank_index');
    }

}
