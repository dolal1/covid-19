@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">{{$healthWorker -> name}}</h3>
    </div>
</div>
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="d-flex text-muted pt-3">
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
            role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
        </svg>
    
        <div class="pb-3 mb-0 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark">{{$healthWorker -> name}}</strong>
            <p>Hospital: {{$healthWorker -> hospital}}</p>
            <p>Since: {{$healthWorker -> created_at -> format('d-m-Y')}}</p>
        </div>
    </div>
</div>

@endsection