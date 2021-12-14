@extends('layouts.dashboard')

@section('header-body')
<div class="row align-items-center py-4">
  <div class="col-lg-6 col-7">
    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="{{ route('index.welcome') }}"><i class="fas fa-home"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">List Jobs</li>
      </ol>
    </nav>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <span class="alert-icon"><i class="ni ni-like-2"></i></span>
      <span class="alert-text">{{session('success')}}</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <a href="{{ route('add.job') }}" class="btn btn-icon btn-primary" type="button">
          <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
          <span class="btn-inner--text">Add Job</span>
        </a>
      </div>
      <!-- Light table -->
      <div class="table-responsive">
        @if (count($jobs) == 0)
        <div class="container">
          <span>Oppss... There are currently no job vacancies listed</span>
        </div>
        @else
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="sort" data-sort="name">No</th>
              <th scope="col" class="sort" data-sort="name">Company</th>
              <th scope="col" class="sort" data-sort="budget">Job Title</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="list">
            @foreach ($jobs as $key => $job)
            <tr>
              <td class="budget">
                {{ $jobs->firstItem() + $key }}
              </td>
              <th scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">{{ $job->company_name }}</span>
                  </div>
                </div>
              </th>
              <td class="budget">
                {{ $job->job_name }}
              </td>
              <td class="text-right">
                <div class="dropdown">
                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="{{ route('edit.job', $job->id) }}">Edit</a>
                    <button class="dropdown-item" type="button" data-toggle="modal"
                      data-target="#modal-notification{{ $job->id }}">Delete</button>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
      <!-- Card footer -->
      <div class="py-4">
        <ul class="pagination justify-content-end mb-0">
          {{ $jobs->links('vendor.pagination.bootstrap-4') }}
        </ul>
      </div>
    </div>
  </div>

  @foreach ($jobs as $job)
  <!-- Modal -->
  <div class="modal fade" id="modal-notification{{ $job->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
      <div class="modal-content bg-gradient-danger">

        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">

          <div class="py-3 text-center">
            <i class="ni ni-bell-55 ni-3x"></i>
            <h4 class="heading mt-4">do you really want to delete this job list?</h4>
            <p>{{ $job->job_name }}</p>
          </div>

        </div>

        <div class="modal-footer">
          <form action="{{ route('delete.job', ['id' => $job->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-white">Ok, Got it</button>
          </form>
          <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <!-- End Modal -->
  @endforeach


</div>
@endsection