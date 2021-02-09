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
                  <select class="form-select" name="hospital_id" aria-label="Select Hospital" required>
                    <option value={{$hospital->id}} selected>{{$hospital->name}} - Original</option>
                    @foreach ($hospitals as $hospital)
                      <option value={{$hospital->id}}>{{ $hospital->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" aria-label="Select Gender">
                        <option value={{ $patient->gender }} selected>{{ $patient->gender }}</option>
                        <option value="F">Female</option>
                        <option value="M">Male</option>
                    </select>
                </div>

                <div class="col-md-6">
                  <label for="healthWorker" class="form-label">Health Worker</label>
                  <select class="form-select" name="healthWorker_id" aria-label="Select Health Worker" required>
                    <option value={{$healthWorker->id}} selected>{{$healthWorker->name}} - Original</option>
                    @foreach ($healthWorkers as $healthworker)
                      <option value={{$healthworker->id}}>{{ $healthworker->name}}</option>
                    @endforeach
                  </select>
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