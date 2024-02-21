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
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Search..." />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row g-2 justify-content-end">
                        <div class="col-auto">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected>Sort by</option>
                                <option value="2">Name</option>
                                <option value="2">Quantity</option>
                                <option value="2">Unit Price</option>
                                <option value="2">Delivered Date</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-sm btn-info fw-bold" data-bs-toggle="modal" data-bs-target="#addProductModal">Add New Product</button>
                        </div>
                        @include('modals.product.add_product_modal')
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-dark">
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
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>₱{{ number_format($product->unit_price, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($product->delivered_date)->format('M d, Y') }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewProductModal" data-action="click->product#viewProductModal" data-product="{{json_encode($product)}}" data-product-id="{{$product->id}}">View Details</button>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal" data-action="click->product#editProductModal" data-product="{{json_encode($product)}}" data-product-id="{{$product->id}}">Edit Details</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @include('modals.product.view_product_modal')
            @include('modals.product.edit_product_modal')
            <div class="container d-flex justify-content-end align-items-end fw-bold">
                {{$products->links()}}
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
