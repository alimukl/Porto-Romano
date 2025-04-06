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
  
  <!-- Flatpickr CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <style>
    .table-custom-shadow {
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
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
            <div id="snackbar" class="snackbar">
            <span class="snackbar-icon"><i class='bx bx-x-circle bx-rotate-90 bx-tada' style='color:#b50200'></i></span>
            <span class="snackbar-text">{{ session('error') }}</span>
            </div>
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
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="" disabled selected>Select a user</option>
                                @foreach ($users as $u)
                                    <option value="{{ $u->id }}" {{ $user && $user->id == $u->id ? 'selected' : '' }}>
                                        {{ $u->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @if($user)
                            <!-- Reason for Leave -->
                            <div class="mb-3">
                                <label for="category" class="form-label fw-bold">Leave Category</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option value="" disabled selected>Select a category</option>
                                    <option value="Annual Leave">Annual Leave (Remaining: {{ $user->annual_leave_quota }} days)</option>
                                    <option value="Sick Leave">Sick Leave (Remaining: {{ $user->sick_leave_quota }} days)</option>
                                    <option value="Emergency Leave">Emergency Leave (Remaining: {{ $user->emergency_leave_quota }} days)</option>
                                    <option value="Maternity Leave">Maternity Leave (Remaining: {{ $user->maternity_leave_quota }} days)</option>
                                    <option value="Paternity Leave">Paternity Leave (Remaining: {{ $user->paternity_leave_quota }} days)</option>
                                    <option value="Unpaid Leave">Unpaid Leave (No limit)</option>
                                </select>
                            </div>
                        @endif

                        <!-- Leave Date -->
                        <div class="mb-3">
                            <label for="leave_date_start">Start Date:</label>
                            <input type="text" id="leave_date_start" name="leave_date_start" class="form-control" required>

                            <label for="leave_date_end">End Date:</label>
                            <input type="text" id="leave_date_end" name="leave_date_end" class="form-control" required>
                            <div id="dateError" style="display: none; color: red; font-weight: bold;"></div>
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
<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#leave_date_start", { minDate: "today" });
    flatpickr("#leave_date_end", { minDate: "today" });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const snackbar = document.getElementById('snackbar');
    if (snackbar) {
        snackbar.classList.add('show');
        setTimeout(() => snackbar.classList.remove('show'), 5000); // Hide after 3s
    }
});
</script>

<script>
    document.getElementById('user_id').addEventListener('change', function () {
        const userId = this.value;
        const url = `{{ route('leave_requests.createForUser', '') }}/${userId}`;

        window.location.href = url; // Redirect smoothly
    });
</script>

@endsection
