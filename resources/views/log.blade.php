@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card-header text-center text-dark mt-2 d-flex align-items-center justify-content-center">
        <div>
            <i class="bi bi-copy" style="font-size: 3.5rem"></i>
        </div>
        <div class="ms-3">
            <strong class="fs-2">List of Logged Activities</strong>
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
                                <option value="2">Activity</option>
                                <option value="2">Date and Time</option>
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
                        <th>Activity</th>
                        <th>Date and Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->user->name }},{{ $log->user->role == 'admin' ? ' an' : ' a' }} {{ $log->user->role }}</td>
                            <td>{{ $log->action }}</td>
                            <td>{{ \Carbon\Carbon::parse($log->logged_date . ' ' . $log->logged_time)->format('M d, Y \a\t g:iA') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
