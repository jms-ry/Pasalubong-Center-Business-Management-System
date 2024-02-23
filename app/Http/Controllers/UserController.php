<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
  /**
    * Display a listing of the resource.
  */
  public function index(Request $request)
  {
    if (Gate::denies('admin-access-only', Auth::user())) {
      return redirect()->back()->with('error', 'You do not have authorization. Access denied!');
    }

    $query = User::search($request->filled('search') ? $request->search : '');

    if ($request->filled('sort')) {
      $sortColumn = $request->input('sort');
      $sortDirection = $request->input('direction', 'asc'); 

      $query->orderBy($sortColumn, $sortDirection);
    }else{
      $query->orderBy('id', 'asc');
    }

    $users = $query->paginate(5);

    // Load relationships after retrieving search results
    $users->load('address');

    return view('account', compact('users'));
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
    $address = Address::create([
      'street_one' => $request->input('street_one'),
      'street_two' => $request->input('street_two'),
      'municipality' => $request->input('municipality'),
      'city' => $request->input('city'),
      'zip_code' => $request->input('zip_code'),
    ]);

    $user = User::create([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'role' => $request->input('role'),
      'password' => bcrypt('password'),
      'address_id' => $address->id
    ]);

        
    DB::table('logs')->insert([
      'user_id' =>Auth::id(),
      'action' => 'Created new account for ' . $user->name,
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);

    return redirect()->back()->with('success', 'Account for ' . $user->name . ' was created successfully');
  }

  /**
    * Display the specified resource.
  */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
  */
  public function edit(string $id)
  {
     //
  }

  /**
    * Update the specified resource in storage.
  */
  public function update(Request $request, string $id)
  {
    $user = User::findOrFail($id);
    $user->update($request->only(['name', 'email', 'role']));

    if($user->address){
      $user->address->update($request->only(['street_one', 'street_two', 'municipality', 'city', 'zip_code']));
    }else{
      $user->address()->create($request->only(['street_one', 'street_two', 'municipality', 'city', 'zip_code']));
    }

    DB::table('logs')->insert([
      'user_id' => Auth::id(),
      'action' => 'Updated user whose id is ' . $user->id . '',
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);
    
    return redirect()->back()->with('success', 'Account user was updated successfully');
    
  }

  /**
    * Remove the specified resource from storage.
  */
  public function destroy(string $id)
  {
    $user = User::findOrFail($id);
    $user->delete();

    DB::table('logs')->insert([
      'user_id' =>Auth::id(),
      'action' => 'Deleted the account of ' . $user->name,
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);
    return redirect()->back()->with('success', 'Account for ' . $user->name . ' was deleted successfully');
  }
}
