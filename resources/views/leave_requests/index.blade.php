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
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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

.view-mc {
    color:rgb(41, 120, 211);
}

.view-mc:hover {
  color:rgb(5, 37, 100); /* Darker red color for hover */
}

.hover-view {
      background: linear-gradient(45deg, rgb(0, 0, 0), rgb(181, 181, 181));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-size: 12px;
    }

/* Optional: Make the icons slightly bigger on hover */
.hover-edit:hover,.hover-view:hover, .hover-delete:hover, .view-mc:hover {
  transform: scale(1.3); /* Increase size by 10% */
  transition: all 0.3s ease; /* Smooth transition for scaling */
}

  .table-custom-shadow {
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1); /* You can adjust the values to control the shadow's size and intensity */
}

.custom-btn-circle {
    width: 35px;
    height: 35px;
    padding: 0;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    transition: transform 0.2s ease-in-out;
    border: none;
}

/* Hover effects */
.custom-btn-circle:hover {
    transform: scale(1.1);
    opacity: 0.9;
}

/* Success button color tweak */
.custom-btn-circle.btn-success {
    background: linear-gradient(45deg,rgb(61, 131, 40),rgb(80, 186, 31));
    color: #fff;
}

/* Danger button color tweak */
.custom-btn-circle.btn-danger {
    background: linear-gradient(45deg,rgb(129, 31, 31),rgb(194, 46, 30));
    color: #fff;
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
          @if(session('success'))
          <div id="snackbar" class="snackbar">
            <span class="snackbar-icon"><i class='bx bx-check-circle bx-tada text-success'></i></span>
            <span class="snackbar-text">{{ session('success') }}</span>
          </div>
          @endif
          @if(!empty($PermissionAdd))
          <div class="ms-auto">
            <a href="{{ route('leave_requests.createForUser') }}" class="btn bg-dark text-white btn-sm">Add Leave</a>
            @endif
            <!-- Bulk Delete Button -->
            <button type="button" id="bulkDeleteButton" class="btn btn-danger btn-sm">
              Delete Selected
            </button>

            <!-- Bulk Delete Confirmation Modal -->
            <div class="modal fade" id="bulkDeleteModal" tabindex="-1" aria-labelledby="bulkDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h5 class="modal-title text-light" id="bulkDeleteModalLabel">Confirm Bulk Deletion</h5>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete these selected items?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <form id="bulkDeleteForm" action="{{ route('leave_requests.bulkDelete') }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="ids" id="deleteIds" value="">
                                <button type="submit" class="btn btn-danger">Confirm Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Medical Certificate (PDF)</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">End</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Remarks</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($getRecord as $value)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1 align-items-center gap-3">
                        <input type="checkbox" class="selectItem"  name="leave_requests[]" value="{{ $value->id }}" />
                          <div>
                            <img src="{{ $value->user->profile_photo ? asset('public/storage/' . $value->user->profile_photo) : asset('public/images/1.png') }}" 
                                class="avatar avatar-sm me-3" 
                                style="object-fit: cover;" 
                                alt="User Profile Picture">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ ucwords(strtolower($value->user->name)) }}</h6>
                            <p class="text-xs text-secondary mb-0" style="color:rgb(88, 120, 179)!important;">{{ $value->user->email }}</p>
                          </div>
                      </div>
                    </td>

                    <td><span class="text-secondary text-xs font-weight-bold">{{ $value->category }}</span></td>
                    <td>
                    @if ($value->mc_pdf)
                    <a href="{{ asset('public/storage/' . $value->mc_pdf) }}" target="_blank" class=" text-xs font-weight-bold view-mc">View MC</a>
                    @else
                    <a target="_blank" class=" text-xs font-weight-bold" style="color:rgb(156, 48, 48);">No Medical Certificate Uploaded</a>
                    @endif
                    </td>
                    <td>
                    <span class="text-secondary text-xs font-weight-bold" style="color:rgb(88, 120, 179)!important;">{{ \Carbon\Carbon::parse($value->leave_date_start)->format('d F y') }}</span>
                    </td>
                    <td>
                    <span class="text-secondary text-xs font-weight-bold" style="color:rgb(88, 120, 179)!important;">{{ \Carbon\Carbon::parse($value->leave_date_end)->format('d F y') }}</span>
                    </td>
                    <td>
                      <span class="badge badge-sm 
                        @if($value->status == 'pending') custom-pending
                        @elseif($value->status == 'approved') custom-approve 
                        @else custom-reject
                        @endif">
                        {{ ucfirst($value->status) }}
                      </span>
                    </td>
                    <td>
                    @if($value->status == 'pending')

                    @if(!empty($PermissionApprove))
                        <form action="{{ route('leave_requests.approve', $value->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn custom-btn-circle btn-success btn-sm" title="Approve">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                    @endif

                    @if(!empty($PermissionApprove))
                        <form action="{{ route('leave_requests.reject', $value->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn custom-btn-circle btn-danger btn-sm" title="Reject">
                                <i class="fas fa-times"></i>
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
                          <!-- Delete Button Trigger -->
                          <button type="button" class="border-0 bg-transparent text-secondary font-weight-bold text-xs" data-toggle="modal" data-target="#deleteModal{{ $value->id }}">
                              <i class="fas fa-trash text-danger hover-delete"></i>
                          </button>

                          <!-- Delete Confirmation Modal -->
                          <div class="modal fade" id="deleteModal{{ $value->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $value->id }}" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header bg-dark text-center">
                                          <h5 class="modal-title bg-dark text-center text-light text-bold" id="deleteModalLabel{{ $value->id }}">Confirm Deletion</h5>
                                      </div>
                                      <div class="modal-body">
                                          Are you sure you want to delete this leave request?
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <form action="{{ route('leave_requests.delete', $value->id) }}" method="POST" class="d-inline">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger">Delete</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        @endif

                        <!-- View Button Trigger -->
                        <button type="button" class="border-0 bg-transparent text-secondary font-weight-bold text-xs me-2" 
                                onclick="showLeaveDetails('{{ $value->user->name }}', '{{ $value->user->email }}', '{{ $value->reason }}')">
                          <i class="fas fa-eye text-info hover-view"></i>
                        </button>
                      </td>
                  </tr>
                @endforeach

                  <!-- Leave Request Details Modal -->
                  <div class="modal fade" id="leaveRequestModal" tabindex="-1" aria-labelledby="leaveRequestModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content shadow-lg">
                        <div class="modal-header bg-dark text-center">
                          <h5 class="modal-title bg-dark text-center text-light text-bold" id="leaveRequestModalLabel">Leave Request Details</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                          <div class="mb-2">
                            <strong class="text-secondary">Name:</strong>
                            <span id="modalUserName" class="ms-2 fw-semibold">John Doe</span>
                          </div>
                          <div class="mb-2">
                            <strong class="text-secondary">Email:</strong>
                            <span id="modalUserEmail" class="ms-2 fw-semibold">johndoe@example.com</span>
                          </div>
                          <div>
                            <strong class="text-secondary">Reason:</strong>
                            <span id="modalLeaveReason" class="ms-2 fw-semibold">Personal Leave</span>
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
@endsection

<script>
// Show leave details in the view modal
function showLeaveDetails(name, email, reason) {
    document.getElementById("modalUserName").innerText = name;
    document.getElementById("modalUserEmail").innerText = email;
    document.getElementById("modalLeaveReason").innerText = reason;
    $('#leaveRequestModal').modal('show');
}

document.addEventListener('DOMContentLoaded', function () {
    const deleteButton = document.getElementById('bulkDeleteButton');
    const confirmDelete = document.getElementById('confirmBulkDelete');
    const snackbar = document.getElementById('snackbar');
    
    if (deleteButton) {
        deleteButton.addEventListener('click', function (e) {
            e.preventDefault();

            const selectedIds = Array.from(document.querySelectorAll('input[name="leave_requests[]"]:checked'))
                .map(checkbox => checkbox.value);

            if (selectedIds.length === 0) {
                alert('Please select at least one leave request to delete!');
                return;
            }

            document.getElementById('deleteIds').value = JSON.stringify(selectedIds);
            $('#bulkDeleteModal').modal('show');
        });
    }

    if (confirmDelete) {
        confirmDelete.addEventListener('click', function () {
        document.getElementById('bulkDeleteForm').submit();
        showSnackbar("Leave requests deleted successfully!");
      });
    }

      if (snackbar) {
          snackbar.classList.add('show');
          setTimeout(() => snackbar.classList.remove('show'), 5000); // Hide after 3s
      }
  });

  // Ensure modals reset on close
  $(document).ready(function () {
      $('.modal').on('hidden.bs.modal', function () {
          $(this).find('form').trigger('reset');
      });
  });

</script>

