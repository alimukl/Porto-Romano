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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>
<body class="g-sidenav-show bg-gray-100">
  @include('panel.layout.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
  @include('panel.layout.header')

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-lg">
          <div class="card-header bg-primary text-white">
            <h5 class="title mb-0">Edit Role</h5>
          </div>
          <div class="card-body">
            <form action="" method="post">
              {{ csrf_field() }}

              <!-- Role Name Input -->
              <div class="mb-4">
                <label for="role-name" class="form-label">Role Name</label>
                <input type="text" id="role-name" name="name" value="{{ $getRecord->name }}" required class="form-control" placeholder="Enter role name">
              </div>

              <!-- Permissions Section -->
              <div class="mb-4">
                <label class="form-label">Permissions</label>
                @foreach($getPermission as $value)
                <div class="mb-3">
                  <div class="fw-bold mb-2">{{ $value['name'] }}</div>
                  <div class="d-flex flex-wrap">

                    <!-- Loop through permission groups -->
                    @foreach($value['group'] as $group)
                    @php
                    $checked = '';
                    @endphp

                    @foreach($getRolePermission as $role)
                    @if($role->permission_id == $group['id'])
                    @php
                    $checked = 'checked';
                    @endphp
                    @endif
                    @endforeach

                    <div class="form-check form-check-inline me-3 mb-2">
                      <input class="form-check-input" type="checkbox" id="permission-{{ $group['id'] }}" name="Permission_id[]" value="{{ $group['id'] }}" {{ $checked }}>
                      <label class="form-check-label" for="permission-{{ $group['id'] }}">{{ $group['name'] }}</label>
                    </div>
                    @endforeach

                  </div>
                </div>
                @endforeach
              </div>

              <!-- Submit Button -->
              <div class="text-end">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Optional: Custom CSS to make checkboxes more modern -->
<style>
  .form-check-input:checked {
    background-color: #007bff; /* Blue color for checked box */
    border-color: #007bff;    /* Blue border */
  }
  .form-check-input:focus {
    border-color: #007bff;    /* Blue border on focus */
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25); /* Blue glow on focus */
  }
  .form-check-input {
    width: 1.25rem;
    height: 1.25rem;
    margin-top: 0.3rem;
  }
  .form-check-label {
    font-size: 1rem;
    margin-left: 0.5rem;
  }
</style>



</body>
@endsection
