@extends('panel.layout.app')
@section('content')
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>Soft UI Dashboard 3 by Creative Tim</title>
  <!-- Fonts and Icons -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.1.0') }}" rel="stylesheet" />

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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Leave Requests</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add New Leave Requests</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Add New Leave Requests</h6>
        </nav>
        <br>

        <!-- Error Alert -->
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-10">
                <div class="card mb-3 table-custom-shadow p-6">
                    <h2 class="mb-4">Apply for Selected User</h2>
                    <form action="{{ route('leave_requests.storeForUser') }}" method="POST" enctype="multipart/form-data" id="leaveForm">
                        @csrf

                        <!-- User Selection -->
                        <div class="mb-3">
                            <label for="user_id" class="form-label fw-bold">Select User</label>
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option value="" disabled selected>-- Search and Select User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Reason for Leave -->
                        <div class="mb-3">
                            <label for="category" class="form-label fw-bold">Leave Category</label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="" disabled selected>Select a category</option>
                                <option value="annual_leave">Annual Leave</option>
                                <option value="sick_leave">Sick Leave</option>
                                <option value="emergency_leave">Emergency Leave</option>
                                <option value="unpaid_leave">Unpaid Leave</option>
                            </select>
                        </div>

                        <!-- Leave Date -->
                        <div class="mb-3">
                            <label for="leave_date_start">Start Date:</label>
                            <input type="date" name="leave_date_start" required>

                            <label for="leave_date_end">End Date:</label>
                            <input type="date" name="leave_date_end" required>
                            <small id="dateError" class="text-danger" style="display: none;">Please select a date after today.</small>
                        </div>

                        <!-- Medical Certificate Upload -->
                        <div class="mb-3">
                            <label for="mc_pdf" class="form-label fw-bold">Medical Certificate (PDF)</label>
                            <input type="file" name="mc_pdf" class="form-control" accept="application/pdf">
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-dark fw-bold px-4">Apply Leave</button>
                            <a href="{{ route('leave_requests.index') }}" class="btn btn-danger ms-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    document.getElementById('leaveForm').addEventListener('submit', function(event) {
        const leaveDate = document.getElementById('leave_date').value;
        const today = new Date().toISOString().split('T')[0];
        const dateError = document.getElementById('dateError');

        if (leaveDate <= today) {
            event.preventDefault();
            dateError.style.display = 'block';
        } else {
            dateError.style.display = 'none';
        }
    });
</script>
@endsection
