@extends('layouts.app')

@section('content')
<div class="container mt-4" data-controller="customer">
  <div class="card-header text-center text-dark mt-2 d-flex align-items-center justify-content-center">
    <div>
      <i class="bi bi-person-fill" style="font-size: 3.5rem"></i>
    </div>
    <div class="ms-3">
      <strong class="fs-2">List of Customers</strong>
    </div>
  </div>
  <div class="card shadow">
    <div class="card-header shadow bg-primary">
      <div class="row">
        <div class="col-md-6">
          <form method="GET">
            <div class="input-group">
              <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="{{ request()->get('search') }}" aria-label="Search" aria-describedby="button-addon2" data-customer-target= "searchField">
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
                  <select name="sort" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="this.form.submit()" data-customer-target="sortField">
                    <option value="" disabled selected hidden>Sort by</option>
                    <option value="first_name" {{ request()->get('sort') === 'first_name' ? 'selected' : '' }}>First Name</option>
                    <option value="last_name" {{ request()->get('sort') === 'last_name' ? 'selected' : '' }}>Last Name</option>
                    <option value="email_address" {{ request()->get('sort') === 'email_address' ? 'selected' : '' }}>Email</option>
                  </select>
                </div>
              </form>
            </div>
            <div class="col-auto">
              <button type="button" class="btn btn-sm btn-info fw-bold" data-bs-toggle="modal" data-bs-target="#addCustomerModal" data-action="click->customer#disableFields">Add New Customer</button>
            </div>
            <!--Add customer Modal-->
            @include('modals.customer.add_customer_modal')
          </div>
        </div>
      </div>
    </div>
    <div class="card-body bg-dark" >
      @if($customers->count() > 0)
        <table class="table table-bordered fw-bold table-hover shadow text-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($customers as $customer)
              <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->first_name }}</td>
                <td>{{ $customer->last_name }}</td>
                <td>{{ $customer->email_address }}</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewCustomerModal" data-action="click->customer#viewCustomerModal" data-customer="{{ json_encode($customer) }}" data-customer-id="{{ $customer->id }}">View Profile</button>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#editCustomerModal" data-action="click->customer#editCustomerModal" data-customer="{{ json_encode($customer) }}" class="btn btn-warning btn-sm" data-customer-id="{{ $customer->id }}" >Edit Profile</button>
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
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
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
      @include('modals.customer.view_customer_modal')
      @include('modals.customer.edit_customer_modal')
      <div class="container d-flex justify-content-end align-items-end fw-bold">
        <div class="row g-1">
          <div class="col-auto">
            {{$customers->links()}}
          </div>
          <div class="col-auto">
            <button class="btn btn-outline-success fw-bold text-light {{ request()->is('customers') && empty(request()->except('sort','page')) ? 'd-none' : '' }}" type="button" onclick="window.location.href='/customers'">
              Back to Customers
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
