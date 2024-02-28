@extends('layouts.app')

@section('content')
  <div class="overflow-hidden"data-controller="pos">
    <div class="row g-0 ms-3">
      <div class="col-7">
        <div class="container mt-2">
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
            <div class="row g-1">
              <div class="col-6 d-inline-flex align-items-start">
                <span class="text-muted fw-bold d-inline-block whitespace-normal">Customer:</span>
                <select name="customer_id" id="customer_id" class="form-control form-select-sm ms-3">
                  <option class="text-dark"value="">Select a customer</option>
                  @foreach ($customers as $customer)
                    <option class="text-dark" value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <button type="button" class="btn btn-sm btn-info fw-bold mt-0" data-bs-toggle="modal" data-bs-target="#addCustomerModal" data-action="click->customer#disableFields">Add New Customer</button>
              </div>
              @include('modals.customer.add_customer_modal')
            </div>
          </p>
          <div class="card mt-4">
            <div class="card-header bg-primary text-center">
              <span class="fw-bold fs-5 text-dark">Order's Data</span>
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

                </tbody>
              </table>
              <div class="text-end me-3">
                <p class="fw-bold fs-5" id="totalAmount">Total: <span>₱0.00</span></p>
              </div>
              <div class="text-center">
                <button class="btn btn-primary" id="proceedPaymentBtn" data-name="Place order and select customer to enable this button" disabled>Proceed to Payment</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-5">
        <div class="card mb-2">
          <div class=" m-2 d-flex justify-content-between ms-2 me-2 fs-4">
            <span>Grand Total:</span>
            <span>₱0.00</span> 
          </div>
        </div>
        <div class="card mt-4">
          <div class="card-header bg-primary text-center">
            <span class="fw-bold fs-5 text-dark">Product's Data</span>
          </div>
          <div class="card-body">
            <div class="form-group">
              <input type="text" class="form-control" id="searchProductInput" placeholder="Search Product">
            </div>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Unit</th> 
                  <th>Qty.</th>
                </tr>
              </thead>
              <tbody id="productTableBody">
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection