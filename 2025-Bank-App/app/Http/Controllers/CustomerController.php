<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all(); //fetch all customer
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        public function store(Request $request)
        {
            // Validate input
            $request->validate([
                'title' => 'required',
                'description' => 'required|max:500',
                'year' => 'required|integer',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Check if the image is uploaded and handle it
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/books'), $imageName);
            }

            // Create a book record in the database
            Book::create([
                'title' => $request->title,
                'description' => $request->description, // Fixed typo from 'descriptn'
                'year' => $request->year,
                'image' => $imageName, // Store the image URL in the DB
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Redirect to the index page with a success message
            return to_route('books.index')->with('success', 'Book created successfully!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show')->with('customer', $customer); //fetches the customer and passes to view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
