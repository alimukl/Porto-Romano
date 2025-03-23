
@extends('panel.layout.app')
@section('content')
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ url('') }}/assets/img/porto-romano-new.png">
  <link rel="icon" type="image/png" href="{{ url('') }}/assets/img/porto-romano-new.png">
  <title>
    Porto Romano
  </title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css') }}" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


  <style>
    .card {
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .profile-picture {
    width: 280px;
    height: 320px;
    object-fit: cover;
    border-radius: 10px; /* Makes the image square with slightly rounded corners */
    }

    .p-4 {
        background-color: #f8f9fa;
    }

    .view-payslip {
    color:rgb(41, 120, 211);
    }

    .view-payslip:hover {
    color:rgb(5, 37, 100); /* Darker red color for hover */
    }

    .payslip-date-dropdown {
        width: 100%;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .custom-divider {
        border-top: 2px solid white !important; /* White color for the divider */
        margin: 10px 0!important; /* Optional: space around the divider */
        
    }

    .btn-gradient {
        background-image: linear-gradient(310deg, #1a1a1a 0%,rgb(77, 77, 77) 50%, #0d0d0d 100%);
        color: white;
    }

  </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('panel.layout.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        @include('panel.layout.header')

        @if(session('success'))
            <div id="snackbar" class="snackbar">
            <span class="snackbar-icon"><i class='bx bx-check-circle bx-tada text-success'></i></span>
            <span class="snackbar-text">{{ session('success') }}</span>
            </div>
        @endif

        <div class="container-fluid py-4">
            <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">All User Pay Slip</li>
                        </ol>
                        <h6 class="font-weight-bolder mb-0">All User Pay Slip</h6>
            </nav>
            <br>

            <div class="row">
                <!-- Top -->
                <div class="col-md-6">
                    <div>
                        <div class="p-4 border rounded shadow bg-dark text-white">
                            <h2 class="font-weight-bold text-white mb-3">User Details</h2>
                            <hr class="custom-divider mb-4">

                            <div class="row align-items-center mb-3">
                                <div class="col-md-3 text-center">
                                <img src="{{ Auth::user()->profile_photo ? asset('public/storage/' . Auth::user()->profile_photo) : asset('images/1.png') }}" 
                                alt="Profile Photo" 
                                class="img-fluid" 
                                style="width: 100%; max-width: 220px; height: auto; aspect-ratio: 1 / 1; object-fit: cover; border-radius: 2px;">
                                </div>
                                <div class="col-md-9">
                                    <div class="p-2 mb-2 bg-white text-dark rounded"><strong>Name:</strong> {{ $user->name }}</div>
                                    <div class="p-2 mb-2 bg-white text-dark rounded"><strong>Email:</strong> {{ $user->email }}</div>
                                    <div class="p-2 mb-2 bg-white text-dark rounded"><strong>Age:</strong> {{ $user->age }}</div>
                                    <div class="p-2 mb-2 bg-white text-dark rounded"><strong>Phone:</strong> {{ $user->phone }}</div>
                                    <div class="p-2 mb-2 bg-white text-dark rounded"><strong>Address:</strong> {{ $user->address }}</div>
                                </div>
                            </div>

                            <h3 class="font-weight-bold text-white mb-3">Employment Details</h3>
                            <hr class="custom-divider mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="p-2 mb-2 bg-white text-dark rounded"><strong>Job Position:</strong> {{ $user->job_position }}</div>
                                    <div class="p-2 mb-2 bg-white text-dark rounded"><strong>Employment Pass:</strong> {{ $user->employment_pass }}</div>
                                    <div class="p-2 mb-2 bg-white text-dark rounded"><strong>Passport Number:</strong> {{ $user->passport_number }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-2 mb-2 bg-white text-dark rounded"><strong>Annual Leave Quota:</strong> {{ $user->annual_leave_quota }}</div>
                                    <div class="p-2 mb-2 bg-white text-dark rounded"><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($user->start_date)->format('d M Y') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- bottom -->
                    <div class="card mb-4  mt-4">
                        <div class="col-md-6">
                            <div class="card mb-4 mt-4">
                                <div class="card-header pb-0">
                                    <h6 class="mb-0">Select Payslip Date</h6>
                                </div>
                                <div class="card-body">
                                    <form id="payslipForm" method="GET" action="{{ route('payslip.user') }}">
                                        <div class="form-group">
                                            <label for="payslipDate">Choose Date:</label>
                                            <select name="payslipDate" id="payslipDate" class="form-control">
                                                <option value="">Select a date</option>
                                                @foreach($dates as $date)
                                                    <option value="{{ $date->payslip_date }}" 
                                                        {{ request('payslipDate') == $date->payslip_date ? 'selected' : '' }}>
                                                        {{ $date->payslip_date }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-gradient mt-2">View Payslip</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Payslip Viewer (Aside) -->
                <div class="col-md-6">
                    <div class="p-4 border rounded shadow-sm bg-dark " style="width:100%; height:680px; border:1px solid #ddd;">
                        <h2 class="font-weight-bold text-white pb-3">Payslip Viewer</h2>
                        <hr class="custom-divider">

                        @if($payslipFile)
                            <iframe src="{{ $payslipFile }}" style="width:100%; height:550px; border:1px solid #ddd;"></iframe>
                        @else
                            <div class="text-center text-muted mt-4">
                                <p>No payslip selected or available.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

