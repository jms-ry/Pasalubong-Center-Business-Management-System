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
                    <option value="name" {{ request()->get('sort') === 'name' ? 'selected' : '' }}>Name</option>
                    <option value="role" {{ request()->get('sort') === 'role' ? 'selected' : '' }}>Job Title</option>
                    <option value="email" {{ request()->get('sort') === 'email' ? 'selected' : '' }}>Email</option>
                  </select>
                </div>
              </form>
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
      @if($employees->count() > 0)
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
      @else
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
      @include('modals.employee.view_employee_modal')
      @include('modals.employee.edit_employee_modal')
      <div class="container d-flex justify-content-end align-items-end fw-bold">
        <div class="row g-1">
          <div class="col-auto">
            {{$employees->links()}}
          </div>
          <div class="col-auto">
          <button class="btn btn-outline-success fw-bold text-light {{ request()->is('employees') && empty(request()->except('sort','page')) ? 'd-none' : '' }}" type="button" onclick="window.location.href='/employees'">
              Back to Employees
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
