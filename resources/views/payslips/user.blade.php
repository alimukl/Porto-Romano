@extends('layouts.app')

@section('content')
<h2>Your Payslips</h2>
<table>
    <tr>
        <th>Date</th>
        <th>File</th>
    </tr>
    @foreach($payslips as $payslip)
    <tr>
        <td>{{ $payslip->payslip_date }}</td>
        <td><a href="{{ asset('storage/' . $payslip->file_path) }}" target="_blank">View</a></td>
    </tr>
    @endforeach
</table>
@endsection
