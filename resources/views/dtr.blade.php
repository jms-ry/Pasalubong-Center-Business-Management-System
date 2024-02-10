@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card-header text-center text-dark mt-2 d-flex align-items-center justify-content-center">
        <div>
            <i class="bi bi-calendar-check" style="font-size: 3.5rem"></i>
        </div>
        <div class="ms-3">
            <strong class="fs-2">Daily Time Record</strong>
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
                                <option selected>Filter by</option>
                                <option value="1">User Name</option>
                                <option value="2">Logged Date</option>
                            </select>
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
                        <th>User Name</th>
                        <th>Logged Date</th>
                        <th>Signed In</th>
                        <th>Signed Out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dtrs as $dtr)
                        <tr>
                            <td>{{ $dtr->id }}</td>
                            <td>{{ $dtr->user->name }},{{ $dtr->user->role == 'admin' ? ' an' : ' a' }} {{ucfirst($dtr->user->role) }}</td>
                            <td>{{ \Carbon\Carbon::parse($dtr->logged_date)->format('M d, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($dtr->signed_in_time)->format('g:iA') }}</td>
                            <td>{{ \Carbon\Carbon::parse($dtr->signed_out_time)->format('g:iA') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
