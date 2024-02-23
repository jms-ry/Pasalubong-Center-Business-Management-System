<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Http\Requests\StoreLogRequest;
use App\Http\Requests\UpdateLogRequest;
use Illuminate\Http\Request;
class LogController extends Controller
{
  /**
    * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $user = auth()->user();
    $query = Log::query();

    // Filter logs based on user role
    if ($user->role != 'admin') {
      $query->where('user_id', $user->id);
    }

    // Search functionality
    if ($request->filled('search')) {
      $query->where(function ($query) use ($request) {
        $query->where('action', 'like', '%' . $request->search . '%')
          ->orWhereHas('user', function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
          });
        });
      }

    // Sort functionality
    if ($request->filled('sort')) {
      $sortColumn = $request->input('sort');
      $sortDirection = $request->input('direction', 'asc');

      if ($sortColumn === 'user_name') {
        $query->leftJoin('users', 'logs.user_id', '=', 'users.id')
        ->orderBy('users.name', $sortDirection);
      } elseif ($sortColumn === 'activity') {
        $query->orderBy('action', $sortDirection);
      }
    }else {
      $query->orderBy('id', 'asc');
    }

    $logs = $query->paginate(10)->withQueryString();
    return view('log', compact('logs'));
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
  public function store(StoreLogRequest $request)
  {
    //
  }

  /**
    * Display the specified resource.
  */
  public function show(Log $log)
  {
    //
  }

  /**
    * Show the form for editing the specified resource.
  */
  public function edit(Log $log)
  {
    //
  }

  /**
    * Update the specified resource in storage.
  */
  public function update(UpdateLogRequest $request, Log $log)
  {
    //
  }

  /**
    * Remove the specified resource from storage.
  */
  public function destroy(Log $log)
  {
    //
  }
}
