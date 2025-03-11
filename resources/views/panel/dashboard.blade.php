@extends('panel.layout.app')
@section('content')
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/porto-romano.png">
  <link rel="icon" type="image/png" href="../assets/img/porto-romano.png">
  <title>
    Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

  <!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


  <!-- loader css -->
  <link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}">

  <style>
    .bg-dark-table {
    background-color:#242b37 !important; /* Black background */
    color: #fff !important; /* White text */
  }

  /* Hover effect for the eye icon */
  .hover-view:hover {
    color:rgb(73, 145, 213); /* Darker red color for hover */
  }

  /* Optional: Make the icons slightly bigger on hover */
  .hover-edit:hover,.hover-view:hover{
    transform: scale(1.3); /* Increase size by 10% */
    transition: all 0.3s ease; /* Smooth transition for scaling */
  }

  .loader-widget {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: inline-block;
    border-top: 4px solid rgb(76, 76, 76);
    border-right: 4px solid transparent;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
    position: relative; /* Needed for ::after */
    transition: opacity 0.5s ease-out; /* Smooth fade-out for loader */
  }

.loader-widget::after {
    content: '';  
    box-sizing: border-box;
    position: absolute;
    left: 0;
    top: 0;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border-bottom: 4px solid #FF3D00;
    border-left: 4px solid transparent;
  }

  </style>
</head>
<body class="g-sidenav-show  bg-gray-100">
<div class="loader-container">
    <div class="loader"></div>
</div>

@include('panel.layout.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
@include('panel.layout.header')


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
          <a href="{{ url('panel/user') }}" class="text-decoration-none">
            <div class="card">
              <span class="mask opacity-10 border-radius-lg" style="background-color:rgb(101, 165, 77);"></span>
              <div class="card-body p-3 position-relative">
                <div class="row">
                  <div class="col-8 text-start">
                    <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                      <i class="bi bi-person-circle fs-5 opacity-10" style="color:rgb(0, 0, 0);"></i>
                    </div>
                    <!-- Spinner (Initially Visible) -->
                    <div class="loader-widget total-spinner" role="status"></div>
                    
                    <!-- Number (Initially Hidden) -->
                    <h5 class="text-white font-weight-bolder mb-0 mt-3 total-number d-none" data-count="{{ $totalUsers }}">
                      {{ $totalUsers }}
                    </h5>

                    <span class="text-white text-sm">Total Users</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-3 col-md-6 col-12">
          <div class="card">
          <a href="{{ url('panel/leave-requests') }}" class="text-decoration-none">
            <span class="mask opacity-10 border-radius-lg " style="background-color:#202020;"></span>
            <div class="card-body p-3 position-relative">
              <div class="row">
                <div class="col-8 text-start">
                  <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                    <i class="bi bi-file-earmark-diff-fill fs-5  opacity-10 " style="color:rgb(0, 0, 0);"></i>
                  </div>

                  <!-- Spinner (Initially Visible) -->
                  <div class="loader-widget total-spinner" role="status"></div>

                  <h5 class="text-white font-weight-bolder mb-0 mt-3 total-number d-none" data-count="{{ $totalPendingLeave }}">
                    {{ $totalPendingLeave }}
                  </h5>
                  <span class="text-white text-sm">Pending Leave Request</span>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>

        <div class="col-lg-3 col-md-6 col-12">
          <div class="card">
          <a href="{{ url('panel/activity_log') }}" class="text-decoration-none">
            <span class="mask opacity-10 border-radius-lg" style="background-color:rgb(231, 197, 74);"></span>
            <div class="card-body p-3 position-relative">
              <div class="row">
                <div class="col-8 text-start">
                  <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                    <i class="bi bi-door-open-fill fs-5 opacity-10 " style="color:rgb(0, 0, 0);"></i>
                  </div>

                  <!-- Spinner (Initially Visible) -->
                  <div class="loader-widget total-spinner" role="status"></div>

                  <!-- Total logs for today (Initially Hidden) -->
                  <h5 class="text-white font-weight-bolder mb-0 mt-3 total-number d-none" data-count="{{ $todayLogCount }}">
                    {{ $todayLogCount }}
                  </h5>
                  <span class="text-white text-sm">New Activity Log (Today)</span>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>

        <div class="col-lg-2 col-md-2 col-2">
          <div class="card">
            <span class="mask opacity-10 border-radius-lg" style="background-color:rgb(22, 22, 22);"></span>
            <div class="card-body p-3 position-relative">
                  <h5 class="text-white font-weight-bolder mb-0 mt-3" id="digital-clock">
                    00:00:00
                  </h5>
                  <span class="text-white text-sm">Digital Clock</span>
            </div>
          </div>
        </div>

      <div class="row my-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Leave Application</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">Latest</span> application
                  </p>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
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
            @foreach($getSixRecord as $key => $value)
                  <tr class="data-row d-none"> <!-- Initially Hidden -->
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="{{ $value->user->profile_photo ? asset('public/storage/' . $value->user->profile_photo) : asset('public/images/1.png') }}" 
                          class="avatar avatar-sm me-3" 
                          style="object-fit: cover;" 
                          alt="User Profile Picture">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm text-uppercase">{{ $value->user->name }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <a href="{{ url('panel/leave-requests') }}" class="border-0 bg-transparent text-secondary font-weight-bold text-xs">
                        <i class="fas fa-eye text-info hover-edit"></i>
                      </a>
                    </td>
                    <td><span class="text-secondary text-xs font-weight-bold">{{ $value->leave_date }}</span></td>
                    <td>
                      <span class="badge badge-sm 
                        @if($value->status == 'pending') bg-gradient-warning 
                        @elseif($value->status == 'approved') bg-gradient-success 
                        @else bg-gradient-danger 
                        @endif">
                        {{ ucfirst($value->status) }}
                      </span>
                    </td>
                  </tr>

                  <!-- Loader Row (Initially Visible) -->
                  <tr class="loader-row" data-index="{{ $key }}">
                    <td colspan="4" class="text-center">
                      <div class="loader-widget" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                    </td>
                  </tr>
                @endforeach
            </tbody>

            </table>

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
        <div class="card h-100">
    <div class="card-header pb-0">
      <h6>Recent Log Activity</h6>
      <p class="text-sm">
        <i class="bi bi-shield-slash-fill text-success"></i>
        <span class="font-weight-bold">Latest Activity</span>
      </p>
    </div>
    <div class="card-body p-3">
      <div class="timeline timeline-one-side">
        @forelse($logs as $key => $log)
          <!-- Loader Row (Initially Visible) -->
          <div class="timeline-block mb-3 log-loader" data-index="{{ $key }}">
            <div class="timeline-step">
            <i class="bi bi-alexa text-danger"></i>
            </div>
            <div class="timeline-content">
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                <div class="loader-widget" role="status">
                </div>
              </p>
            </div>
          </div>

          <!-- Log Entry (Initially Hidden) -->
          <div class="timeline-block mb-3 log-entry d-none" data-index="{{ $key }}">
            <span class="timeline-step">
              @if(str_contains(strtolower($log->description), 'login'))
                <i class="ni ni-key-25 text-success text-gradient"></i>
              @else
                <i class="bi bi-alexa text-danger"></i>
              @endif
            </span>
            <div class="timeline-content">
              <h6 class="text-dark text-sm font-weight-bold mb-0">
                {{ $log->causer?->name ?? 'Unknown User' }}
              </h6>
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                {{ ucfirst($log->description) }} at {{ $log->created_at->format('Y-m-d H:i:s') }}
              </p>
            </div>
          </div>
        @empty
          <p class="text-center text-muted">No recent logins</p>
        @endforelse
      </div>
    </div>
    
  </div>
</div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">Built by developers</p>
                    <h5 class="font-weight-bolder">Soft UI Dashboard</h5>
                    <p class="mb-5">From colors, cards, typography to complex elements, you will find the full documentation.</p>
                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                      Read More
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-primary border-radius-lg h-100">
                    <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <img class="w-100 position-relative z-index-2 pt-4" src="../assets/img/illustrations/rocket-white.png" alt="rocket">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/ivancik.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder mb-4 pt-2">Work with the rockets</h5>
                <p class="text-white">Wealth creation is an evolutionarily recent positive-sum game. It is all about who take the opportunity first.</p>
                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                  Read More
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      @include('panel.layout.footer')
    </div>

</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        let loaderContainer = document.querySelector(".loader-container");
        let loader = document.querySelector(".loader");
        
        // Add fade-out class
        loaderContainer.classList.add("fade-out");
        loader.classList.add("fade-out");

        // Remove loader from DOM after animation completes
        setTimeout(() => {
            loaderContainer.style.display = "none";
        }, 500); // Match transition duration (0.5s)
    }, 1000);
});
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
      document.querySelectorAll(".total-spinner").forEach(spinner => spinner.classList.add("d-none"));
      document.querySelectorAll(".total-number").forEach(number => number.classList.remove("d-none"));
    }, 2000); // Simulate loading time (2s)
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".data-row").forEach((row, index) => {
      setTimeout(() => {
        document.querySelector(`.loader-row[data-index='${index}']`).classList.add("d-none"); // Hide loader
        row.classList.remove("d-none"); // Show data row
      }, index * 450); // Increase delay for each row
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const logLoaders = document.querySelectorAll(".log-loader");
    const logEntries = document.querySelectorAll(".log-entry");

    logLoaders.forEach((loader, index) => {
      setTimeout(() => {
        loader.classList.add("d-none"); // Hide loader
        logEntries[index].classList.remove("d-none"); // Show actual log
      }, 350 * (index + 1)); // Delay increases per row (1s, 2s, 3s, etc.)
    });
  });
</script>

<script>
  function updateClock() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    document.getElementById('digital-clock').innerText = `${hours}:${minutes}:${seconds}`;
  }
  setInterval(updateClock, 1000);
  updateClock(); // Initialize immediately
</script>

</body>
@endsection('content')
