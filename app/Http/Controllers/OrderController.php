<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Receipt;
use Illuminate\Support\Facades\Session;
class OrderController extends Controller
{
  /**
    * Display a listing of the resource.
  */
  public function index(Request $request)
  {
    $userName = auth()->user()->name;
    Session::flash('index_success', 'Welcome, ' . $userName . ', to VSU PCBMS Point of Sale!');
    $customers = Customer::all();
    $products = Product::where('quantity', '>', 0)->get();
        
    return view('pos',compact('customers','products'));
  }

  /**
    * Show the form for creating a new resource.
  */
  public function create()
  {
    //
  }

  public function store(StoreOrderRequest $request)
  {
    // Iterate through the order items to validate quantity
    foreach ($request->order_items as $productId => $item) {
      $product = Product::findOrFail($productId);
      $requestedQuantity = $item['quantity'];

      if ($requestedQuantity > $product->quantity) {
        return redirect()->back()->with('error', 'Requested quantity for ' . $product->name . ' exceeds available quantity');
      }
    }

    // If all quantities are valid, proceed to create the order
    // Create the order
    $order = new Order([
      'customer_id' => $request->customer_id,
      'user_id' => auth()->id(),
      'total' => $request->total,
      'discount' => $request->discount,
      'grand_total' => $request->grand_total,
    ]);
    $order->save();

    // Iterate through the order items to create them
    foreach ($request->order_items as $productId => $item) {
      // Create the order item
      $orderItem = new OrderItem([
        'product_id' => $productId,
        'quantity' => $item['quantity'],
        'total_price' => $item['total_price'],
        'order_id' => $order->id,
      ]);
      $orderItem->save();

      // Update product quantity
      $product = Product::findOrFail($productId);
      $product->quantity -= $item['quantity']; // Subtract the ordered quantity
      $product->save();
    }

    $payment = new Payment([
      'amount' => $request->amount,
      'order_id' => $order->id,
      'change' => $request->change,
      'user_id' => auth()->id(),
    ]);
    $payment->save();
    //Create Receipt
    $receipt = new Receipt([
      'payment_id' => $payment->id,
    ]);
    $receipt->save();
    // Log the action
    DB::table('logs')->insert([
      'user_id' => Auth::id(),
      'action' => 'Created new order for ' . $order->customer->first_name . ' ' . $order->customer->last_name,
      'logged_date' => now()->toDateString(),
      'logged_time' => now()->toTimeString(),
    ]);

    return redirect()->back()->with('create_success', 'Order for '.$order->customer->first_name.' '.'was created successfully!');
  }


  /**
    * Display the specified resource.
  */
  public function show(Order $order)
  {
    //
  }

  /**
    * Show the form for editing the specified resource.
  */
  public function edit(Order $order)
  {
    //
  }

  /**
    * Update the specified resource in storage.
  */
  public function update(UpdateOrderRequest $request, Order $order)
  {
    //
  }

  /**
    * Remove the specified resource from storage.
  */
  public function destroy(Order $order)
  {
    //
  }
}
