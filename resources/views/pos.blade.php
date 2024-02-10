@extends('layouts.app')

@section('content')
    <div class="row g-2 ms-2 me-2">
      <div class="col-md-2">
        <div class="card">
          <div class="card-header bg-primary text-center">
            <span class="fw-bold fs-5 text-dark">Cashier's Information</span>
          </div>
          <div class="card-body">
            <p><strong>User Role </strong>:<strong> {{ Auth::user()->role }}</strong></p>
            <p><strong>Logged-in User </strong>: <strong>{{ Auth::user()->name }} </strong> </p>
            <p id="current-date"> <strong>Current Date: </strong> {{ now()->format('F d, Y') }} </p>
            <p id="current-time"> <strong>Current Time: </strong> {{ now()->format('g:i A') }} </p>
            
            <form>
              <div class="form-group">
                <select name="customer" id="customer" class="form-control">
                  <option value="">Select a customer</option>
                </select>
              </div>
            </form>
            <hr>
            <button class="btn btn-success" id="addCustomerBtn">Add New Customer</button>
            <div id="successMessage" style="display: none;"></div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
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
      <div class="col-md-4">
        <div class="card mb-2">
          <div class=" m-2 d-flex justify-content-between ms-2 me-2 fs-4">
            <span>Grand Total:</span>
            <span>₱0.00</span> 
          </div>
        </div>
        <div class="card mt-2">
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
              <tbody id="productTableBody"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection