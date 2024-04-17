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
                      <option disabled selected hidden>Sort by</option>
                      <option value="name" {{ request()->get('sort') === 'name' ? 'selected' : '' }}>User Name</option>
                      <option value="logged_date" {{ request()->get('sort') === 'logged_date' ? 'selected' : '' }}>Logged Date</option>
                      <option value="signed_in_time" {{ request()->get('sort') === 'signed_in_time' ? 'selected' : '' }}>Signed In</option>
                      <option value="signed_out_time" {{ request()->get('sort') === 'signed_out_time' ? 'selected' : '' }}>Signed Out</option>
                    </select>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body bg-dark">
        @if($dtrs->count() > 0)
          <table class="table table-bordered fw-bold table-hover shadow text-center">
            <thead>
              <tr>
                <th>ID</th>
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
                  <td class="{{ $dtr->signed_out_time ? '' : 'text-muted' }}">{{ $dtr->signed_out_time ? \Carbon\Carbon::parse($dtr->signed_out_time)->format('g:iA') : 'Currently signed in' }}</td>
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
                <th>Logged Date</th>
                <th>Signed In</th>
                <th>Signed Out</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="5">
                  @if(request()->has('search') && request()->get('search') !== '')
                    <div class="text-center text-dark fw-bold m-5">
                      <p class="font-weight-bold">No dtr records found for <span class="badge text-bg-info">{{ request()->get('search') }}</span></p>
                    </div>
                  @else
                    <div class="text-center text-dark fw-bold m-5">
                      <p class="fw-bold">No dtr records.</p>
                    </div>
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
        @endif
        <div class="container d-flex justify-content-end align-items-end fw-bold">
          <div class="row g-1">
            <div class="col-auto">
              {{$dtrs->links()}}
            </div>
            <div class="col-auto">
              <button class="btn btn-outline-success fw-bold text-light {{ request()->is('dtrs') && empty(request()->except('sort','page')) ? 'd-none' : '' }}" type="button" onclick="window.location.href='/dtrs'">
                Back to DTRS
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
