@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">Edit Health Worker Info</h3>
    </div>
</div>

<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="row g-3">
      <form class="needs-validation" method="POST" action="/healthworkers/{{ $healthWorker->id }}">
        @csrf
        @method('PATCH')
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="fullName" class="form-label">Full Names</label>
            <input
              type="text"
              class="form-control"
              id="fullName"
              name="name"
              value="{{ $healthWorker->name }}"
              placeholder="eg. Tony Ssemakula"
              required
            />
          </div>

          <div class="col-md-6">
            <label for="hospital" class="form-label">Hospital</label>
            <input
              type="text"
              class="form-control"
              id="hospital"
              name="hospital"
              value="{{ $healthWorker->hospital }}"
              placeholder="eg. Mulago Hospital"
              required
            />
          </div>

        <hr class="my-4" />

        <button class="w-50 btn btn-primary btn-lg" type="submit">
          Update
        </button>
      </form>
    </div>
</div>
@endsection