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
              <h5 class="card-title mb-0">Edit User</h5>
            </div>
            <div class="card-body">
              <form action="" method="post">
                {{ csrf_field() }}
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" value="{{ $getRecord->name }}" required class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label for="age" class="form-label">Age</label>
                    <input type="text" id="age" name="age" value="{{ $getRecord->age }}" required class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ $getRecord->phone }}" required class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" id="email" name="email" value="{{ $getRecord->email }}" readonly class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" id="address" name="address" value="{{ $getRecord->address }}" required class="form-control">
                  </div>
                </div>

                <!-- Employment Pass & Passport Number -->
                <div class="form-group row">
                    @if($getRecord->role_id !== 1 && $getRecord->role_id !== 2)
                    <div class="col-md-6">
                        <label for="employment_pass">Employment Pass</label>
                        <input type="text" id="employment_pass" name="employment_pass" value="{{ $getRecord->employment_pass }}" required class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="passport_number">Passport Number</label>
                        <input type="text" id="passport_number" name="passport_number" value="{{ $getRecord->passport_number }}" required class="form-control">
                    </div>
                    @else
                    <input type="hidden" name="employment_pass" value="{{ $getRecord->employment_pass }}">
                    <input type="hidden" name="passport_number" value="{{ $getRecord->passport_number }}">
                    @endif
                </div>


                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" id="password" name="password" class="form-control">
                    <small class="text-muted">(Leave blank if you don't want to change the password.)</small>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="role_id" class="form-label">Role</label>
                    <select id="role_id" class="form-select" name="role_id" required>
                      <option value="">Select</option>
                      @foreach($getRole as $value)
                        <option value="{{ $value->id }}" {{ ($getRecord->role_id == $value->id) ? 'selected' : '' }}>
                          {{ $value->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

<script>
    // Run function on page load
    window.onload = function() {
        toggleFieldsBasedOnRole();
    };

    // Listen for changes in the role dropdown
    document.getElementById('roleSelect').addEventListener('change', function() {
        toggleFieldsBasedOnRole();
    });

    function toggleFieldsBasedOnRole() {
        var role = document.getElementById('roleSelect').value;

        var employmentPassField = document.getElementById('employmentPassField');
        var passportNumberField = document.getElementById('passportNumberField');
        var employmentPassInput = document.getElementById('employment_pass');
        var passportNumberInput = document.getElementById('passport_number');

        if (role == '1' || role == '2') {
            employmentPassField.style.display = 'none';
            passportNumberField.style.display = 'none';
            employmentPassInput.value = ''; // Clear input values
            passportNumberInput.value = '';
        } else {
            employmentPassField.style.display = 'block';
            passportNumberField.style.display = 'block';
        }
    }
</script>

@endsection
