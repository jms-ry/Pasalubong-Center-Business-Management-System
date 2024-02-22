@extends('layouts.app')

@section('content')
<div class="container mt-4" >
  <div class="card-header text-center text-dark mt-2 d-flex align-items-center justify-content-center">
    <div>
      <i class="bi bi-person-workspace" style="font-size: 3.5rem"></i>
    </div>
    <div class="ms-3">
      <strong class="fs-2">List of Registered Accounts</strong>
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
                <option value="2">Job Title</option>
              </select>
            </div>
            <div class="col-auto">
              <button type="button" class="btn btn-sm btn-info fw-bold" data-bs-toggle="modal" data-bs-target="#createAccountModal">Create New Account</button>
            </div>
            @include('modals.account.create_account_modal')
          </div>
        </div>
      </div>
    </div>
    <div class="card-body bg-dark" data-controller="user">
      <table class="table table-bordered fw-bold table-hover shadow text-center">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Job Title</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ ucfirst($user->role) }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <button class="btn btn-info btn-sm"data-bs-toggle="modal" data-bs-target="#viewAccountModal" data-action="click->user#viewAccountModal" data-user="{{json_encode($user)}}"data-user-id="{{ $user->id }}">View Profile</button>
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editAccountModal" data-action="click->user#editAccountModal" data-user="{{json_encode($user)}}"data-user-id="{{ $user->id }}">Edit Profile</button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      @include('modals.account.view_account_modal')
      @include('modals.account.edit_account_modal')
      <div class="container d-flex justify-content-end align-items-end fw-bold">
        {{$users->links()}}
      </div>
    </div>
  </div>
</div>
@endsection
