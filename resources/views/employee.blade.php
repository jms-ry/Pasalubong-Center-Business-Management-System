@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card-header text-center text-dark mt-2 d-flex align-items-center justify-content-center">
        <div>
            <i class="bi bi-people-fill" style="font-size: 3.5rem"></i>
        </div>
        <div class="ms-3">
            <strong class="fs-2">List of Employees</strong>
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
                                <option value="1">Name</option>
                                <option value="2">Role</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-sm btn-info fw-bold" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Add New Employee</button>
                        </div>
                        <!--Modal-->
                        <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content bg-dark">
                                    <div class="modal-header">
                                        <h4>Create/Add New Employee</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" id="addEmployeeForm">
                                        <div class="modal-body">
                                            <h6 class="mt-2 fw-bold text-light">Personal Information</h6>
                                            <div class="row g-2">
                                                <div class="col-7">
                                                    <div class="mb-3 fw-bold">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Employee Name">
                                                    </div>
                                                </div>
                                                <div class="col-5 fw-bold">
                                                    <label for="role" class="form-label">Role</label>
                                                    <select name="role" id="role" class="form-select">
                                                        <option value="admin">Admin</option>
                                                        <option value="cashier">Cashier</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 fw-bold">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter Employee Email">
                                            </div>
                                            <hr class="fw-bold text-white"></hr>
                                            <h6 class="mt-2 fw-bold text-light">Address Information</h6>
                                            <div class="row g-2 fw-bold">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="streetOne" class="form-label">Street One</label>
                                                        <input type="text" class="form-control" id="streetOne" name="streetOne" required placeholder="Street One">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="streetTwo" class="form-label">Street Two</label>
                                                        <input type="text" class="form-control" id="streetTwo" name="streetTwo" placeholder="Street Two">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col-4 fw-bold">
                                                    <div class="mb-3">
                                                        <label for="municipality" class="form-label">Municipality</label>
                                                        <input type="text" class="form-control" id="municipality" name="municipality" required placeholder="Municipality">
                                                    </div>
                                                </div>
                                                <div class="col-4 fw-bold">
                                                    <div class="mb-3">
                                                        <label for="city" class="form-label">City</label>
                                                        <input type="text" class="form-control" id="city" name="city" required placeholder="City">
                                                    </div>
                                                </div>
                                                <div class="col-4 fw-bold">
                                                    <div class="mb-3">
                                                        <label for="zipCode" class="form-label">Zip Code</label>
                                                        <input type="text" class="form-control" id="zipCode" name="zipCode" required placeholder="Zip Code">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">Save</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-dark">
            <table class="table table-bordered fw-bold table-hover shadow text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->user->name }}</td>
                            <td>{{ ucfirst($employee->user->role) }}</td>
                            <td>{{ $employee->user->email }}</td>
                            <td>
                                <button class="btn btn-info btn-sm">View Profile</button>
                                <button class="btn btn-warning btn-sm">Edit Profile</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
