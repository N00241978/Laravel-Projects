<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the search input
        $search = $request->input('search');

        // Fetch all accounts from the database
        if ($search) {
            $accounts = Account::where('id', 'like', "%{$search}%")
                ->get();
        } else {
            $accounts = Account::all();
        }


        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    public function show(Account $account)
    {
        $customers = $account->customers;
        return view('accounts.show')->with('account', $account)->with('customers', $customers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        return view('accounts.edit')->with('account', $account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        // Validate input
        $request->validate([
            'balance' => 'required|decimal:2',
            'date_opened' => 'required|date',
            'account_status' => 'required'
        ]);

        // Create an account record in the database
        $account->update([
            'balance' => $request->balance,
            'date_opened' => $request->date_opened,
            'account_status' => $request->account_status,
        ]);

        // Redirect to the index page with a success message
        return to_route('accounts.show', $account)->with('success', 'Account created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
