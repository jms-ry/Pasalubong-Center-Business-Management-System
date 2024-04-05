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
                <select name="customer_id" id="customer_id" class="form-control form-control-sm text-dark" style="width: 50%;" required data-pos-target="customerSelect" data-action="change->pos#hideDisplayReminder">
                  <option class="text-dark"value="" disabled selected hidden>Select a customer</option>
                  @foreach ($customers as $customer)
                    <option class="text-dark" value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                  @endforeach
                </select>
                <button type="button" id="addCustomerButton" class="btn btn-sm btn-info fw-bold ms-2" data-bs-toggle="modal" data-bs-target="#addCustomerModal" data-action="click->pos#disableField">Add New Customer</button>
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
                  <table class="table table-striped table-hover" id="order-items-table" data-pos-target="orderItemsTable">
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id ="orderItemsTableBody">
                    </tbody>
                  </table>
                  <div class="text-end mt-2 " id="discountTotalDiv">
                    <div class="d-flex flex-column">
                      <input type="number" class="form-control form-control-sm border border-dark border-1 ms-2 mt-2 d-none" style="width: 60%;" id="discountField" name="discountField" min="1" step="1" pattern="[1-9][0-9]*"placeholder="Enter Discount" data-action="input->pos#validateDiscountField input->pos#updateTotalAmounts">
                      <div class="invalid-feedback ms-2" id="discountFeedback"></div>
                    </div>
                    <p class="fw-bold fs-5 text-dark mt-2">Total: <span id="totalAmountValue">₱0.00</span></p>
                    <input type="hidden" class="form-control" name="discount" id="discount" value="0">
                    <input type="hidden" class="form-control" name="total" id="total" value="0">
                    <input type="hidden" class="form-control" name="grand_total" id="grand_total" value="0">
                  </div>
                  <div class="text-center">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#paymentModal"class="btn btn-primary disabled mt-2 mb-2"id="proceedPaymentBtn">Proceed to Payment</button>
                    <div class="text-danger d-block" id="reminderPlaceholder">
                      <p class="fw-bold">Button is disabled. Please do the following:
                        <span id="selectCustomerReminder" class="d-block ml-4" >- Select a Customer.</span>
                        <span id="selectProductReminder" class="d-block ml-4">- Click a product to be placed as Order</span>
                        <span id="selectProductQuantityReminder" class="d-block ml-4">- Quantity should not exceed the available product's quantity.</span>
                      </p>
                    </div>
                  </div>
                  @include('modals.payment.place_payment_modal')
                </div>
              </form>
              @include('modals.customer.add_customer_modal')
            </div>
          </div>
          <div class="col-7 text-dark fw-bold">
            <div class="card mb-2">
              <div class=" m-2 d-flex justify-content-between ms-2 me-2 fs-4 text-dark fw-bold">
                <span>Grand Total:</span>
                <span id="grandTotalAmountValue">₱0.00</span> 
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