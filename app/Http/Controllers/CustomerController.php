<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Address;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::with('address')->paginate(10);
        return view ('customer',compact('customers'));
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
    public function store(StoreCustomerRequest $request)
    {
        $address = Address::create([
            'street_one' => $request->input('streetOne'),
            'street_two' => $request->input('streetTwo'),
            'municipality' => $request->input('municipality'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('zipCode'),
        ]);

        // Create the customer with the associated address
        $customer = Customer::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email_address' => $request->input('email_address'),
            'address_id' => $address->id,
        ]);

        //Create log for the creating customer
        DB::table('logs')->insert([
            'user_id' => Auth::id(),
            'action' => 'Created new customer, ' . $customer->first_name . ' ' . $customer->last_name,
            'logged_date' => now()->toDateString(),
            'logged_time' => now()->toTimeString(),
        ]);
        return redirect()->route('customers.index')->with('status', 'Customer was created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
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
    public function update(UpdateCustomerRequest $request, Customer $customer)
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
