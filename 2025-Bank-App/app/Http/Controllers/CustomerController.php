<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function index(Request $request)
    {

        // Get the search input
        $search = $request->input('search');

        // Fetch all customers from the database
        if ($search) {
            $customers = User::where('role', 'customer')    // Finds by name
                ->where('name', 'like', "%{$search}%")
                ->get();
        } else {
            $customers = User::where('role', 'customer')->get();  // Finds only the customers
        }


        // Send the customers to the index view
        return view('customers.index', compact('customers'));
    }

    // Shows the customer create form
    public function create()
    {
        return view('customers.create');
    }

    
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|max:500',
            'phone' => 'required|string',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if the image is uploaded and handle it
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/customers'), $imageName);
        }

        // Create a new customer record in the database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imageName, // Store the image URL in the DB
            'address' => $request->address,
            'role' => "customer",
            'password' => Hash::make($request->password),  // Hash the password

        ]);

        // Redirect to the index page with a success message
        return to_route('customers.index')->with('success', 'Customer created successfully! Yipeee!!');
    }


    // Display specific customer
    public function show(User $customer)
    {
        $accounts = $customer->accounts;
        return view('customers.show')->with('customer', $customer)->with('accounts', $accounts); //fetches the customer and passes to view
    }

    // Show editing form
    public function edit(User $customer)
    {
        return view('customers.edit')->with('customer', $customer);
    }

    // update current customer record
    public function update(Request $request, User $customer)
    {
        // Validate input
        $request->validate([
            'name' => 'required',
            'email' => 'required|max:500',
            'phone' => 'required|string',
            'address' => 'required',
        ]);

        // Check if the image is uploaded and handle it
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/customers'), $imageName);
        }

        // Create a record in the database
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imageName ?? $customer->image,
            'address' => $request->address
        ]);

        // Redirect to the index page with a success message
        return to_route('customers.index')->with('success', 'Customer updated successfully!');
    }

    // Delete a customer from the database
    public function destroy(User $customer)
    {
        User::where('id', $customer->id)->delete();

        return to_route('customers.index')->with('success', 'Customer was deleted successfully');
    }
}
