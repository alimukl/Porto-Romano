@extends('panel.layout.app')
@section('content')
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>Edit Leave Request</title>
  <!-- Fonts and Icons -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
  
</head>
<body class="g-sidenav-show bg-gray-100">
  @include('panel.layout.sidebar')

  <main class="main-content position-relative max-height-vh-100 h-120 border-radius-lg">
    @include('panel.layout.header')

    <div class="container mt-4">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h5 class="card-title mb-0">Edit Leave Request</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('leave_requests.update', $leaveRequest->id) }}" method="post">
                    {{ csrf_field() }}
                    @method('PUT') 
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="reason" class="form-label">Reason</label>
                            <input type="text" id="reason" name="reason" value="{{ $leaveRequest->reason }}" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="leave_date" class="form-label">Leave Date</label>
                            <input type="date" id="leave_date" name="leave_date" value="{{ $leaveRequest->leave_date }}" required class="form-control">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('leave_requests.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
@endsection