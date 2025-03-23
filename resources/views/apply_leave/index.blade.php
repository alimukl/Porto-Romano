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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>
    .table-custom-shadow {
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1); /* You can adjust the values to control the shadow's size and intensity */
  }

  .custom-approve {
      background: linear-gradient(45deg,rgb(61, 131, 40),rgb(80, 186, 31));
      color: #fff;
      border-radius: 5px;
      padding: 6px 10px;
      font-weight: bold;
    }

    .custom-reject {
      background: linear-gradient(45deg,rgb(129, 31, 31),rgb(194, 46, 30));
      color: #fff;
      border-radius: 5px;
      padding: 6px 10px;
      font-weight: bold;
    }

    .custom-pending {
      background: linear-gradient(45deg,rgb(2, 2, 2),rgb(77, 77, 77));
      color: #fff;
      border-radius: 5px;
      padding: 6px 10px;
      font-weight: bold;
    }

    .view-mc {
      color:rgb(41, 120, 211);
  }

  .snackbar {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 1050;
      min-width: 250px;
      padding: 16px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 5px;
      opacity: 0;
      transition: opacity 0.5s ease-in-out;

      display: flex;
      align-items: center; /* Aligns icon and text vertically */
      gap: 0.5rem; /* Adds spacing between icon and text */
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  }

  .snackbar-icon {
      font-size: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
  }

  .snackbar-text {
      font-size: 1rem;
  }


  .snackbar.show {
      opacity: 1;
  }

  .snackbar-icon {
      font-size: 1.5rem;
  }

</style>
</head>

<body class="g-sidenav-show bg-gray-100">
@include('panel.layout.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
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
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">My Leave Request</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">My Leave Request</h6>
  </nav>
  <br>

  <div class="row">
    <div class="col-12">
      <div class="card mb-4 table-custom-shadow">
      <div class="card-header pb-0 d-flex align-items-center">
        <h6 class="mb-0">Apply Requests Table</h6>
        @if(session('success'))
          <div id="snackbar" class="snackbar">
            <span class="snackbar-icon"><i class='bx bx-check-circle bx-tada text-success'></i></span>
            <span class="snackbar-text">{{ session('success') }}</span>
          </div>
        @endif 
        <div class="ms-auto">
            <a href="{{ route('apply_leave.create') }}" class="btn bg-dark text-white btn-sm">Apply Leave</a>
        </div>
    </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">MC Pdf</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">End</th>
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
                          <h6 class="mb-0 text-sm">{{ ucwords(strtolower($leave->user->name)) }}</h6>
                        </div>
                      </div>
                    </td>
                    <td><span class="text-secondary text-xs font-weight-bold">{{ $leave->category }}</span></td>
                    <td>
                    @if ($leave->mc_pdf)
                      <a href="{{ asset('public/storage/' . $leave->mc_pdf) }}" target="_blank" class=" view-mc text-xs font-weight-bold">View MC</a>
                    @else
                      <a target="_blank" class=" text-xs font-weight-bold" style="color:rgb(156, 48, 48);">No Medical Certificate Uploaded</a>
                    @endif
                    </td>
                    <td>
                    <span class="text-secondary text-xs font-weight-bold" style="color:rgb(88, 120, 179)!important;">{{ \Carbon\Carbon::parse($leave->leave_date_start)->format('d F y') }}</span>
                    </td>
                    <td>
                    <span class="text-secondary text-xs font-weight-bold" style="color:rgb(88, 120, 179)!important;">{{ \Carbon\Carbon::parse($leave->leave_date_start)->format('d F y') }}</span>
                    </td>
                    <td>
                      <span class="badge badge-sm 
                        @if($leave->status == 'pending') custom-pending
                        @elseif($leave->status == 'approved') custom-approve 
                        @else custom-reject 
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const snackbar = document.getElementById('snackbar');
    if (snackbar) {
        snackbar.classList.add('show');
        setTimeout(() => snackbar.classList.remove('show'), 5000); // Hide after 3s
    }
});

$(document).ready(function() {
    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
});
</script>