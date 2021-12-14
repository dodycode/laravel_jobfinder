@extends('layouts.dashboard')

@section('header-body')
<div class="row align-items-center py-4">
  <div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="{{ route('index.welcome') }}"><i class="fas fa-home"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Dashboards</li>
      </ol>
    </nav>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Total Jobs</h5>
            <span class="h2 font-weight-bold mb-0">{{ count($jobs) }}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
              <i class="ni ni-folder-17"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection