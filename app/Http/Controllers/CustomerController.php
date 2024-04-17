<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Address;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class CustomerController extends Controller
{
  /**
    * Display a listing of the resource.
  */
  public function index(Request $request)
  {
    Session::flash('index_success', 'You are currently viewing the customers page!');
    $query = Customer::search($request->filled('search') ? $request->search : '');

    if ($request->filled('sort')) {
      $sortColumn = $request->input('sort');
      $sortDirection = $request->input('direction', 'asc'); 
      
      $query->orderBy($sortColumn, $sortDirection);
    }else{
      $query->orderBy('id', 'asc');
    }
          
    $customers = $query->paginate(5)->withQueryString();
    $customers->load('address');
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
    return redirect()->back()->with('create_success', 'Customer '.$customer->first_name.' was created successfully');
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
    $customer = Customer::with('address')->find($customer->id);
    $customer->update($request->only(['first_name', 'last_name', 'email_address']));
    // Update address details
    if ($customer->address) {
      $customer->address->update($request->only(['street_one', 'street_two', 'municipality', 'city', 'zip_code']));
    } else {
      // If no address exists, create a new one
      $customer->address()->create($request->only(['street_one', 'street_two', 'municipality', 'city', 'zip_code']));
    }

    DB::table('logs')->insert([
      'user_id' => Auth::id(),
      'action' => 'Updated customer whose id is ' . $customer->id . '',
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);

    return redirect()->back()->with('success','Customer whose id is ' . $customer->id . ' was updated successfully');
  }

  /**
    * Remove the specified resource from storage.
  */
  public function destroy(Customer $customer)
  {
    // Check if the customer has an associated address
    if ($customer->address) {
      // Delete the associated address
      $customer->address->delete();
    }

    // Delete the customer
    $customer->delete();

    //Create log for the deleting customer
    DB::table('logs')->insert([
      'user_id' => Auth::id(),
      'action' => 'Deleted customer, ' . $customer->first_name . ' ' . $customer->last_name,
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);

    return redirect()->back()->with('success', 'Customer ' . $customer->first_name . ' was deleted successfully.');
  }
}
