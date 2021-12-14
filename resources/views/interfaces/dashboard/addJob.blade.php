@extends('layouts.dashboard')

@section('header-body')
<div class="row align-items-center py-4">
  <div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="{{ route('index.welcome') }}"><i class="fas fa-home"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('list.job') }}">List Jobs</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Add Job</li>
      </ol>
    </nav>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">

      </div>

      <form action="{{ route('add.job') }}" method="POST">
        @csrf
        <div class="container">
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                    <span class="btn-inner--icon"><i class="ni ni-building"></i></span>
                  </span>
                </div>
                <input type="text" class="form-control" name="company_name" placeholder="Company Name"
                  aria-label="company_name" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                    <span class="btn-inner--icon"><i class="ni ni-briefcase-24"></i></span>
                  </span>
                </div>
                <input type="text" class="form-control" name="job_name" placeholder="Job Name" aria-label="job_name"
                  aria-describedby="basic-addon1">
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                    <span class="btn-inner--icon"><i class="ni ni-tag"></i></span>
                  </span>
                </div>
                <input type="text" class="form-control" name="category" placeholder="Category" aria-label="category"
                  aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                    <span class="btn-inner--icon"><i class="ni ni-pin-3"></i></span>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Address" name="address" aria-label="address"
                  aria-describedby="basic-addon1">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <textarea class="form-control" id="description" name="description"
                placeholder="Description..."></textarea>
            </div>
          </div>

          <div class="form-group">
            <button class="btn btn-icon btn-primary" type="submit">
              <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
              <span class="btn-inner--text">Upload</span>
            </button>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('additional-scripts')
<script>
  ClassicEditor
  .create( document.querySelector( '#description' ) )
  .catch( error => {
  console.error( error );
  } );
</script>
@endsection