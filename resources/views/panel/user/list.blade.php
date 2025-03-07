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
    /* Hover effect for the pen icon */
.hover-edit:hover {
  color: #218838; /* Darker green color for hover */
}

/* Hover effect for the trash icon */
.hover-delete:hover {
  color: #c82333; /* Darker red color for hover */
}

/* Optional: Make the icons slightly bigger on hover */
.hover-edit:hover, .hover-delete:hover {
  transform: scale(1.3); /* Increase size by 10% */
  transition: all 0.3s ease; /* Smooth transition for scaling */
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
                              <a href="{{ url('panel/user/edit/' . $value->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                <i class="fas fa-pen text-success hover-edit"></i>
                              </a>
                              <span class="mx-2"></span>
                              <a href="{{ url('panel/user/delete/' . $value->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
                                <i class="fas fa-trash text-danger hover-delete"></i>
                              </a>
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
                              <a href="{{ url('panel/user/edit/' . $value->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                <i class="fas fa-pen text-success hover-edit"></i>
                              </a>
                              <span class="mx-2"></span>
                              <a href="{{ url('panel/user/delete/' . $value->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
                                <i class="fas fa-trash text-danger hover-delete"></i>
                              </a>
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
  </div>
</main>

</body>
@endsection('content')
