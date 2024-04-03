<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Address;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class SupplierController extends Controller
{
  /**
    * Display a listing of the resource.
  */
  public function index(Request $request)
  {   
    Session::flash('index_success', 'You are currently viewing the suppliers page!');
    if (Gate::denies('admin-access-only', Auth::user())) {
      return redirect()->back()->with('error', 'You do not have authorization. Access denied!');
    }
        
    $query = Supplier::search($request->filled('search') ? $request->search : '');

    if ($request->filled('sort')) {
      $sortColumn = $request->input('sort');
      $sortDirection = $request->input('direction', 'asc'); 
      
      $query->orderBy($sortColumn, $sortDirection);
    }else{
      $query->orderBy('id', 'asc');
    }

    $suppliers = $query->paginate(5)->withQueryString();
    $suppliers->load('address');
    return view('supplier', compact('suppliers'));
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
  public function store(StoreSupplierRequest $request)
  {
    $address = Address::create([
      'street_one' => $request->input('street_one'),
      'street_two' => $request->input('street_two'),
      'municipality' => $request->input('municipality'),
      'city' => $request->input('city'),
      'zip_code' => $request->input('zip_code'),
    ]);

    $supplier = Supplier::create([
      'company_name' => $request->input('company_name'),
      'company_abbreviation' => $request->input('company_abbreviation'),
      'email_address' => $request->input('email_address'),
      'address_id' => $address->id,
    ]);

    DB::table('logs')->insert([
      'user_id' => Auth::id(),
      'action' => 'Created new supplier, ' . $supplier->company_name,
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);

    return redirect()->route('suppliers.index')->with('create_success', 'Supplier '.$supplier->company_name.' was created successfully');
  }

  /**
    * Display the specified resource.
  */
  public function show(Supplier $supplier)
  {
    //
  }

  /**
    * Show the form for editing the specified resource.
  */
  public function edit(Supplier $supplier)
  {
    //
  }

  /**
    * Update the specified resource in storage.
  */
  public function update(UpdateSupplierRequest $request, Supplier $supplier)
  {
    $supplier = Supplier::with('address')->find($supplier->id);
    $supplier->update($request->only(['company_name', 'company_abbreviation', 'email_address']));

    if($supplier->address){
      $supplier->address->update($request->only(['street_one', 'street_two', 'municipality', 'city', 'zip_code']));
    }else{
      $supplier->address()->create($request->only(['street_one', 'street_two', 'municipality', 'city', 'zip_code']));
    }

    DB::table('logs')->insert([
      'user_id' => Auth::id(),
      'action' => 'Updated supplier whose id is ' . $supplier->id . '',
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);

    return redirect()->route('suppliers.index')->with('success','Supplier was updated successfully');
  }

  /**
    * Remove the specified resource from storage.
  */
  public function destroy(Supplier $supplier)
  {
    if ($supplier->products()->where('quantity', '>', 0)->exists()) {
      return redirect()->route('suppliers.index')->with('error', 'Supplier has associated products with quantity greater than 0. Unable to delete.');
    }
        
    if($supplier->address) {
      $supplier->address->delete();
    }

    $supplier->delete();

    DB::table('logs')->insert([
      'user_id' => Auth::id(),
      'action' => 'Deleted supplier, ' . $supplier->company_name,
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);

    return redirect()->route('suppliers.index')->with('success','Supplier was deleted successfully');
  }
}
