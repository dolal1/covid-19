@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">Add Hospitals</h3>
    </div>
</div>

<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="row g-3">
        <form class="needs-validation">
            <div class="row g-3">
            <div class="col-sm-6">
                <label for="hospitalName" class="form-label">Hospital Name</label>
                <input
                type="text"
                class="form-control"
                id="hospital"
                placeholder="eg. Mulago Hospital"
                required
                />
            </div>

            <div class="col-sm-6">
                <label for="district" class="form-label">District</label>
                <input
                type="text"
                class="form-control"
                id="district"
                placeholder="eg. Kampala"
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
@endsection