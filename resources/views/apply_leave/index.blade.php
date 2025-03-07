@extends('panel.layout.app')
@section('content')
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Soft UI Dashboard 3 by Creative Tim</title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />

<style>
    .table-custom-shadow {
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1); /* You can adjust the values to control the shadow's size and intensity */
}
</style>
</head>

<body class="g-sidenav-show bg-gray-100">
@include('panel.layout.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
@include('panel.layout.header')

<div class="container-fluid py-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Apply Leave</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Apply Leave</h6>
  </nav>
  <br>

  <div class="row">
    <div class="col-12">
      <div class="card mb-4 table-custom-shadow">
      <div class="card-header pb-0 d-flex align-items-center">
        <h6 class="mb-0">Apply Requests Table</h6>      
        <div class="ms-auto">
            <a href="{{ route('apply_leave.create') }}" class="btn btn-primary btn-sm">Apply Leave</a>
        </div>
    </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            @if(session('success'))
              <div class="alert alert-success mx-3">{{ session('success') }}</div>
            @endif
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Reason</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Leave Date</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($leaveRequests as $leave)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                        <img src="{{ $leave->user->profile_photo ? asset('public/storage/' . $leave->user->profile_photo) : asset('public/images/1.png') }}" 
                        class="avatar avatar-sm me-3" 
                        style="object-fit: cover;" 
                        alt="User Profile Picture">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $leave->user->name }}</h6>
                        </div>
                      </div>
                    </td>
                    <td><span class="text-secondary text-xs font-weight-bold">{{ $leave->reason }}</span></td>
                    <td><span class="text-secondary text-xs font-weight-bold">{{ $leave->leave_date }}</span></td>
                    <td>
                      <span class="badge badge-sm 
                        @if($leave->status == 'pending') bg-gradient-warning 
                        @elseif($leave->status == 'approved') bg-gradient-success 
                        @else bg-gradient-danger 
                        @endif">
                        {{ ucfirst($leave->status) }}
                      </span>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</main>
</body>
@endsection
