@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
  <div class="lh-1">
    <h3 class="h3 mb-1 lh-1">Districts</h3>
    <strong class="text-gray-dark"><a href="/districts/create" class="nav-link active">Add A District</a></strong>
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
  <h5 class="pb-2 mb-0">Districts List</h5>
</div>

<div class="accordion my-3 p-3 bg-white rounded shadow-sm" id="accordionExample">
  @foreach ($districts as $district)
    <div class="container accordion-item">
        <h2 class="accordion-header" id="heading{{ $district->id }}">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $district->id }}" aria-expanded="false" aria-controls="collapse{{ $district->id }}">
            <strong>{{ $district->name }}</strong>
          </button>
        </h2>
      <div id="collapse{{ $district->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $district->id }}" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Number of Health Officers: 5
        </div>
        <div class="mt-2 mb-5 col-8">
          <a class="btn btn-outline-info float-left" href="/districts/{{ $district -> id }}/edit" >Edit District Details</a>

          <form action="/districts/{{ $district -> id }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger float-right">Remove District</button>
          </form>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection