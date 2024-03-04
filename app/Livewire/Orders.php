<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
class Orders extends Component
{
  public function render(Request $request)
  {
    $customers = Customer::all();
    $products = Product::where('quantity', '>', 0)->get();
    $selectedCustomerId = $request->input('customer_id');
    $orders =Order::where('customer_id', $selectedCustomerId)->get();
    return view('pos',compact('customers','products','orders'));
  }
}
