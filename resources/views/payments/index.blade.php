@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">Payments Page</h3>
      <strong class="text-gray-dark">
          @if ($isInExcess) 
            <a class="btn btn-primary btn-sm mt-3" href="/payments/create">Make A Payment</a>
          @else
            <a class="btn btn-secondary disabled btn-sm mt-3" href="/payments/create">Make A Payment</a>
          @endif
      </strong>
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
  @if (count($payments) > 0)
  @foreach ($payments as $payment)
  <div class="d-flex text-muted pt-3 col-10">
    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
      <div class="container d-flex justify-content-between">
        <strong class="text-gray-dark">{{ $payment -> month }}</strong>
        <a class="btn btn-outline-info btn-sm" href="/payments/{{$payment -> id}}">Follow Up</a>
      </div>
      {{-- <span class="container d-block">{{ $payment -> officer}}</span> --}}
    </div>
  </div>
  @endforeach
  <div class="d-flex justify-content-center pt-3">
    {{ $payments->links("pagination::bootstrap-4") }}
  </div>
  
  @else
  <div class="d-flex text-muted pt-3 col-8">
    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
      <div class="container d-flex justify-content-between">
        <strong class="text-gray-dark">No payments</strong>
      </div>
    </div>
  </div>
  @endif
</div>
@endsection