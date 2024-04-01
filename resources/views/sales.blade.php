@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="card-header text-center text-dark mt-2 d-flex align-items-center justify-content-center">
      <div>
        <i class="bi bi-table" style="font-size: 3.5rem"></i>
      </div>
      <div class="ms-3">
        <strong class="fs-2">Product Sales</strong>
      </div>
    </div>
    <div class="card shadow">
      <div class="card-header shadow bg-primary">
        <div class="row">
          <div class="col-md-6">
            <form method="GET">
              <div class="input-group">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="{{ request()->get('search') }}" aria-label="Search" aria-describedby="button-addon2">
                <button class="btn btn-info btn-sm" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <div class="row g-2 justify-content-end">
              <div class="col-auto">
                <form method="GET">
                  @if(request()->filled('search'))
                    <input type="hidden" name="search" value="{{ request()->get('search') }}">
                  @endif
                  <div class="input-group">
                    <select name="sort" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="this.form.submit()">
                      <option value="" disabled selected hidden>Sort by</option>
                      <option value="first_name" {{ request()->get('sort') === 'first_name' ? 'selected' : '' }}>Customer's First Name</option>
                      <option value="last_name" {{ request()->get('sort') === 'last_name' ? 'selected' : '' }}>Customer's Last Name</option>
                      <option value="name" {{ request()->get('sort') === 'name' ? 'selected' : '' }}>Cashier Name</option>
                      <option value="total" {{ request()->get('sort') === 'total' ? 'selected' : '' }}>Total Price</option>
                    </select>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body bg-dark" data-controller="product-sales">
        @if($receipts->count() > 0)
          <table class="table table-bordered fw-bold table-hover shadow text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Cashier Name</th>
                <th>Total Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($receipts as $receipt)
                <tr id="receiptRow[{{ $receipt->id }}]">
                  <td id="receiptId[{{ $receipt->id }}]">{{ $receipt->id }}</td>
                  <td id="receiptCustomerName[{{ $receipt->id }}]">{{ $receipt->payment->order->customer->first_name }} {{ $receipt->payment->order->customer->last_name }}</td>
                  <td id="receiptCashierName[{{ $receipt->id }}]">{{ $receipt->payment->order->user->name }}</td>
                  <td id="receiptTotal[{{ $receipt->id }}]">₱{{number_format($receipt->payment->order->total,2) }}</td>
                  <td>
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewReceiptModal" data-action="click->product-sales#viewReceiptModal" data-receipt="{{json_encode($receipt)}}">View Receipt</button>
                  </td>
                </tr>
              @endforeach
              <tr>
                <td></td>
                <td></td>
                <td>TOTAL</td>
                <td id="totalSales">₱00.00</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        @else
          <table class="table table-bordered fw-bold table-hover shadow text-center">
            <thead>
              <tr>
                <th>Receipt Number</th>
                <th>Customer Name</th>
                <th>Cashier Name</th>
                <th>Total Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="5">
                  <div class="text-center text-dark fw-bold m-5">
                    <p class="font-weight-bold">No records found for <span class="badge text-bg-info">{{ request()->get('search') }}</span></p>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        @endif
        @include('modals.sales.view_receipt_modal')
        <div class="container d-flex justify-content-end align-items-end fw-bold">
          <div class="row g-1">
            <div class="col-auto">
              {{$receipts->links()}}
            </div>
            <div class="col-auto">
              <button class="btn btn-outline-success fw-bold text-light {{ request()->is('sales') && empty(request()->except('sort','page')) ? 'd-none' : '' }}" type="button" onclick="window.location.href='/sales'">
              Back to Product Sales
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
