@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h3 class="h3 mt-3 lh-1">Month of {{ DateTime::createFromFormat('!m', $payment ->month)->format('F')  }}</h3>
    </div>
</div>
<div class="align-items-center p-3 my-3 bg-purple rounded shadow-sm">
    <div class="row g-3">
        <table style="width: 100%">
          <tr><th><p style="background-color:DodgerBlue; color: White">Heads Payments</p></th></tr>
          <tr>
            <th>Admin payment : </th>
            <td>{{  number_format($structure -> admin) }}</td>
          </tr>
          <tr>
            <th>Director payment : </th>
            <td>{{ number_format($structure -> director) }}</td>
          </tr>
          <tr>
            <th>Superintendent payment : </th>
            <td>{{ number_format($structure -> superintendent) }}</td>
          </tr>
          <tr>
            <th>Head Health Officer payment : </th>
            <td>{{ number_format($structure -> headHOfficer) }}</td>
          </tr>
          <tr><th> _</th></tr>
          <tr><th><p style="background-color:Tomato; color: White">Health Officers Payments</p></th></tr>
          <tr>
            <th>Covid-19 Consultant payment : </th>
            <td>{{ number_format($structure -> consultant) }}</td>
          </tr>
          <tr>
            <th>Senior Health Officer payment : </th>
            <td>{{ number_format($structure -> seniorHOfficer) }}</td>
          </tr>
          <tr>
            <th>Health Officer payment : </th>
            <td>{{ number_format($structure -> healthOfficer) }}</td>
          </tr>
          <tr><th> =================================</th></tr>
          <tr>
            <th>Total amount paid : </th>
            <td>{{ number_format($payment -> amount_paid) }}</td>
          </tr>
        </table>
      </div>
</div>

@endsection