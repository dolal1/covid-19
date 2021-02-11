@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
  <div class="lh-1">
    <h3 class="h3 mb-0 lh-1">Total Cases</h3>
    <p><strong>{{$totalNoPatients}}</strong></p>
  </div>
</div>

<div class="my-3 p-3 bg-white rounded shadow-sm col-10">
  <h6 class="border-bottom pb-2 mb-0">Summary</h6>
  <!-- Chart's container -->
  <div id="patientChart" style="height: 300px;"></div>
</div>

<div class="my-3 p-3 bg-white rounded shadow-sm col-10">
    <h6 class="border-bottom pb-2 mb-0">Patients</h6>
  @if (count($patients) > 0)
  @foreach ($patients as $patient)
  <div class="d-flex text-muted pt-3">
    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
      <div class="container d-flex justify-content-between">
        <strong class="text-gray-dark">{{ $patient -> name}}</strong>
        <a class="btn btn-outline-info btn-sm" href="/patients/{{$patient -> id}}">Follow Up</a>
      </div>
      <span class="container d-block">{{ $patient -> officer}}</span>
    </div>
  </div>
  @endforeach
  <small class="d-block text-end mt-3">
    <a href="/patients">All Patients</a>
  </small>
  @else
  <div class="d-flex text-muted pt-3">
    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
      <div class="container d-flex justify-content-between">
        <strong class="text-gray-dark">No Patients</strong>
      </div>
    </div>
  </div>
  <small class="d-block text-end mt-3">
    <a href="/patients/create">Add Patients</a>
  </small>
  @endif
</div>

  <div class="my-3 p-3 bg-white rounded shadow-sm col-10">
    <h6 class="border-bottom pb-2 mb-0">Health Workers</h6>
    @foreach ($healthWorkers as $healthWorker)
    <div class="d-flex text-muted pt-3">
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
            role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
        </svg>
    
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
                <strong class="text-gray-dark">{{ $healthWorker -> name}}</strong>
                <a class="btn btn-outline-info btn-sm" href="/healthworkers/{{ $healthWorker -> id}}">Follow Up</a>
            </div>
            <span class="d-block">@ {{ $healthWorker -> username}}</span>
        </div>
    </div>
    @endforeach
    <small class="d-block text-end mt-3">
      <a href="/healthworkers">All Health Workers</a>
    </small>
  </div>

  <div class="my-3 p-3 bg-white rounded shadow-sm col-10">
    <h6 class="border-bottom pb-2 mb-0">Hospitals</h6>
    @foreach ($hospitals as $hospital)
    <div class="d-flex text-muted pt-3">
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
            role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
        </svg>
    
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
                <strong class="text-gray-dark">{{ $hospital -> name}}</strong>
                <a class="btn btn-outline-info btn-sm" href="/hospitals/{{ $hospital -> id}}">Follow Up</a>
            </div>
            {{-- <span class="d-block">@ {{ $hospital -> username}}</span> --}}
        </div>
    </div>
    @endforeach
    <small class="d-block text-end mt-3">
      <a href="/hospitals">All Hospitals</a>
    </small>
  </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm col-10">
    <h6 class="border-bottom pb-2 mb-0">Donors</h6>
    @foreach ($donors as $donor)
    <div class="d-flex text-muted pt-3">
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
            role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
        </svg>
    
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
                <strong class="text-gray-dark">{{ $donor -> name}}</strong>
                <a class="btn btn-outline-info btn-sm" href="/donors">Follow Up</a>
            </div>
            {{-- <span class="d-block">@ {{ $donor -> username}}</span> --}}
        </div>
    </div>
    @endforeach
    <small class="d-block text-end mt-3">
      <a href="/donors">All Donors</a>
    </small>
  </div>
@endsection

@section('js')
    <script>
      const chart = new Chartisan({
        el: '#patientChart',
        url: "@chart('patients_chart')",
        hooks: new ChartisanHooks()
              .beginAtZero()
              .colors()
              .datasets([{type:'line', fill:false, borderColor:'blue'}, 'bar'])
      });
    </script>
@endsection