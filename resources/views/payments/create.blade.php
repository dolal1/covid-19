@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">Payments Breakdown</h3>
    </div>
</div>

<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="row g-3">
      <p>
        <h3>Total Amount Donated in the month : <p style="color: green">{{ number_format($totalMonthly)}}</p> 
        </h3>
      </p>
      <table style="width: 100%">
        <tr>
          <th>Payable Funds : </th>
          <td>{{ number_format($payableFunds) }}</td>
        </tr>
        <tr><th> _</th></tr>
        <tr><th><p style="background-color:DodgerBlue; color: White">Heads Payments</p></th></tr>
        <tr>
          <th>Admin payment : </th>
          <td>{{ number_format($adminTotal) }}</td>
        </tr>
        <tr>
          <th>Director payment : </th>
          <td>{{ number_format($directorTotal) }}</td>
        </tr>
        <tr>
          <th>Superintendent payment : </th>
          <td>{{ number_format($superintendentTotal) }}</td>
        </tr>
        <tr>
          <th>Head Health Officer payment : </th>
          <td>{{ number_format($headHOfficerTotal) }}</td>
        </tr>
        <tr><th> _</th></tr>
        <tr><th><p style="background-color:Tomato; color: White">Health Officers Payments</p></th></tr>
        <tr>
          <th>Health Officer payment : </th>
          <td>{{ number_format($healthOfficerTotal) }}</td>
        </tr>
        <tr>
          <th>Senior Health Officer payment : </th>
          <td>{{ number_format($seniorHOfficerTotal) }}</td>
        </tr>
        <tr>
          <th>Covid-19 Consultant payment : </th>
          <td>{{ number_format($consultantTotal) }}</td>
        </tr>
        <tr><th> =================================</th></tr>
        <tr>
          <th>Total amount used : </th>
          <td>{{ number_format($totalPaid) }}</td>
        </tr>
        <tr><th> _</th></tr>
        <tr>
          <th>balanceAfterPaying : </th>
          <td>{{ number_format($balanceAfterPaying) }}</td>
        </tr>
      </table>
    </div>
</div>
@if ($balanceAfterPaying > 0) 
  <form method="POST" action="/payments">
    @csrf
    <input
          type="hidden"
          name="totalPaid"
          value= {{$totalPaid}}
        />

    <button class="w-50 btn btn-primary btn-lg" type="submit">
      Make Payment
    </button>
  </form>
  {{-- <a class="btn btn-primary btn-sm mt-3" href="/payments">Make Payment</a> --}}
@else
  <a class="btn btn-secondary disabled btn-sm mt-3" href="/payments">Unable to Make Payment</a>
@endif
@endsection