@extends('layouts.landing')

@section('additional-css')
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<style>
  .landing {
    height: 90vh;
  }

  .title {
      font-size: 84px;
      color: #636b6f;
      font-family: 'Raleway', sans-serif;
      font-weight: 100;
  }

  .search-custom {
    height: 44px;
    width: 584px;
  }

  .input-custom {
    border-radius: 24px;
    border-right: none;
  }

  .form-control:focus {
    border-color: #ced4da;
  }

  .btn-custom {
    border-color: #ced4da;
    border-left: none;
    border-radius: 0 24px 24px 0;
  }

  .footer {
    background-color: #f2f2f2;
    color: rgba(0, 0, 0, .54);
    font-weight: normal;
    height: 10vh;
  }
</style>
@endsection

@section('content')
<div class="landing d-flex flex-column justify-content-center align-items-center">
  <div class="container d-flex justify-content-center align-items-center">
    <div class="row">
      <div class="col-12 d-flex align-items-center flex-column">
      <div class="title m-b-md">
          Job Finder
      </div>
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

<div class="footer d-flex justify-content-center align-items-center">
  <h6>
    {{ date("Y") }} &copy; Dodycode
  </h6>
</div>

@endsection