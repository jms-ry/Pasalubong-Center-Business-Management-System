<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Http\Requests\StoreLogRequest;
use App\Http\Requests\UpdateLogRequest;
use Illuminate\Http\Request;
class LogController extends Controller
{
  public function index(Request $request)
  {
    $query = Log::query();

    // Filter logs based on user role
    if ($user = auth()->user() and $user->role !== 'admin') {
      $query->where('user_id', $user->id);
    }

    // Search functionality
    if ($search = $request->input('search')) {
      $query->where(function ($query) use ($search) {
        $query->where('action', 'like', "%{$search}%")
          ->orWhereHas('user', fn ($query) => $query->where('name', 'like', "%{$search}%"));
      });
    }

    // Sort functionality
    if ($sort = $request->input('sort')) {
      $direction = $request->input('direction', 'asc');

      if ($sort === 'user_name') {
        $query->leftJoin('users', 'logs.user_id', '=', 'users.id')
          ->orderBy('users.name', $direction);
      } else {
        $query->orderBy($sort, $direction);
      }
    } else {
      $query->latest();
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
