<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Address;
use App\Models\User;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  /**
    * Display a listing of the resource.
  */
  public function index(Request $request)
  {
    if (Gate::denies('admin-access-only', Auth::user())) {
      return redirect()->back()->with('error', 'You do not have authorization. Access denied!');
    }

    $query = Employee::query()->with('user.address');

    if ($request->filled('search')) {
      // Search in the user's name, role, and email
      $query->whereHas('user', function ($query) use ($request) {
        $query->where('name', 'like', '%'.$request->search.'%')
          ->orWhere('role', 'like', '%'.$request->search.'%')
          ->orWhere('email', 'like', '%'.$request->search.'%');
      });
    }

    if ($request->filled('sort')) {
      $sortColumn = $request->input('sort');
      $sortDirection = $request->input('direction', 'asc');

      // Handle sorting based on user attributes
      if ($sortColumn === 'name' || $sortColumn === 'role' || $sortColumn === 'email') {
        $query->join('users', 'employees.user_id', '=', 'users.id')
          ->orderBy('users.'.$sortColumn, $sortDirection);
      } else {
        // Sort by employee id by default
        $query->orderBy('employees.id', $sortDirection);
      }

    } else {
      // Sort by employee id by default
      $query->orderBy('employees.id', 'asc');
    }

    $employees = $query->paginate(5)->withQueryString();
    

    return view('employee', compact('employees'));
  }

  /**
    * Show the form for creating a new resource.
  */
  public function create()
  {
        
  }

  /**
    * Store a newly created resource in storage.
  */
  public function store(StoreEmployeeRequest $request)
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

    $employee = Employee::create([
      'user_id' => $user->id  
    ]);

    DB::table('logs')->insert([
      'user_id' =>Auth::id(),
      'action' => 'Created new employee, ' . $employee->user->name,
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);

      return redirect()->back()->with('success', 'Employee was created successfully');
  }

  /**
    * Display the specified resource.
  */
  public function show(Employee $employee)
  {
    //
  }

  /**
    * Show the form for editing the specified resource.
  */
  public function edit(Employee $employee)
  {
    //
  }

  /**
    * Update the specified resource in storage.
  */
  public function update(UpdateEmployeeRequest $request, Employee $employee)
  {
    $user =  User::with('address')->find($employee->user->id);

    $user->update($request->only(['name', 'email', 'role']));

    if($user->address){
      $user->address->update($request->only(['street_one', 'street_two', 'municipality', 'city', 'zip_code']));
    }else{
      $user->address()->create($request->only(['street_one', 'street_two', 'municipality', 'city', 'zip_code']));
    }

    DB::table('logs')->insert([
      'user_id' => Auth::id(),
      'action' => 'Updated employee whose id is ' . $employee->id . '',
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);

    return redirect()->back()->with('success', 'Employee was updated successfully');

  }

  /**
    * Remove the specified resource from storage.
  */
  public function destroy(Employee $employee)
  {
    if($employee->user){
      if($employee->user->address){
        $employee->user->address->delete();
      }
      $employee->user->delete();
    }
    $employee->user->delete();

    DB::table('logs')->insert([
      'user_id' => Auth::id(),
      'action' => 'Deleted customer, ' . $employee->user->name . ' ' ,
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);

    return redirect()->back()->with('success', 'Employee was deleted successfully');
  }
}
