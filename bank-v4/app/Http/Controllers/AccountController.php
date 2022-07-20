<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $accounts = Account::all();

        $sort = '';
        if (isset($request->search)) {
            $accounts = Account::where('name', 'like', '%' . $request->search . '%')->get();
        } else if (isset($request->sort)) {
            if ($request->sort == 'desc') {
                $sort = 'asc';
            } else {
                $sort = 'desc';
            }

            $accounts = match ($request->sortCol) {
                'id' => Account::orderBy($request->sortCol, $request->sort)->get(),
                'name' => Account::orderBy($request->sortCol, $request->sort)->get(),
                'surname' => Account::orderBy($request->sortCol, $request->sort)->get(),
                'bankAccount' => Account::orderBy($request->sortCol, $request->sort)->get(),
                'identityCode' => Account::orderBy($request->sortCol, $request->sort)->get(),
                'balance' => Account::orderBy($request->sortCol, $request->sort)->get(),
                default => Account::all()
            };
        } else {
            $accounts = Account::all();
        }
        return view('account.index', ['accounts' => $accounts, 'sort' => $sort]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create', ['iban' => Account::generateIban()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new Account;
        $account->name = $request->name;
        $account->surname = $request->surname;
        $account->identityCode = $request->identityCode;
        $account->bankAccount = Account::generateIban();
        $account->balance = 0;
        $account->save();
        return redirect()->route('accounts-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($addOrWithdraw, Account $account)
    {
        if ($addOrWithdraw === 'add') {
            return view('account.addFunds', ['account' => $account]);
        }
        return view('account.withdrawFunds', ['account' => $account]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update($addOrWithdraw, Account $account, Request $request)
    {
        if ($addOrWithdraw === 'add') {
            $account->balance += $request->sum;
        } else {
            $account->balance -= $request->sum;
        }
        $account->save();
        return redirect()->route('accounts-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts-index');
    }
}
