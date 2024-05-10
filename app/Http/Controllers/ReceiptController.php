<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Http\Requests\StoreReceiptRequest;
use App\Http\Requests\UpdateReceiptRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
class ReceiptController extends Controller
{
  /**
    * Display a listing of the resource.
  */
  public function index(Request $request)
  { 
    if (Gate::denies('admin-access-only', Auth::user())) {
      return redirect()->back()->with('error', 'You do not have authorization. Access denied!');
    }
    Session::flash('index_success', 'You are currently viewing the product sales page!');  
    $query = Receipt::query();
    if($request->has('search')){
      $search = $request->get('search');

      $query->orWhereHas('payment.order.customer',function($q) use($search){
        $q->where('first_name', 'like', '%'.$search.'%')
          ->orWhere('last_name', 'like', '%'.$search.'%');
      });

      $query->orWhereHas('payment.order.user',function($q) use($search){
        $q->where('name', 'like', '%'.$search.'%');
      });
    }
    
    if($request->has('date')){
      $date = $request->get('date');
      $query->whereDate('receipts.created_at', $date);
    }

    if($request->has('sort')){
      $sortField = $request->get('sort');

      if($sortField == 'first_name'){
        $query->join('payments','receipts.payment_id', '=', 'payments.id')
          ->join('orders','payments.order_id', '=', 'orders.id')
          ->join('customers','orders.customer_id', '=', 'customers.id')
        ->orderBy('customers.first_name', 'asc');
      }

      elseif($sortField == 'last_name'){
        $query->join('payments','receipts.payment_id', '=', 'payments.id')
          ->join('orders','payments.order_id', '=', 'orders.id')
          ->join('customers','orders.customer_id', '=', 'customers.id')
        ->orderBy('customers.last_name', 'asc');
      }

      elseif($sortField == 'name'){
        $query->join('payments','receipts.payment_id', '=', 'payments.id')
          ->join('orders','payments.order_id', '=', 'orders.id')
          ->join('users','orders.user_id', '=', 'users.id')
        ->orderBy('users.name', 'asc');
      }

      elseif($sortField == 'total'){
        $query->join('payments','receipts.payment_id', '=', 'payments.id')
          ->join('orders','payments.order_id', '=', 'orders.id')
        ->orderBy('orders.total', 'asc');
      }
    }
    $receipts = $query->with('payment.order.order_items.product')->paginate(5);
    return view('sales', compact('receipts'));
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
  public function store(StoreReceiptRequest $request)
  {
    //
  }

  /**
    * Display the specified resource.
  */
  public function show(Receipt $receipt)
  {
    //
  }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receipt $receipt)
    {
        //
    }

  /**
    * Update the specified resource in storage.
  */
  public function update(UpdateReceiptRequest $request, Receipt $receipt)
  {
    //
  }

  /**
    * Remove the specified resource from storage.
  */
  public function destroy(Receipt $receipt)
  {
    //
  }
}
