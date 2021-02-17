@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">{{$hospital -> name}}</h3>
    </div>
</div>
<div class="align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="d-flex text-muted pt-3">
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
            role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
        </svg>
    
        <div class="pb-3 mb-0 lh-sm border-bottom">
            <strong class="d-block text-gray-dark">{{$hospital -> name}}</strong>
            <p>Added On: <strong>{{$hospital -> created_at -> format('d-m-Y')}}</strong></p>
            <p>District: <strong>{{$district -> name}}</strong></p>
            <p>Head Officer: <strong>{{ $headOfficerName }}</strong></p>
            <p>Number Of Patients: <strong>{{$hospital -> patientNo}}</strong></p>
        </div>
    </div>
    
    @auth
        <div class="mt-2 mb-5 col-8">
            <a class="btn btn-outline-info float-left" href="/hospitals/{{ $hospital -> id }}/edit" >Edit Hospital Details</a>

            <form action="/hospitals/{{ $hospital -> id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-warning float-right">Remove Hospital</button>
            </form>
        </div>
    @endauth
</div>

<div class="my-3 p-3 bg-white rounded shadow-sm col-10">
    <h6 class="border-bottom pb-2 mb-0">Health Workers</h6>
    @foreach ($healthWorkers as $healthWorker)
    <div class="d-flex text-muted pt-3">
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
            role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
        </svg>

        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
                <strong class="text-gray-dark">{{ $healthWorker -> name}}</strong>
                <a class="btn btn-outline-info btn-sm" href="/healthworkers/{{ $healthWorker -> id}}">Follow Up</a>
            </div>
            <span class="d-block">Username: <strong>{{ $healthWorker -> username }}</strong></span>
            <span class="d-block">Patient Number: <strong>{{number_format($healthWorker -> patientNo)}}</strong></span>
        </div>
    </div>
    @endforeach
    <small class="d-block text-end mt-3">
        <a href="/healthworkers">All Health Workers</a>
    </small>
    <div class="d-flex justify-content-center pt-3">
    {{ $healthWorkers->links("pagination::bootstrap-4") }}
  </div>
</div>

@endsection