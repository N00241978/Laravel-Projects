<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

use App\Models\Account;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Account $account)
    {
        return view('transactions.create', compact('account'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Account $account, Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required',
            'amount' => 'required|max:500',
        ]);

        $account->transactions()->create([
            'title' => $request->title,
            'amount' => $request->amount,
            'old_balance' => $account->balance,
            'new_balance' => $account->balance + $request->amount
        ]);

        $account->update(['balance' => $account->balance + $request->amount]);


        // Redirect to the index page with a success message
        return to_route('accounts.show', $account)->with('success', 'Customer created successfully! Yipeee!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transaction.edit')->with('transaction', $transaction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        // Validate input
        $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'old_balance' => 'required',
            'new_balance' => 'required'
        ]);

        // Create an transaction record in the database
        $transaction->update([
            'title' => $request->title,
            'amount' => $request->amount,
            'old_balance' => $request->old_balance,
            'new_balance' => $request->new_balance
        ]);

        // Redirect to the index page with a success message
        return to_route('accounts.transactions.show', [$transaction->account, $transaction])->with('success', 'Transaction created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account, Transaction $transaction)
    {
        Transaction::where('id', $transaction->id)->delete();

        return to_route('accounts.show', $account)->with('success', 'Transaction was deleted successfully');
    }
}
