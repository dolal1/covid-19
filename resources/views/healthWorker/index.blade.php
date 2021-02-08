@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">Health Worker Page</h3>
    <strong class="text-gray-dark"><a href="/healthworkers/create" class="nav-link active">Add Health Worker</a></strong>
    </div>
</div>

@if (session('msg'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
    {{ session('msg') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<div class="my-3 p-3 bg-white rounded shadow-sm">
    @foreach ($healthWorkers as $healthWorker)
    <div class="d-flex text-muted pt-3 col-8">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 lh-sm border-bottom w-100">
        <div class="container d-flex justify-content-between">
          <strong class="text-gray-dark">{{ $healthWorker -> name}}</strong>
          <a href="/healthworkers/{{ $healthWorker -> id}}">Follow Up</a>
        </div>
      </div>
    </div>
    @endforeach
  <div class="d-flex justify-content-center pt-3">
    {{ $healthWorkers->links("pagination::bootstrap-4") }}
  </div>
</div>
@endsection