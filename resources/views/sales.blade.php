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
          <div class="input-group">
            <input type="text" class="form-control form-control-sm" placeholder="Search..." />
          </div>
        </div>
        <div class="col-md-6">
          <div class="row g-2 justify-content-end">
            <div class="col-auto">
              <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Sort by</option>
                <option value="1">Customer Name</option>
                <option value="2">Cashier Name</option>
                <option value="2">Total Price</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body bg-dark">
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
          @foreach($receipts as $receipt)
            <tr>
              <td>{{ $receipt->id }}</td>
              <td>{{ $receipt->customer->first_name }},{{ $receipt->customer->last_name }}</td>
              <td>{{ $receipt->user->name }}</td>
              <td>₱{{number_format($receipt->total,2) }}</td>
              <td>
                <button class="btn btn-info btn-sm">View Receipt</button>
              </td>
            </tr>
          @endforeach
            <tr>
              <td></td>
              <td></td>
              <td>TOTAL</td>
              <td>₱{{ number_format($totalSales, 2) }}</td>
              <td></td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
