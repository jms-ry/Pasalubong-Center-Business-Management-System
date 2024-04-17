@extends('layouts.app')

@section('content')
  @push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  @endpush
  <div class="container mt-4" data-controller="product">
    <div class="card-header text-center text-dark mt-2 d-flex align-items-center justify-content-center">
      <div>
        <i class="bi bi-cart3" style="font-size: 3.5rem"></i>
      </div>
      <div class="ms-3">
        <strong class="fs-2">Product Inventory</strong>
      </div>
    </div>
    <div class="card shadow">
      <div class="card-header shadow bg-primary">
        <div class="row">
          <div class="col-md-6">
            <form method="GET">
              <div class="input-group">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="{{ request()->get('search') }}" aria-label="Search" aria-describedby="button-addon2" data-product-target="searchField">
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
                    <select name="sort" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="this.form.submit()" data-product-target="sortField">
                      <option value="" selected disabled hidden>Sort by</option>
                      <option value="name" {{ request()->get('sort') === 'name' ? 'selected' : '' }}>Product Name</option>
                      <option value="quantity" {{ request()->get('sort') === 'quantity' ? 'selected' : '' }}>Quantity</option>
                      <option value="unit_price" {{ request()->get('sort') === 'unit_price' ? 'selected' : '' }}>Unit Price</option>
                      <option value="delivered_date" {{ request()->get('sort') === 'delivered_date' ? 'selected' : '' }}>Delivered Date</option>
                    </select>
                  </div>
                </form>
              </div>
              @can('admin-access-only')
                <div class="col-auto">
                  <button type="button" class="btn btn-sm btn-info fw-bold" data-bs-toggle="modal" data-bs-target="#addProductModal" data-action="click->product#disableFields">Add New Product</button>
                </div>
              @endcan
              @include('modals.product.add_product_modal')
            </div>
          </div>
        </div>
      </div>
      <div class="card-body bg-dark">
        @if($products->count() > 0)
          <table class="table table-bordered fw-bold table-hover shadow text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Delivered Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>₱{{ number_format($product->unit_price, 2) }}</td>
                  <td>{{ \Carbon\Carbon::parse($product->delivered_date)->format('M d, Y') }}</td>
                  <td>
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewProductModal" data-action="click->product#viewProductModal" data-product="{{json_encode($product)}}" data-product-id="{{$product->id}}">View Details</button>
                    @can('admin-access-only')
                      <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal" data-action="click->product#editProductModal" data-product="{{json_encode($product)}}" data-product-id="{{$product->id}}">Edit Details</button>
                    @endcan
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <table class="table table-bordered fw-bold table-hover shadow text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Delivered Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="6">
                  @if(request()->has('search') && request()->get('search') !== '')
                    <div class="text-center text-dark fw-bold m-5">
                      <p class="font-weight-bold">No product records found for <span class="badge text-bg-info">{{ request()->get('search') }}</span></p>
                    </div>
                  @else
                    <div class="text-center text-dark fw-bold m-5">
                      <p class="fw-bold">No product records.</p>
                    </div>
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
        @endif
        @include('modals.product.view_product_modal')
        @include('modals.product.edit_product_modal')
        <div class="container d-flex justify-content-end align-items-end fw-bold">
          <div class="row g-1">
            <div class="col-auto">
              {{$products->links()}}
            </div>
            <div class="col-auto">
              <button class="btn btn-outline-success fw-bold text-light {{ request()->is('products') && empty(request()->except(['sort', 'page'])) && (empty(request()->input('page')) || request()->input('page') == 1) ? 'd-none' : '' }}" type="button" onclick="window.location.href='/products'">
                Back to Products
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
      flatpickr("input[type=datetime-local]");
    </script>
  @endpush
@endsection
