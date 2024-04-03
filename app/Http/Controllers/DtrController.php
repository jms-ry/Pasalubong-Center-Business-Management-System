<?php

namespace App\Http\Controllers;

use App\Models\dtr;
use App\Http\Requests\StoredtrRequest;
use App\Http\Requests\UpdatedtrRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class DtrController extends Controller
{
  /**
    * Display a listing of the resource.
  */
  public function index(Request $request)
  {
    Session::flash('index_success', 'You are currently viewing the dtrs page!');
    $user = auth()->user();
    $query = Dtr::whereNotNull('signed_out_time');
    
    if ($user->role != 'admin') {
      $query->where('user_id', $user->id);
    }

    // Search functionality
    if ($request->filled('search')) {
      $query->whereHas('user', function ($query) use ($request) {
          $query->where('name', 'like', '%' . $request->search . '%');
      });
    }
    // Sort functionality
    if ($request->filled('sort')) {
      $sortColumn = $request->input('sort');
      $sortDirection = $request->input('direction', 'asc');

      // Handle sorting based on selected column
      if ($sortColumn === 'logged_date' || $sortColumn === 'signed_in_time' || $sortColumn === 'signed_out_time') {
          $query->orderBy($sortColumn, $sortDirection);
      } elseif ($sortColumn === 'name') {
        $query->leftJoin('users', 'dtrs.user_id', '=', 'users.id')
        ->orderBy('users.name', $sortDirection);
      }
    } else {
      // Sort by DTR id by default
      $query->orderBy('id', 'asc');
    }
    $dtrs = $query->paginate(10)->withQueryString();
    return view('dtr', compact('dtrs'));
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
  public function store(StoredtrRequest $request)
  {
    //
  }

  /**
    * Display the specified resource.
  */
  public function show(dtr $dtr)
  {
    //
  }

  /**
    * Show the form for editing the specified resource.
  */
  public function edit(dtr $dtr)
  {
    //
  }

  /**
    * Update the specified resource in storage.
  */
  public function update(UpdatedtrRequest $request, dtr $dtr)
  {
    //
  }

  /**
    * Remove the specified resource from storage.
  */
  public function destroy(dtr $dtr)
  {
    //
  }
}
