<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // Get the search input
        $search = $request->input('search');

        // Fetch all customers from the database
        if ($search) {
            $customers = User::where('role', 'customer')
                ->where('name', 'like', "%{$search}%")
                ->get();
        } else {
            $customers = User::where('role', 'customer')->get();
        }


        // Send the customers to the index view
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
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

        // Create a book record in the database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imageName, // Store the image URL in the DB
            'address' => $request->address,
            'role' => "customer"
        ]);

        // Redirect to the index page with a success message
        return to_route('customers.index')->with('success', 'Customer created successfully! Yipeee!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $customer)
    {
        return view('customers.show')->with('customer', $customer); //fetches the customer and passes to view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $customer)
    {
        return view('customers.edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     */
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

        // Create a book record in the database
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imageName ?? $customer->image,
            'address' => $request->address
        ]);

        // Redirect to the index page with a success message
        return to_route('customers.index')->with('success', 'Customer created successfully! Yipeee!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $customer)
    {
        User::where('id', $customer->id)->delete();

        return to_route('customers.index')->with('success', 'Customer was deleted successfully');
    }
}
