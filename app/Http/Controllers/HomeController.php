<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Supplier;
use App\Models\Order;
use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
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
    Session::flash('index_success', 'You are currently viewing the dashboard!');
    $totalEmployees = Employee::count();
    $totalSuppliers = Supplier::count();
    $totalOrders = Order::count();
    $totalUsers = User::count();
    $totalCustomers = Customer::count();
    $totalProducts = Product::count();
    $outOfStockProductsCount = Product::where('quantity', '<=', 0)->count();
    $outOfStockProducts = Product::where('quantity', '<=', 0)->get();
    
    $recentProducts = Product::whereNull('restock_date')
      ->orWhere(function ($query) {
        $query->whereNotNull('restock_date')
        ->orderBy('restock_date', 'desc');
      })
      ->orderBy('delivered_date', 'desc')
      ->first();

    return view('dashboard', [
      'totalEmployees' => $totalEmployees,
      'totalSuppliers' => $totalSuppliers,
      'totalOrders' => $totalOrders,
      'totalUsers' => $totalUsers,
      'totalCustomers' => $totalCustomers,
      'totalProducts' => $totalProducts,
      'outOfStockProductsCount' => $outOfStockProductsCount,
      'outOfStockProducts' => $outOfStockProducts,
      'recentProducts' => $recentProducts
    ]);
  }
}
