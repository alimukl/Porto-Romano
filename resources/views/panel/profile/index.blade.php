@extends('panel.layout.app')
@section('content')
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Soft UI Dashboard 3 by Creative Tim
  </title>  
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

  <style>
    .profile-picture-container {
        width: 250px;
        height: 250px;
        overflow: hidden;
        border-radius: 50%;
        margin: 0 auto;
    }

    .profile-picture-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
  </style>
</head>
<body class="g-sidenav-show  bg-gray-100">
@include('panel.layout.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
@include('panel.layout.header')

<div class="container-fluid px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row justify-content-center">
        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data" class="col-12 col-md-10 col-lg-8">
            @csrf
            @method('PUT')
            
            <!-- Profile Picture Section -->
            <div class="row mb-4">
                <div class="col-xl-4">
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">
                            <div class="profile-picture-container">
                                <img class="img-account-profile rounded-circle mb-2"
                                src="{{ Auth::user()->profile_photo ? asset('public/storage/' . Auth::user()->profile_photo) : asset('images/1.png') }}"
                                alt="Profile Picture">
                            </div>
                            <br>
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <input type="file" class="form-control" name="profile_photo">
                        </div>
                    </div>
                </div>
                
                <!-- Account Details Section -->
                <div class="col-xl-8">
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <!-- Name -->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputname">Name</label>
                                <input class="form-control" id="inputname" type="text" placeholder="Enter your name" name="name" value="{{ Auth::user()->name }}" required>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <!-- Age -->
                                    <label class="small mb-1" for="inputage">Age</label>
                                    <input class="form-control" id="inputage" type="text" placeholder="Enter your age" name="age" value="{{ Auth::user()->age }}" required>
                                </div>
                                <div class="col-md-6">
                                    <!-- Email -->
                                    <label class="small mb-1" for="inputEmail">Email</label>
                                    <input class="form-control" id="inputEmail" type="email" placeholder="Enter your email" name="email" value="{{ Auth::user()->email }}" required>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" name="phone" value="{{ Auth::user()->phone }}" required>
                                </div>
                            </div>
                            <!-- Save Changes Button -->
                            <button class="btn btn-dark text-white" type="submit">Save changes</button>

                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
</main>

</body>
@endsection('content')
