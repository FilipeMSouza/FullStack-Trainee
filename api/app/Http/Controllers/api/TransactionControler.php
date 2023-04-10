<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\TransactionRequest;
use App\Models\Transactions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionControler extends Controller
{
    public function index()
    {
        return Transactions::query()->orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $NewTransaction = $request->all();
        $transaction = new Transactions();
        $transaction->name = $NewTransaction['name'];
        $transaction->category = $NewTransaction['category'];
        $transaction->value = $NewTransaction['value'];
        $transaction->type = $NewTransaction['type'];
        $transaction->save();
        return $transaction;
    }

    public function update(int $transactions, Request $request)
    {

        Transactions::where("id", $transactions)->update($request->all());
    }

    public function destroy(int $transaction)
    {
        Transactions::destroy($transaction);
        return response()->noContent();
    }

    public function show(Transactions $transaction)
    {
        return $transaction;
    }
}
