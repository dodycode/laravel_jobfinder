@extends('layouts.landing')

@section('additional-css')
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<style>
  .result {
    border-bottom: 1px solid #ebebeb;
  }

  .result img {
    width: 182px;
  }

  .search-custom {
    height: 44px;
  }

  .input-custom {
    border-radius: 24px;
    border-right: none;
  }

  .result-content {
    color: #333;
  }

  .card-result {
    border-bottom: 1px solid #ebebeb;
    padding: 4px 0;
    width: 100%;
  }

  .card-result h1 {
    color: #007188;
    font-weight: normal;
  }

  .card-result-company {
    font-size: 18px;
  }

  .btn-custom {
    border-color: #ced4da;
    border-left: none;
    border-radius: 0 24px 24px 0;
  }

  .form-control:focus {
    border-color: #ced4da;
  }

  .footers {
    background-color: #f2f2f2;
    color: rgba(0, 0, 0, .54);
    font-weight: 700;
    padding: 4px 0;
    width: 100%;
  }

  .text-red {
    color: #E67E22;
  }

  .title {
      font-size: 34px;
      color: #636b6f;
      font-family: 'Raleway', sans-serif;
      font-weight: 100;
  }
</style>
@endsection

@section('content')
<div class="result">
  <div class="container">
    <div class="row gx-1 py-4 d-flex align-items-center">
      <div class="col-3">
      <div class="title m-b-md">
          Job Finder
      </div>
      </div>
      <div class="col-8">
        <form action="{{ route('index.result') }}" method="POST">
          @csrf
          <div class="input-group search-custom">
            <input type="text" name="search" class="form-control shadow-none input-custom"
              placeholder="Search and find the job you want" autofocus>
            <button class="btn btn-outline-secondary btn-custom" type="submit" id="button-addon2"><i
                class="fas fa-search"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="result-content py-4">
    @if (empty($filteredJobs))
    <h2>Sorry we couldn't find what you were looking for</h2>
    @else
    <p>{{count($filteredJobs)}} results</p>

    @foreach ($filteredJobs as $job)
    <div class="card-result my-4">
      <small class="text-red"><i class="fas fa-balance-scale"></i> Bobot:
        {{ round($job->{'bobot (TF-IDF)'}, 2, PHP_ROUND_HALF_UP) }}</small>
      <h1>{{ $job->job_name }}</h1>
      <p class="card-result-company"><i class="far fa-building"></i> {{ $job->company_name }}</p>
      <p>
        <i class="fas fa-map-marker-alt"></i> {{ $job->address }}
        <i class="fas fa-tag"></i> {{ $job->category }}
      </p>
      <small>{{ strip_tags($job->description) }}</small>
    </div>
    @endforeach
    @endif
  </div>
</div>
@endsection