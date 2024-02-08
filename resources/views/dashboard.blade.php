@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- Content for the first column -->
                <div class="card mb-4">
                    <div class="card-body bg-success">
                        <div class="row text-dark fw-bold">
                            <div class="col-6 align-items-center ms-auto">
                                <span class="fs-3 fw-bold d-block mt-2">{{ $totalEmployees }}</span>
                                <span class="fs-6">Total Employees</span>
                            </div>
                            <div class="col-6 text-center">
                                <i class="bi bi-people-fill" style="font-size: 3.5rem"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body bg-success">
                        <div class="row text-dark fw-bold">
                            <div class="col-6 align-items-center ms-auto">
                                <span class="fs-3 fw-bold d-block mt-2">{{ $totalSuppliers}}</span>
                                <span class="fs-6">Total Suppliers</span>
                            </div>
                            <div class="col-6 text-center">
                                <i class="bi bi bi-truck" style="font-size: 3.5rem"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body bg-success">
                        <div class="row text-dark fw-bold">
                            <div class="col-6 align-items-center ms-auto">
                                <span class="fs-3 fw-bold d-block mt-2">{{ $totalOrders}}</span>
                                <span class="fs-6">Total Product Sales</span>
                            </div>
                            <div class="col-6 text-center">
                                <i class="bi bi-credit-card-2-back" style="font-size: 3.5rem"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body bg-success">
                        <div class="row text-dark fw-bold">
                            <div class="col-6 align-items-center ms-auto">
                                <span class="fs-3 fw-bold d-block mt-2">3</span>
                                <span class="fs-6">Total Registered Accounts</span>
                            </div>
                            <div class="col-6 text-center">
                                <i class="bi bi-person-workspace" style="font-size: 3.5rem"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Content for the second column -->
                <div class="card mb-4">
                    <div class="card-body bg-success">
                        <div class="row text-dark fw-bold">
                            <div class="col-6 align-items-center ms-auto">
                                <span class="fs-3 fw-bold d-block mt-2">3</span>
                                <span class="fs-6">Total Customers</span>
                            </div>
                            <div class="col-6 text-center">
                                <i class="bi bi-person-vcard-fill" style="font-size: 3.5rem"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body bg-success">
                        <div class="row text-dark fw-bold">
                            <div class="col-6 align-items-center ms-auto">
                                <span class="fs-3 fw-bold d-block mt-2">3</span>
                                <span class="fs-6">Total Products</span>
                            </div>
                            <div class="col-6 text-center">
                                <i class="bi bi-boxes" style="font-size: 3.5rem"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body bg-success">
                        <div class="row text-dark fw-bold">
                            <div class="col-6 align-items-center ms-auto">
                                <span class="fs-3 fw-bold d-block mt-2">3</span>
                                <span class="fs-6">Total Out of Stock Products</span>
                            </div>
                            <div class="col-6 text-center">
                                <i class="bi bi-bag-x" style="font-size: 3.5rem"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-5 ms-auto">
                <!-- Content for the third column -->
                <div class="card mb-4">
                    <div class="card-header shadow rounded text-dark fw-bold bg-warning">
                        <i class="bi bi-inboxes me-auto"></i>
                        <strong class="ms-2">Recent Products</strong>
                    </div>
                    <div class="card-body ">
                        <span class="bg-primary d-flex align-items-center p-2 fs-5 text-white fw-bold">
                            <i class="bi bi-upc" style="font-size: 1.5rem"></i>
                            <strong class="ms-1">Potato Chips</strong>
                        </span>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header shadow rounded text-dark fw-bold bg-warning">
                        <i class="bi bi-inboxes me-auto"></i>
                        <strong class="ms-2">Recent Products Out of Stocks</strong>
                    </div>
                    <div class="card-body">
                        <span class="bg-primary d-flex align-items-center p-2 fs-5 text-white fw-bold">
                            <i class="bi bi-upc" style="font-size: 1.5rem"></i>
                            <strong class="ms-1">Potato Chips</strong>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
