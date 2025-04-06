@extends('panel.layout.app')
@section('content')

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Soft UI Dashboard 3 by Creative Tim</title>

  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />

  <!-- Bootstrap Icons CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <style>

    .hover-edit:hover {
      color: #218838; /* Darker green color for hover */
    }

    /* Hover effect for the trash icon */
    .hover-delete:hover {
      color: #c82333; /* Darker red color for hover */
    }

    .table-custom-shadow {
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    }

    .gradient-icon {
      background: linear-gradient(45deg, rgb(200, 25, 25), rgb(19, 98, 233));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-size: 24px;
    }

    .view-permission {
    color:rgb(41, 120, 211);
    }

    .view-permission:hover {
      color:rgb(5, 37, 100); /* Darker red color for hover */
    }

    .hover-edit:hover,.hover-view:hover, .hover-delete:hover, .view-permission:hover {
    transform: scale(1.3); /* Increase size by 10% */
    transition: all 0.3s ease; /* Smooth transition for scaling */
    }

    .list-group-item {
      border: none;
      padding: 10px 15px;
      border-bottom: 1px solid #ddd;
    }

    .list-group-item:last-child {
      border-bottom: none;
    }

    .modal-footer {
      background-color: #f1f1f1;
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
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">List Role</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">List Role</h6>
      </nav>

      <br>

      <!-- Role Permission Table -->
      <div class="row">
        <div class="col-12">
          <div class="card mb-4 table-custom-shadow">
            <div class="card-header pb-0 d-flex align-items-center">
              <h6 class="mb-0">Role Permission Table</h6>
              @if(session('success'))
                <div id="snackbar" class="snackbar">
                  <span class="snackbar-icon"><i class='bx bx-check-circle bx-tada text-success'></i></span>
                  <span class="snackbar-text">{{ session('success') }}</span>
                </div>
              @endif
              @if(!empty($PermissionAdd))
              <a class="btn bg-dark text-white ms-auto btn-sm" href="{{ url('panel/role/add') }}">Add</a>
              @endif
            </div>

            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Last Update</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>

                      <td>
                        <span class="text-secondary text-xs font-weight-bold ps-3">{{ $value->id }}</span>
                      </td>

                      <td>
                        <div class="d-flex px-2 py-1 gap-3 fs-4">
                          <div>
                            <i class="bi bi-person-lock gradient-icon"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $value->name }}</h6>
                          </div>
                        </div>
                      </td>

                      <td>
                        <span class="text-secondary text-xs font-weight-bold">
                          {{ \Carbon\Carbon::parse($value->updated_at)->format('F d, Y - H:i:s') }}
                        </span>
                      </td>

                      <td class="align-middle">
                        @if(!empty($PermissionEdit))
                        <a href="{{ url('panel/role/edit/' .$value->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          <i class="fas fa-pen text-success hover-edit"></i>
                        </a>
                        <span class="mx-2"></span>
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
                                          Are you sure you want to delete this Role?
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <form action="{{ route('role.delete', $value->id) }}" method="POST" class="d-inline">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger">Delete</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        @endif
                      </td>
                    </tr>

                    <!-- Modal for Each Role -->
                    <div class="modal fade" id="permissionsModal-{{ $value->id }}" tabindex="-1" aria-labelledby="permissionsModalLabel-{{ $value->id }}" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="permissionsModalLabel-{{ $value->id }}">Permissions for {{ $value->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <ul class="list-group">

                            </ul>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

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

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

@endsection('content')

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