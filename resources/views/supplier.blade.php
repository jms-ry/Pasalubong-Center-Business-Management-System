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
                      <option value="" selected>Sort by</option>
                      <option value="company_name" {{ request()->get('sort') === 'company_name' ? 'selected' : '' }}>Company Name</option>
                      <option value="company_abbreviation" {{ request()->get('sort') === 'company_abbreviation' ? 'selected' : '' }}>Company Abbreviation</option>
                      <option value="email_address" {{ request()->get('sort') === 'email_address' ? 'selected' : '' }}>Email</option>
                    </select>
                  </div>
                </form>
              </div>
              <div class="col-auto">
                <button type="button" class="btn btn-sm btn-info fw-bold" data-bs-toggle="modal" data-bs-target="#addSupplierModal">Add New Supplier</button>
              </div>
              @include('modals.supplier.add_supplier_modal')
            </div>
          </div>
        </div>
        <div class="card-body bg-dark" data-controller="supplier">
          @if($suppliers->count()> 0)
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
          @else
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
                <tr>
                  <td colspan="5">
                    <div class="text-center text-dark fw-bold m-5">
                      No records found for "{{ request()->get('search') }}"
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          @endif
          @include('modals.supplier.view_supplier_modal')
          @include('modals.supplier.edit_supplier_modal')
          <div class="container d-flex justify-content-end align-items-end fw-bold">
            <div class="row g-1">
              <div class="col-auto">
                {{$suppliers->links()}}
              </div>
              <div class="col-auto">
                <button class="btn btn-outline-success fw-bold text-light {{ request()->is('suppliers') && empty(request()->except('sort','page')) ? 'd-none' : '' }}" type="button" onclick="window.location.href='/suppliers'">
                  Back to Suppliers
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection