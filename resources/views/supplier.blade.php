@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="card-header text-center text-dark mt-2 d-flex align-items-center justify-content-center">
      <div>
        <i class="bi bi bi-truck" style="font-size: 3.5rem"></i>
      </div>
      <div class="ms-3">
        <strong class="fs-2">List of Suppliers</strong>
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
                  <option value="1">Company Name</option>
                  <option value="2">Company Abbreviation</option>
                  <option value="2">Email</option>
                </select>
              </div>
              <div class="col-auto">
                <button type="button" class="btn btn-sm btn-info fw-bold" data-bs-toggle="modal" data-bs-target="#addSupplierModal">Add New Supplier</button>
              </div>
              @include('modals.supplier.add_supplier_modal')
            </div>
          </div>
        </div>
        <div class="card-body bg-dark" data-controller="supplier">
          <table class="table table-bordered fw-bold table-hover shadow text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>Company Name</th>
                <th>Company Abbreviation</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($suppliers as $supplier)
                <tr>
                  <td>{{ $supplier->id }}</td>
                  <td>{{ $supplier->company_name }}</td>
                  <td>{{ $supplier->company_abbreviation }}</td>
                  <td>{{ $supplier->email_address }}</td>
                  <td>
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewSupplierModal" data-action="click->supplier#viewSupplierModal" data-supplier="{{json_encode($supplier)}}" data-supplier-id="{{ $supplier->id }}">View Profile</button>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editSupplierModal" data-action="click->supplier#editSupplierModal" data-supplier="{{json_encode($supplier)}}" data-supplier-id="{{ $supplier->id }}">Edit Profile</button>
                  </td>
                </tr>
             @endforeach
            </tbody>
          </table>
          @include('modals.supplier.view_supplier_modal')
          @include('modals.supplier.edit_supplier_modal')
          <div class="container d-flex justify-content-end align-items-end fw-bold">
                {{$suppliers->links()}}
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection