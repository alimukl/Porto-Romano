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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
.hover-edit:hover,.hover-view:hover, .hover-delete:hover {
  transform: scale(1.3); /* Increase size by 10% */
  transition: all 0.3s ease; /* Smooth transition for scaling */
}

  .table-custom-shadow {
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1); /* You can adjust the values to control the shadow's size and intensity */
}

.custom-btn-approve {
    background-color:rgb(126, 208, 44);
    border: 2px solid black;
    color: white;
    transition: all 0.3s ease-in-out;
}

.custom-btn-reject {
    background-color: #c61919;
    border: 2px solid black;
    color: white;
    transition: all 0.3s ease-in-out;
}

.custom-btn-approve:hover {
    background-color:rgb(69, 119, 20);
    color: white;
}

.custom-btn-reject:hover {
    background-color:rgb(127, 17, 17);
    color: white;
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
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Leave Requests</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Leave Requests</h6>
  </nav>
  <br>

  <div class="row">
    <div class="col-12">
      <div class="card mb-4 table-custom-shadow">
        <div class="card-header pb-0 d-flex align-items-center">
          <h6 class="mb-0">Leave Requests Table</h6>
          @if(!empty($PermissionAdd))
          <div class="ms-auto">
            <a href="{{ route('leave_requests.createForUser') }}" class="btn btn-primary btn-sm">Add Leave</a>
        </div>
        @endif
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Medical Certificate (PDF)</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Leave Date</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-7">Remarks</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($getRecord as $value)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1 align-items-center">
                        <!-- View Button placed before the user name -->
                        <button type="button" class="border-0 bg-transparent text-secondary font-weight-bold text-xs me-2" 
                                onclick="showLeaveDetails('{{ $value->user->name }}', '{{ $value->user->email }}', '{{ $value->reason }}')">
                          <i class="fas fa-eye text-info hover-view"></i>
                        </button>
                        <div>
                          <img src="{{ $value->user->profile_photo ? asset('public/storage/' . $value->user->profile_photo) : asset('public/images/1.png') }}" 
                              class="avatar avatar-sm me-3" 
                              style="object-fit: cover;" 
                              alt="User Profile Picture">
                        </div>
                        <div class="d-flex align-items-center">
                          <h6 class="mb-0 text-sm">{{ $value->user->name }}</h6>
                        </div>
                      </div>
                    </td>

                    <td><span class="text-secondary text-xs font-weight-bold">{{ $value->reason }}</span></td>
                    <td>
                    @if ($value->mc_pdf)
                    <a href="{{ asset('public/storage/' . $value->mc_pdf) }}" target="_blank" class=" text-decoration-underline text-xs font-weight-bold" style="color: #27a7d1;">View MC</a>
                    @else
                    <a target="_blank" class=" text-xs font-weight-bold" style="color:rgb(156, 48, 48);">No Medical Certificate Uploaded</a>
                    @endif
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
                    <td>
                    @if($value->status == 'pending')

                      @if(!empty($PermissionApprove))
                          <form action="{{ route('leave_requests.approve', $value->id) }}" method="POST" class="d-inline">
                              @csrf
                              <button type="submit" class="btn custom-btn-approve btn-sm">
                                  <i class="fas fa-check-circle me-1"></i> Approve
                              </button>
                          </form>
                      @endif

                      @if(!empty($PermissionApprove))
                          <form action="{{ route('leave_requests.reject', $value->id) }}" method="POST" class="d-inline">
                              @csrf
                              <button type="submit" class="btn custom-btn-reject btn-sm">
                                  <i class="fas fa-times-circle me-1"></i> Reject
                              </button>
                          </form>
                      @endif

                    @endif
                    </td>
                      <td>
                        @if(!empty($PermissionEdit))
                        <!-- Edit Button -->
                        <a href="{{ route('leave_requests.edit', $value->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Leave Request">
                            <i class="fas fa-pen text-success hover-edit"></i>
                        </a>
                        @endif

                        <!-- Delete Button -->
                        @if(!empty($PermissionDelete))
                        <form action="{{ route('leave_requests.delete', $value->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent text-secondary font-weight-bold text-xs" onclick="return confirm('Are you sure you want to delete this leave request?');" data-toggle="tooltip" data-original-title="Delete Leave Request">
                                <i class="fas fa-trash text-danger hover-delete"></i>
                            </button>
                        </form>
                        @endif
                      </td>
                  </tr>
                @endforeach
                <!-- Leave Request Details Modal -->
                <div class="modal fade" id="leaveRequestModal" tabindex="-1" role="dialog" aria-labelledby="leaveRequestModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="leaveRequestModalLabel">Leave Request Details</h5>
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p><strong>Name:</strong> <span id="modalUserName"></span></p>
                        <p><strong>Email:</strong> <span id="modalUserEmail"></span></p>
                        <p><strong>Reason:</strong> <span id="modalLeaveReason"></span></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
@endsection

<script>
  function showLeaveDetails(name, email, reason) {
    document.getElementById("modalUserName").innerText = name;
    document.getElementById("modalUserEmail").innerText = email;
    document.getElementById("modalLeaveReason").innerText = reason;
    $('#leaveRequestModal').modal('show');
  }
</script>