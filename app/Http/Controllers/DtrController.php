<?php

namespace App\Http\Controllers;

use App\Models\dtr;
use App\Http\Requests\StoredtrRequest;
use App\Http\Requests\UpdatedtrRequest;

class DtrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
    
        if ($user->role == 'admin') {
            $dtrs = Dtr::whereNotNull('signed_out_time')->paginate(10);
        } else {
            $dtrs = Dtr::where('user_id', $user->id)
                       ->whereNotNull('signed_out_time')
                       ->paginate(10);
        }
    
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
