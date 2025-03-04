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
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
@include('panel.layout.header')
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add New Role</h5>
              </div>
              <div class="card-body">
                <form action="" method="post">
                {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Role Name</label>
                        <input type="text" name="name" required class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>Permission</label>
                          @foreach($getPermission as $value)
                          <div class="mb-3">
                            <!-- Permission Name -->
                            <div class="font-weight-bold mb-1">
                              {{ $value['name'] }}
                            </div>
                            <!-- Groups under the permission -->
                            <div class="d-flex flex-wrap">
                              @foreach($value['group'] as $group)
                              <div class="d-flex align-items-center mr-3 mb-2">
                                <label><input type="checkbox" value="{{ $group['id'] }}"  name="Permission_id[]">  {{ $group['name'] }}</label>
                              </div>
                              @endforeach
                            </div>
                          </div>
                          @endforeach
                        </div>
                      </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
</div>


@endsection('content')