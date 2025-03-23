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
  <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css') }}" rel="stylesheet" />


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
        margin: 10px 0; /* Optional: space around the divider */
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
                        <div class="p-4 border rounded shadow-sm bg-dark">
                            <h2 class="font-weight-bold text-white">Upload Payslip</h2>
                            <hr class="custom-divider">
                            <form action="{{ route('payslips.upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="user_id" class="form-label text-white">Select User</label>
                                        <select name="user_id" id="user_id" class="form-control" required>
                                            @foreach(\App\Models\User::all() as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="payslip_date" class="form-label text-white">Payslip Date</label>
                                        <input type="date" name="payslip_date" id="payslip_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="payslip" class="form-label text-white">Upload Payslip</label>
                                    <input type="file" name="payslip" id="payslip" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-gradient">Upload</button>
                            </form>
                        </div>
                        
                        <!-- bottom -->
                        <div class="card mb-4  mt-4">
                            <div class="card-header pb-0">
                                <h6 class="mb-0">Choose user</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Select Date</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($payslips as $payslip)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                            <img src="{{ $payslip->user->profile_photo ? asset('public/storage/' . $payslip->user->profile_photo) : asset('public/images/1.png') }}" class="avatar avatar-sm me-3" style="object-fit: cover;" alt="user">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $payslip->user->name }}</h6>
                                                                <p class="text-xs text-secondary mb-0">{{ $payslip->user->email }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary payslip-date-dropdown-btn" type="button" id="payslipDateDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Select Date <i class="bx bx-chevron-down"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="payslipDateDropdown">
                                                                @foreach(\App\Models\Payslip::where('user_id', $payslip->user_id)->orderBy('payslip_date', 'desc')->get() as $date)
                                                                    <a class="dropdown-item" href="#" data-value="{{ $date->payslip_date }}">{{ $date->payslip_date }}</a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="view-payslip-btn text-xs font-weight-bold view-payslip" data-user-id="{{ $payslip->user_id }}">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Payslip Viewer (Aside) -->
                    <div class="col-md-6">
                        <div class="p-4 border rounded shadow-sm bg-dark">
                            <h2 class="font-weight-bold text-white pb-3">View Payslip</h2>
                            <hr class="custom-divider">
                            <iframe id="payslipIframe" src="" style="width:100%; height:550px; border:1px solid #ddd; visibility: hidden;"></iframe>
                        </div>
                    </div>
                </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).on('click', '.view-payslip-btn', function(e) {
        e.preventDefault();

        const userId = $(this).data('user-id');
        const selectedDate = $(this).closest('tr').find('.payslip-date-dropdown-btn').text().trim();

        if (!selectedDate || selectedDate === 'Select Date') {
            alert('Please select a date!');
            return;
        }

        $.ajax({
            url: "{{ route('payslips.byDate') }}",
            type: "GET",
            data: {
                user_id: userId,
                payslip_date: selectedDate,
            },
            success: function (data) {
                if (data.file_path) {
                    const fileUrl = "{{ asset('public/storage') }}/" + data.file_path;
                    $('#payslipIframe').attr('src', fileUrl).css('visibility', 'visible'); // Make it visible without changing layout
                } else {
                    alert('No payslip found for this date!');
                }
            },
            error: function () {
                alert('Payslip not found or error occurred!');
            }
        });
    });

    // Handle dropdown item click to update the button text
    $(document).on('click', '.dropdown-item', function() {
        const selectedValue = $(this).data('value');
        const dropdownText = $(this).text();
        $(this).closest('tr').find('.payslip-date-dropdown-btn').text(dropdownText);
        $(this).closest('tr').find('.payslip-date-dropdown-btn').data('value', selectedValue);
    });
</script>

</body>
