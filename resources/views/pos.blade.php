@extends('layouts.app')

@section('content')
  <div class="container-fluid m-2"data-controller="pos">
    <div class="card-header text-dark mt-2">
      <div>
        <div class="row g-1 ms-3">
          <div class="col-5">
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
            <form action="{{route('orders.store')}}" method="POST">
              @csrf
              <p class="fw-bold text-dark" style="display: flex; align-items: center;">
                <label class="text-muted" style="margin-right: 10px;">Customer:</label>
                <span class="ms-3 hidden" data-pos-target="selectedCustomer"></span>
                <select name="customer_id" id="customer_id" class="form-control form-control-sm text-dark" style="width: 50%;" required data-pos-target="customerSelect" >
                  <option class="text-dark"value="">Select a customer</option>
                  @foreach ($customers as $customer)
                    <option class="text-dark" value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                  @endforeach
                </select>
              </p>
              <div class="card shadow mt-2">
                <div class="card-header shadow bg-primary">
                  <div class="row">
                    <div class="col-6">
                      <span class="fw-bold fs-5 text-dark" data-pos-target="displayCustomerInfo">Customer's Order Information</span>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $order)
                        <tr>
                          <td>{{$order->product->name}}</td>
                          <td>{{$order->quantity}}</td>
                          <td>{{$order->total_cost}}</td>
                          <td>
                            <button type="button" class="btn btn-secondary btn-sm"><i class="bi bi-x-circle text-dark"></i></button>
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
              </form>
            </div>
          </div>
          <div class="col-7 text-dark fw-bold">
            <div class="card mb-2">
              <div class=" m-2 d-flex justify-content-between ms-2 me-2 fs-4 text-dark fw-bold">
                <span>Grand Total:</span>
                <span>₱0.00</span> 
              </div>
            </div>
            <div class="card shadow mt-2">
              <div class="card-header shadow bg-primary">
                <span class="fw-bold fs-5 text-dark">Available Products</span>
              </div>
              @include('partials.display_products')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection