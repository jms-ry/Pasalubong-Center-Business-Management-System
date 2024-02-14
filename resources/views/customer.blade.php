@extends('layouts.app')

@section('content')
<div class="container mt-4">
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
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Search..." />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row g-2 justify-content-end">
                        <div class="col-auto">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected>Sort by</option>
                                <option value="1">First Name</option>
                                <option value="2">Last Name</option>
                                <option value="2">Email</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-sm btn-info fw-bold" data-bs-toggle="modal" data-bs-target="#addCustomerModal">Add New Customer</button>
                        </div>
                        <!--Add customer Modal-->
                        @include('modals.add_customer_modal')
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-dark">
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
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->email_address }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewCustomerModal">View Profile</button>
                                <button class="btn btn-warning btn-sm">Edit Profile</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @include('modals.view_customer_modal')
            <div class="container d-flex justify-content-end align-items-end fw-bold">
                {{$customers->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
