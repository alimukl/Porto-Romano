@extends('panel.layout.app')
@section('content')

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>Soft UI Dashboard</title>

    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.1.0') }}" rel="stylesheet" />

<style>
  /* Hide default checkbox */
.custom-checkbox {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 15px;
    height: 15px;
    border: 2px solid #555;
    border-radius: 4px;
    display: inline-block;
    position: relative;
    cursor: pointer;
}

/* When checkbox is checked, show the icon */
.custom-checkbox:checked {
    background-color: #4caf50; /* Green background */
    border-color: #4caf50;
}

/* Add the checkmark icon when checked */
.custom-checkbox:checked::after {
    content: '\f00c'; /* Font Awesome check icon */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    color: #fff;
    font-size: 14px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

/* Improve checkbox hover/active feel */
.custom-checkbox:hover {
    border-color: #4caf50;
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
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add Role</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Add Role</h6>
          </nav>
          <br>

        <div class="content px-3 py-4">
            <div class="row">
                <div class="col-md-8 offset-md-1">
                    <div class="card shadow border-0 rounded-4">
                        <div class="card-header bg-dark text-black text-center">
                            <h5 class="mb-0 text-white">Add New Role</h5>
                        </div>

                        <div class="card-body p-3 bg-light">
                            <form action="" method="post">
                                {{ csrf_field() }}

                                <!-- Role Name Field -->
                                <div class="form-group mb-3 w-30">
                                    <label class="fw-semibold">Role Name</label>
                                    <input type="text" name="name" maxlength="20" required class="form-control" placeholder="Enter role name">
                                </div>

                                <!-- Permissions Section -->
                                <div class="form-group mb-3">
                                  <label class="fw-semibold">Permissions</label>
                                  <div class="d-flex flex-wrap gap-3">
                                      @foreach($getPermission as $value)
                                      <div class="permission-group p-2 border rounded bg-white d-flex align-items-center gap-2">
                                            <strong class="me-2">{{ $value['name'] }}:</strong>
                                            @foreach($value['group'] as $group)
                                            <div class="form-check me-2 d-flex align-items-center">
                                                <input class="custom-checkbox" type="checkbox" value="{{ $group['id'] }}" name="Permission_id[]" id="perm-{{ $group['id'] }}">
                                                <label class="form-check-label ms-1 mt-2" for="perm-{{ $group['id'] }}">{{ $group['name'] }}</label>
                                            </div>
                                            @endforeach
                                      </div>
                                      @endforeach
                                  </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection('content')