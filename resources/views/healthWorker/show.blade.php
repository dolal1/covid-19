@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">{{$healthWorker -> name}}</h3>
    </div>
</div>
<div class="align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="d-flex text-muted pt-3">
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
            role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
        </svg>
    
        <div class="pb-3 mb-0 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark">{{$healthWorker -> name}}</strong>
            <p>Hospital: <strong>{{$hospital -> name}}</strong></p>
            <p>Number Of Patients: <strong>{{$healthWorker -> patientNo}}</strong></p>
            <p>Since: {{$healthWorker -> created_at -> format('d-m-Y')}}</p>
            @if ($healthWorker -> salary >  0) 
                <p>Paid: <strong>Yes</strong></p>
                <p>Amount: <strong>Ugx {{number_format($healthWorker -> salary)}}</strong></p>
            @else 
                <p>Paid: <strong>No</strong></p>
            @endif

        </div>
    </div>
    @auth
        <div class="mt-2 mb-5 col-8">
            <a class="btn btn-outline-info float-left" href="/healthworkers/{{ $healthWorker -> id }}/edit" >Edit Health Worker Details</a>

            <form action="/healthworkers/{{ $healthWorker -> id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-warning float-right">Remove Health Worker</button>
            </form>
        </div>
    @endauth
</div>

<div class="my-3 p-3 bg-white rounded shadow-sm col-10">
  <h6 class="border-bottom pb-2 mb-0">Patients</h6>
  @if (count($patients) > 0)
  @foreach ($patients as $patient)
  <div class="d-flex text-muted pt-3">
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
  <small class="d-block text-end mt-3">
    <a href="/patients">All Patients</a>
  </small>
  <div class="d-flex justify-content-center pt-3">
    {{ $patients->links("pagination::bootstrap-4") }}
  </div>
  @else
  <div class="d-flex text-muted pt-3">
    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
      <div class="container d-flex justify-content-between">
        <strong class="text-gray-dark">No Patients</strong>
      </div>
    </div>
  </div>
  <small class="d-block text-end mt-3">
    <a href="/patients/create">Add Patients</a>
  </small>
  @endif
</div>

@endsection