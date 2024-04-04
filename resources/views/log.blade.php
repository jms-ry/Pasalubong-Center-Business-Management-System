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
          @can('admin-access-only')
            <form method="GET">
              <div class="input-group">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="{{ request()->get('search') }}" aria-label="Search" aria-describedby="button-addon2">
                <button class="btn btn-info btn-sm" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
              </div>
            </form>
          @else
            <div class="input-group"></div>
          @endcan
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
                      <option value="" disabled selected hidden>Sort by</option>
                      <option value="user_name" {{ request()->get('sort') === 'user_name' ? 'selected' : '' }}>User Name</option>
                      <option value="activity" {{ request()->get('sort') === 'activity' ? 'selected' : '' }}>Activity</option>
                    </select>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body bg-dark">
        @if($logs->count() > 0)
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
        @else
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
        <div class="container d-flex justify-content-end align-items-end fw-bold">
          <div class="row g-1">
            <div class="col-auto">
              {{$logs->links()}}
            </div>
            <div class="col-auto">
            <button class="btn btn-outline-success fw-bold text-light {{ request()->is('logs') && empty(request()->except('sort','page')) ? 'd-none' : '' }}" type="button" onclick="window.location.href='/logs'">
                Back to Logs
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
