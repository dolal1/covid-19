@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">Add Health Worker</h3>
    </div>
</div>

<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="row g-3">
            <form class="needs-validation">
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="fullName" class="form-label">Full Names</label>
                  <input
                    type="text"
                    class="form-control"
                    id="fullName"
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
                    placeholder="eg. Mulago Hospital"
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