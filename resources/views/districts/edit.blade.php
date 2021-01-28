@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">Update District Info</h3>
    </div>
</div>

<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="row g-3">
            <form class="needs-validation" method="POST" action="/districts/{{ $district->id }}">
              @csrf
              @method('PATCH')
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="districtName" class="form-label">District Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="districtName"
                    name="name"
                    value="{{ $district->name }}"
                    placeholder="eg. Kampala"
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