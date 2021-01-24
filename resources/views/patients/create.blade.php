@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">Patients Form</h3>
    </div>
</div>

<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="row g-3">
          <div class="col-md-7 col-lg-8">
            <form class="needs-validation">
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="fullName" class="form-label">Full Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="fullName"
                    placeholder="Full Names"
                    required
                  />
                </div>

                <div class="col-sm-6">
                  <label for="hospital" class="form-label">Hospital</label>
                  <input
                    type="text"
                    class="form-control"
                    id="hospital"
                    placeholder="eg. Mulago Hospital"
                    required
                  />
                </div>

                <div class="col-md-6">
                  <label for="district" class="form-label">District</label>
                  <input
                    type="text"
                    class="form-control"
                    id="district"
                    placeholder="eg. Kampala"
                    required
                  />
                </div>

                <div class="col-md-3">
                  <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" aria-label="Select Gender">
                        <option selected>Select Gender</option>
                        <option value="F">Female</option>
                        <option value="M">Male</option>
                    </select>
                </div>

                <div class="col-md-3">
                  <label for="healthWorker" class="form-label">Health Worker</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder=""
                    required
                  />
                </div>
              </div> 

              <div class="my-3 ">
                 <label for="asymptomatic" class="form-label">Is Asymptomatic?</label>
                 <div class="form-check">
                     <input id="yes" name="paymentMethod" type="radio" class="form-check-input" required="">
                     <label class="form-check-label" for="yes">Yes</label>
                 </div>
                 <div class="form-check">
                     <input id="no" name="paymentMethod" type="radio" class="form-check-input" required="">
                     <label class="form-check-label" for="no">No</label>
               </div>
            </div>
              <hr class="my-4" />

              <button class="w-50 btn btn-primary btn-lg text-center" type="submit">
                Submit
              </button>
            </form>
          </div>
        </div>
</div>
@endsection