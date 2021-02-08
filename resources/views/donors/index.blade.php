@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
  <div class="lh-1">
    <h3 class="h3 mb-1 lh-1">Donors</h3>
    <h6 class="ml-3 mt-2 text-gray-dark">Total Donations: UGX <strong>{{ number_format($totalDonations) }}</strong>.</h6>
    <strong class="text-gray-dark"><a href="/donors/create" class="nav-link active">Add A Donor</a></strong>
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
  <h5 class="pb-2 mb-0">Donors List</h5>
</div>

<div class="accordion my-3 p-3 bg-white rounded shadow-sm" id="accordionExample">
  @foreach ($donors as $donor)
    <div class="container accordion-item">
        <h2 class="accordion-header" id="heading{{ $donor->id }}">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $donor->id }}" aria-expanded="false" aria-controls="collapse{{ $donor->id }}">
            <strong>{{ $donor->name }}</strong>
          </button>
        </h2>
      <div id="collapse{{ $donor->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $donor->id }}" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Amount: UGX <strong>{{ number_format($donor->amount) }}</strong>
        </div>
        <div class="mt-2 mb-5 col-8">
          <a class="btn btn-outline-info float-left" href="/donors/{{ $donor -> id }}/edit" >Edit Donation Details</a>

          <form action="/donors/{{ $donor -> id }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger float-right">Remove Donation</button>
          </form>
        </div>
      </div>
    </div>
  @endforeach
  <div class="d-flex justify-content-center pt-3">
    {{ $donors->links("pagination::bootstrap-4") }}
  </div>
</div>
@endsection