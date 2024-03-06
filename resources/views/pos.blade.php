@extends('layouts.app')

@section('content')
  <div class="container-fluid m-2"data-controller="pos">
    <div class="card-header text-dark mt-2">
      <div>
        <div class="row g-1 ms-3">
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
          <div class="col-5 text-dark fw-bold">
            <div class="card mb-2">
              <div class=" m-2 d-flex justify-content-between ms-2 me-2 fs-4 text-dark fw-bold">
                <span>Grand Total:</span>
                <span>₱0.00</span> 
              </div>
            </div>
            <div class="card shadow mt-2">
              <div class="card-header shadow bg-primary">
                <span class="fw-bold fs-5 text-dark">Place an Order for <span class="fw-bold text-muted" data-pos-target="customerNameSpan">Customer's Name</span></span>
              </div>
              <form>
                <div class="card-body">
                  <h6 class="mt-2 fw-bold text-dark">Order Information</h6>
                  <div class="row">
                    <div class="col-6">
                      <div class="mb-3 fw-bold text-dark">
                        <label for="customer_id" class="form-label">Customer:</label>
                        <select name="customer_id" id="customer_id" class="form-control text-dark" required data-pos-target="customerSelect">
                          <option class="text-dark"value="">Select a customer</option>
                          @foreach ($customers as $customer)
                            <option class="text-dark" value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="mb-3 fw-bold text-dark">
                        <label for="product_id" class="form-label">Product to Order:</label>
                        <select name="product_id" id="product_id" class="form-control text-dark" required data-pos-target="productSelect" data-action="change->pos#updateTotalCost">
                          <option value=""disabled selected hidden>Select a product to order</option>
                          @foreach($products as $product)
                            <option value="{{ $product->id }}" data-unit-price="{{ $product->unit_price }}">{{ $product->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="mb-3 fw-bold text-dark">
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" class="form-control text-dark" id="quantity" name="quantity" required placeholder="Quantity" data-pos-target="quantity" data-action="input->pos#updateTotalCost" >
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="mb-3 fw-bold text-dark">
                        <label for="total_cost" class="form-label">Total Cost:</label>
                        <input type="number" class="form-control text-dark" id="total_cost" name="total_cost" required placeholder="Total Cost" data-pos-target="totalCost" step="any">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-end">
                  <button class="btn btn-primary" dat-action="click->pos#updateCustomerName">Place Order</button>
                  <button type="button" class="btn btn-secondary"data-action="click->pos#clearCustomerField">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection