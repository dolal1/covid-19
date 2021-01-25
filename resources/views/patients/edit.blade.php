@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">Edit Patients Form</h3>
    </div>
</div>

<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="row g-3">
          <div class="col-md-7 col-lg-8">
            <form class="needs-validation" method="POST" action="/patients/{{ $patient -> id }}">
              @csrf
              @method('PATCH')
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="fullName" class="form-label">Full Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="fullName"
                    name="name"
                    value='{{ $patient->name }}'
                    defaultValue='{{ $patient->name }}'
                    required
                  />
                </div>

                <div class="col-sm-6">
                  <label for="hospital" class="form-label">Hospital</label>
                  <input
                    type="text"
                    class="form-control"
                    id="hospital"
                    name="hospital"
                    value='{{ $patient->hospital }}'
                    defaultValue='{{ $patient->hospital }}'
                    required
                  />
                </div>

                <div class="col-md-6">
                  <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" aria-label={{ $patient->gender }} required >
                        <option selected value="{{ $patient -> gender }}">{{ $patient->gender }}</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                </div>

                <div class="col-md-6">
                  <label for="healthWorker" class="form-label">Health Worker</label>
                  <input
                    type="text"
                    class="form-control"
                    id="healthWorker"
                    name="officer"
                    value='{{ $patient->officer }}'
                    defaultValue={{ $patient->officer }}
                    required
                  />
                </div>
              </div> 

              <div class="my-3 ">
                <label for="asymptomatic" class="form-label">Is Asymptomatic?</label>
                @if ($patient -> asymptomatic == 0)
                  <div class="form-check">
                      <input id="no" name="asymptomatic" value="0" type="radio" class="form-check-input" checked required>
                      <label class="form-check-label" for="no">No</label>
                  </div>
                  <div class="form-check">
                      <input id="yes" name="asymptomatic" value="1" type="radio" class="form-check-input" required>
                      <label class="form-check-label" for="yes">Yes</label>
                  </div>
                @else
                  <div class="form-check">
                      <input id="yes" name="asymptomatic" value="1" type="radio" class="form-check-input" checked required>
                      <label class="form-check-label" for="yes">Yes</label>
                  </div>
                  <div class="form-check">
                      <input id="no" name="asymptomatic" value="0" type="radio" class="form-check-input" required>
                      <label class="form-check-label" for="no">No</label>
                  </div>
                @endif
              </div>
              <hr class="my-4" />

              <button class="w-50 btn btn-primary btn-lg text-center" type="submit">
                Update
              </button>
            </form>
          </div>
        </div>
</div>
@endsection