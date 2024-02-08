<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Supplier;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalSuppliers = Supplier::count();
        $totalOrders = Order::count();
        return view('dashboard', ['totalEmployees' => $totalEmployees],
                                    ['totalSuppliers' => $totalSuppliers],
                                    ['totalOrders' => $totalOrders]
                                );
    }
}
