@extends('layouts.app')

@section('content')
  <div class="container mt-2"data-controller="pos">
    <div class="card-header text-dark mt-2">
      <div>
        <div class="row g-0 ms-3">
          <div class="col-7">
            <p class="fw-bold text-dark">
              <span class="text-muted">User Role:</span>
              <span class="ms-3">{{ ucfirst(Auth::user()->role) }}</span>
            </p>
            <p class="fw-bold text-dark">
              <span class="text-muted">Logged-in User:</span>
              <span class="ms-3">{{ ucfirst(Auth::user()->name)}}</span>
            </p>
            <p class="fw-bold text-dark">
              <span class="text-muted">Date and Time:</span>
              <span class="ms-3">{{ now()->format('F d, Y') }} <span id="current-time" class="fw-bold text-dark" data-pos-target="currentTime">{{ now()->format('g:i A') }} </span> </span>
            </p>
            <p class="fw-bold text-dark">
              <span class="text-muted">Selected Customer:</span>
              <span class="ms-3" data-pos-target="selectedCustomer"></span>
            </p>
          </div>
          <div class="col-5 text-dark fw-bold">
            <div class="card mb-2">
              <div class=" m-2 d-flex justify-content-between ms-2 me-2 fs-4 text-dark fw-bold">
                <span>Grand Total:</span>
                <span>₱0.00</span> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-3">
      <div class="card shadow mt-2">
        <div class="card-header shadow bg-primary">
          <div class="row">
            <div class="col-6">
              <span class="fw-bold fs-5 text-dark" data-pos-target="displayCustomerInfo">Customer's Order Information</span>
            </div>
            <div class="col-6 text-end">
              <button type="button" class="btn btn-sm btn-info fw-bold mt-0" data-bs-toggle="modal" data-bs-target="#placeOrderModal">Place Order</button>
            </div>
            @include('modals.order.place_order_modal')
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Barcode</th>
                <th>Name</th>
                <th>Price</th>
                <th>Unit</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
                <tr>
                  <td>{{$order->product->bar_code }}</td>
                  <td>{{$order->product->name}}</td>
                  <td>{{$order->product->unit_price}}</td>
                  <td>{{$order->product->unit}}</td>
                  <td>{{$order->quantity}}</td>
                  <td>{{$order->total_cost}}</td>
                  <td>
                    <i class="bi bi-x-circle text-danger"></i>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="text-end me-3">
            <p class="fw-bold fs-5" id="totalAmount">Total: <span>₱0.00</span></p>
          </div>
          <div class="text-center">
            <button class="btn btn-primary disabled" id="proceedPaymentBtn">Proceed to Payment</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection