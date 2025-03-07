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

  <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

  <style>
    /* Hover effect for the pen icon */
.hover-edit:hover {
  color: #218838; /* Darker green color for hover */
}

/* Hover effect for the trash icon */
.hover-delete:hover {
  color: #c82333; /* Darker red color for hover */
}

/* Hover effect for the eye icon */
.hover-view:hover {
  color:rgb(73, 145, 213); /* Darker red color for hover */
}

/* Optional: Make the icons slightly bigger on hover */
.hover-edit:hover, .hover-delete:hover, .hover-view:hover{
  transform: scale(1.3); /* Increase size by 10% */
  transition: all 0.3s ease; /* Smooth transition for scaling */
}

/* Ensure content is above the blurred background */
.modal-content > .position-relative {
  position: relative;
  z-index: 2;
}

/* Profile Picture */
.profile-picture {
  width: 280px;
  height: 320px;
  object-fit: cover;
  border-radius: 10px; /* Makes the image square with slightly rounded corners */
}
/*
.blur-gradient {
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0.9), rgb(143, 143, 143));
    backdrop-filter: blur(10px);
    padding: 20px;
}
*/
.custom-divider {
  border: none;            
  height: 3px;             
  background: linear-gradient(to right,rgb(202, 202, 202),rgb(191, 119, 37)); 
  width: 30%; /* Adjust width */
  margin: 5px auto 20px auto; /* Center it */
  border-radius: 5px;      
  opacity: 0.8;           
}

.blur-background {
  width: 100%;
  padding: 50px;
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.3); /* Light transparency */
  backdrop-filter: blur(10px);
  overflow: hidden;
}

.blur-background::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: inherit; /* Use the dynamically set background image */
  background-size: cover;
  background-position: center;
  filter: blur(15px); /* Increase blur intensity */
  z-index: -1;
  opacity: 100; /* Adjust visibility */
}

.close-button {
  position: absolute;
  top: 10px;
  right: 10px;
  z-index: 10; /* Ensure it's above everything */
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
  border-radius: 50%; /* Make it round */
  padding: 5px;
}

.close-button:hover {
  background-color: rgba(0, 0, 0, 0.7); /* Darker on hover */
}


  </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
@include('panel.layout.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
@include('panel.layout.header')

  <div class="container-fluid py-4">
  <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page">List User</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">List User</h6>
  </nav>
  <br>
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0 d-flex align-items-center">
                <h6 class="mb-0">Manage Employee</h6>
                @if(!empty($PermissionAdd))
                <a class="btn btn-primary ms-auto btn-sm" href="{{ url('panel/user/add') }}">Add</a>
                @endif
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Age</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employment Pass</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Passport</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                        <th class="text-secondary opacity-7"></th>  
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($getRecord as $value)
                        @if($value->role_name == "User")
                          <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                <div>
                                  <img src="{{ $value->profile_photo ? asset('public/storage/' . $value->profile_photo) : asset('public/images/1.png') }}" class="avatar avatar-sm me-3" style="object-fit: cover;" alt="user1">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{ $value->name }}</h6>
                                  <p class="text-xs text-secondary mb-0">{{ $value->email }}</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0">{{ $value->phone }}</p>
                              <p class="text-xs text-secondary mb-0">{{ $value->address }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="text-secondary text-xs font-weight-bold">{{ $value->age }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="text-secondary text-xs font-weight-bold">{{ $value->employment_pass }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="text-secondary text-xs font-weight-bold">{{ $value->passport_number }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-success">{{ $value->role_name }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold">{{ $value->created_at }}</span>
                            </td>
                            <td class="align-middle">
                            @if(!empty($PermissionEdit))
                              <a href="{{ url('panel/user/edit/' . $value->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                <i class="fas fa-pen text-success hover-edit"></i>
                              </a>
                            @endif
                              <span class="mx-2"></span>
                            @if(!empty($PermissionDelete))
                              <a href="{{ url('panel/user/delete/' . $value->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
                                <i class="fas fa-trash text-danger hover-delete"></i>
                              </a>
                            @endif
                              <!-- View Button -->
                              <button type="button" class="border-0 bg-transparent text-secondary font-weight-bold text-xs"
                                onclick="showUserDetails('{{ $value->name }}', '{{ $value->email }}', '{{ $value->address }}', '{{ $value->phone }}', '{{ $value->employment_pass }}', '{{ $value->passport_number }}', '{{ $value->role_name }}', '{{ $value->created_at }}', '{{ $value->updated_at }}', '{{ $value->profile_photo ? asset('public/storage/' . $value->profile_photo) : asset('public/images/1.png') }}')">
                                <i class="fas fa-eye text-info hover-edit"></i>
                              </button>
                            </td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0 d-flex align-items-center">
                <h6 class="mb-0">Manage Admin</h6>
                @if(!empty($PermissionAdd))
                <a class="btn btn-primary ms-auto btn-sm" href="{{ url('panel/user/add') }}">Add</a>
                @endif
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Age</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                        <th class="text-secondary opacity-7"></th>  
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($getRecord as $value)
                        @if($value->role_name == "Admin")
                          <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                <div>
                                  <img src="{{ $value->profile_photo ? asset('public/storage/' . $value->profile_photo) : asset('public/images/1.png') }}" class="avatar avatar-sm me-3" style="object-fit: cover;" alt="user1">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{ $value->name }}</h6>
                                  <p class="text-xs text-secondary mb-0">{{ $value->email }}</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0">{{ $value->phone }}</p>
                              <p class="text-xs text-secondary mb-0">{{ $value->address }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="text-secondary text-xs font-weight-bold">{{ $value->age }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-success">{{ $value->role_name }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold">{{ $value->created_at }}</span>
                            </td>
                            <td class="align-middle">
                            @if(!empty($PermissionEdit))
                              <a href="{{ url('panel/user/edit/' . $value->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                <i class="fas fa-pen text-success hover-edit"></i>
                              </a>
                            @endif
                              <span class="mx-2"></span>
                            @if(!empty($PermissionDelete))
                              <a href="{{ url('panel/user/delete/' . $value->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
                                <i class="fas fa-trash text-danger hover-delete"></i>
                              </a>
                            @endif
                              <!-- View Button -->
                              <button type="button" class="border-0 bg-transparent text-secondary font-weight-bold text-xs"
                                onclick="showUserDetails('{{ $value->name }}', '{{ $value->email }}', '{{ $value->address }}', '{{ $value->phone }}', '{{ $value->employment_pass }}', '{{ $value->passport_number }}', '{{ $value->role_name }}', '{{ $value->created_at }}', '{{ $value->updated_at }}', '{{ $value->profile_photo ? asset('public/storage/' . $value->profile_photo) : asset('public/images/1.png') }}')">
                                <i class="fas fa-eye text-info hover-edit"></i>
                              </button>
                            </td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0 d-flex align-items-center">
                <h6 class="mb-0">Manage Super Admin</h6>
                @if(!empty($PermissionAdd))
                <a class="btn btn-primary ms-auto btn-sm" href="{{ url('panel/user/add') }}">Add</a>
                @endif
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Age</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                        <th class="text-secondary opacity-7"></th>  
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($getRecord as $value)
                        @if($value->role_name == "Super Admin")
                          <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                <div>
                                <img src="{{ $value->profile_photo ? asset('public/storage/' . $value->profile_photo) : asset('public/images/1.png') }}" class="avatar avatar-sm me-3" style="object-fit: cover;" alt="user1">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{ $value->name }}</h6>
                                  <p class="text-xs text-secondary mb-0">{{ $value->email }}</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0">{{ $value->phone }}</p>
                              <p class="text-xs text-secondary mb-0">{{ $value->address }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="text-secondary text-xs font-weight-bold">{{ $value->age }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-success">{{ $value->role_name }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold">{{ $value->created_at }}</span>
                            </td>
                            <td class="align-middle">
                            @if(!empty($PermissionEdit))
                              <a href="{{ url('panel/user/edit/' . $value->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                <i class="fas fa-pen text-success hover-edit"></i>
                              </a>
                            @endif
                              <span class="mx-2"></span>
                            @if(!empty($PermissionDelete))
                              <a href="{{ url('panel/user/delete/' . $value->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
                                <i class="fas fa-trash text-danger hover-delete"></i>
                              </a>
                            @endif
                            <!-- View Button -->
                            <button type="button" class="border-0 bg-transparent text-secondary font-weight-bold text-xs"
                              onclick="showUserDetails('{{ $value->name }}', '{{ $value->email }}', '{{ $value->address }}', '{{ $value->phone }}', '{{ $value->employment_pass }}', '{{ $value->passport_number }}', '{{ $value->role_name }}', '{{ $value->created_at }}', '{{ $value->updated_at }}', '{{ $value->profile_photo ? asset('public/storage/' . $value->profile_photo) : asset('public/images/1.png') }}')">
                              <i class="fas fa-eye text-info hover-edit"></i>
                            </button>
                            </td>
                          </tr>
                        @endif
                      @endforeach
                      <!-- User Details Modal -->
                      <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content rounded-3 position-relative" style="background-color:rgb(255, 255, 255);">
                            <!-- Modal Body -->
                            <div class=" text-center position-relative">
                              <!-- Profile Picture, Name & Role -->
                              <div class="d-flex flex-column align-items-center blur-background position-relative">
                                <!-- Close Button -->
                                <button type="button" class="btn-close btn-close-white close-button" data-bs-dismiss="modal" aria-label="Close"></button>

                                <!-- Profile Picture Wrapper -->
                                <div class="position-relative">
                                  <img
                                    id="modalUserPicture"
                                    src=""
                                    alt="Profile Picture"
                                    class="profile-picture shadow"
                                  />
                                </div>

                                <!-- Name -->
                                <h4 class="mt-3 mb-1" id="modalUserName" style="color: rgb(255, 255, 255); font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);"></h4>

                                <!-- Role -->
                                <p class="" id="modalUserRole" style="color: rgb(255, 255, 255); font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); letter-spacing: 1.5px;"></p>
                              </div>
                              <!-- User Details Card -->
                              <div class="card shadow-sm mx-auto text-center rounded-4" style="background-color:rgb(255, 255, 255);">
                                <div class="card-body">
                                <hr class="custom-divider">
                                  <!-- User Details -->
                                  <div class="container px-3 text-secondary text-start" style="font-size: 15px;">
                                    <div class="d-flex justify-content-center"> <!-- Flex container to center -->
                                      <div class="row w-100" style="max-width: 650px;"> <!-- Adjust max width -->
                                        <!-- Left Column -->
                                        <div class="col-md-6 mt-2">
                                          <div class="mb-1">
                                            <h6 class="mb-0"><i class="fa-solid fa-envelope-circle-check me-2"></i>Email</h6>
                                            <a href="mailto:" id="modalUserEmail" class="text-decoration-none text-dark d-block"></a>
                                          </div>

                                          <div class="mb-1 mt-3">
                                            <h6 class="mb-0"><i class="fa-solid fa-phone-volume me-2"></i>Phone</h6>
                                            <span id="modalUserPhone" class="d-block"></span>
                                          </div>

                                          <div class="mb-1 mt-3">
                                            <h6 class="mb-0"><i class="fa-solid fa-location-dot me-2"></i>Address</h6>
                                            <span id="modalUserAddress" class="d-block"></span>
                                          </div>
                                        </div>

                                        <!-- Right Column (Employment & Passport) -->
                                        <div class="col-md-6 mt-2">
                                          <div class="mb-1" id="employmentPass">
                                            <h6 class="mb-0"><i class="fa-solid fa-address-card me-2"></i>Employment Pass</h6>
                                            <span id="modalUserEmployment" class="d-block"></span>
                                          </div>

                                          <div class="mb-1 mt-3" id="passportNumber">
                                            <h6 class="mb-0"><i class="fa-solid fa-passport me-2"></i>Passport No</h6>
                                            <span id="modalUserPassport" class="d-block"></span>
                                          </div>

                                          <div class="mb-1 mt-3">
                                            <h6 class="mb-0"><i class="fa-solid fa-user me-2"></i>Member Since</h6>
                                            <span id="modalUserCreated" class="d-block"></span>
                                          </div>

                                        </div>
                                      </div>
                                      <!-- Full Width Row for Membership Info -->
                                      <div class="row">
                                        <div class="col-md-8 mt-2">
                                          <div class="mb-1">
                                            <h6 class="mb-0"><i class="fa-solid fa-pen-to-square me-2"></i>Last Updated</h6>
                                            <span id="modalUserUpdated" class="d-block"></span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
@endsection('content')

<script>
  function showUserDetails(name, email, address, phone, employment_pass, passport_number, role_name, created_at, updated_at, profile_photo) {
    document.getElementById("modalUserName").innerText = name;
    document.getElementById("modalUserEmail").innerText = email;
    document.getElementById("modalUserAddress").innerText = address;
    document.getElementById("modalUserPhone").innerText = phone;
    document.getElementById("modalUserEmployment").innerText = employment_pass;
    document.getElementById("modalUserPassport").innerText = passport_number;
    document.getElementById("modalUserRole").innerText = role_name;
    document.getElementById("modalUserCreated").innerText = created_at;
    document.getElementById("modalUserUpdated").innerText = updated_at;
    document.getElementById("modalUserPicture").src = profile_photo;
    
    // Initialize and show the modal using Bootstrap 5
    var myModal = new bootstrap.Modal(document.getElementById('profileModal'));
    myModal.show();
  }

  document.addEventListener("DOMContentLoaded", function () {
  const profilePic = document.getElementById("modalUserPicture");
  const blurBackground = document.querySelector(".blur-background");

  if (profilePic && blurBackground) {
    profilePic.onload = function () {
      blurBackground.style.backgroundImage = `url(${profilePic.src})`;
      blurBackground.style.backgroundSize = "cover";
      blurBackground.style.backgroundPosition = "center";
      blurBackground.style.backgroundRepeat = "no-repeat";
    };
  }
});
  
</script>
