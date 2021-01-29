@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">Add Donor</h3>
    </div>
</div>

<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="row g-3">
            <form class="needs-validation" method="POST" action="/donors">
              @csrf
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="donorName" class="form-label">Donor Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="donorName"
                    name="name"
                    placeholder="eg. Tony Ssemakula"
                    required
                  />
                </div>

                <div class="col-md-6">
                  <label for="amount" class="form-label">Amount in UGX</label>
                  <input 
                    type="number"
                    id="amount"
                    name="amount"
                    class="form-control"
                    min="50000000.00"
                    step="1000000.00"
                    value="50000000.00"
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