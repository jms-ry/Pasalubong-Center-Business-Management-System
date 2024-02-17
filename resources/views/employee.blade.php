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
                        @include('modals.employee.add_employee_modal')
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-dark" data-controller="employee">
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
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal" data-action="employee#viewEmployeeModal" data-employee="{{json_encode($employee)}}"data-employee-id="{{ $employee->id }}">View Profile</button>
                                <button class="btn btn-warning btn-sm"data-bs-toggle="modal" data-bs-target="#editEmployeeModal" data-action="employee#editEmployeeModal" data-employee="{{json_encode($employee)}}"data-employee-id="{{ $employee->id }}">Edit Profile</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @include('modals.employee.view_employee_modal')
            @include('modals.employee.edit_employee_modal')
            <div class="container d-flex justify-content-end align-items-end fw-bold">
                {{$employees->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
