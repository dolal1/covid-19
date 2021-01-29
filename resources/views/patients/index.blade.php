@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">Patients Page</h3>
    <strong class="text-gray-dark"><a href="/patients/create" class="nav-link active">Add A Patient</a></strong>
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
  @if (count($patients) > 0)
  @foreach ($patients as $patient)
  <div class="d-flex text-muted pt-3 col-8">
    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
      <div class="container d-flex justify-content-between">
        <strong class="text-gray-dark">{{ $patient -> name}}</strong>
        <a class="btn btn-outline-info btn-sm" href="/patients/{{$patient -> id}}">Follow Up</a>
      </div>
      <span class="container d-block">{{ $patient -> officer}}</span>
    </div>
  </div>
  @endforeach
  @else
  <div class="d-flex text-muted pt-3 col-8">
    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
      <div class="container d-flex justify-content-between">
        <strong class="text-gray-dark">No Patients</strong>
      </div>
    </div>
  </div>
  @endif
</div>
@endsection