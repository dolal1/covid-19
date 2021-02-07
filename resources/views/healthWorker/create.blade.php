@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">Add Health Worker</h3>
    </div>
</div>

@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  @endforeach    
@endif

<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
  <div class="row g-3">
    <div class="col-md-10 col-lg-12">
      <form class="needs-validation" method="POST" action="/healthworkers">
        @csrf
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="fullName" class="form-label">Full Names</label>
            <input
              type="text"
              class="form-control"
              id="fullName"
              name="name"
              placeholder="eg. Tony Ssemakula"
              required
            />
          </div>

          <div class="col-sm-6">
            <label for="userName" class="form-label">UserName</label>
            <input
              type="text"
              class="form-control"
              id="userName"
              name="username"
              placeholder="eg. t-ssema"
              required
            />
          </div>

        <hr class="my-4" />

        <button class="w-50 btn btn-primary btn-lg" type="submit">
          Submit
        </button>
      </form>
    </div>
  </div>
</div>
@endsection