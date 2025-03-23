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

  <style>
  .container-details {
    background-color:rgb(21, 21, 21);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding-top:20px;
    padding-bottom:20px;
  }
  .img-account-profile {
    transition: transform 0.3s ease;
  }
  .img-account-profile:hover {
    transform: scale(1.05);
  }

  .table-custom-shadow {
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
  width: 100%;
  max-width: 1200px;
  margin: auto;
}

.container-details {
  gap: 1rem;
}

input, select {
  border-radius: 5px;
  padding: 0.5rem;
  border: 1px solid #ddd;
}

.bg-profile {
  background-color:rgb(244, 244, 244);
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 4px 10px rgba(117, 117, 117, 0.5);
  align-items: center;
  justify-content: center;
}

.flex-grow-1 {
  display: flex;
  flex-direction: column;
  text-align: left !important;
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
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">All User</a></li>
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit User's Details</li>
            </ol>
              <h6 class="font-weight-bolder mb-0">Edit User's Details</h6>
          </nav>
          <br>

          <!-- Error Alert -->
          @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

            <div class="row justify-content-center">
              <div class="col-lg-12">
                <div class="card mb-3 table-custom-shadow p-4">
                  <h2 class="mb-4">Edit User's Details</h2>
                  <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- User Info Section -->
                    <div class="d-flex flex-row flex-wrap gap-3">

                      <!-- Left Column: Basic Info -->
                      <div class="flex-grow-1 mt-2">
                        <label for="name" class="small">Name</label>
                        <input type="text" id="name" name="name" value="{{ $getRecord->name }}" required class="form-control mb-3">

                        <label for="email" class="small">Email</label>
                        <input type="text" id="email" name="email" value="{{ $getRecord->email }}" readonly class="form-control mb-3">
                        @if($errors->has('email'))
                        <div class="text-danger small">{{ $errors->first('email') }}</div>
                        @endif

                        <label for="address" class="small">Address</label>
                        <input type="text" id="address" name="address" value="{{ $getRecord->address }}" required class="form-control mb-3">

                        <label for="age" class="small">Age</label>
                        <input type="text" id="age" name="age" value="{{ $getRecord->age }}" required class="form-control mb-3">

                        <label for="start_date" class="small">Start Date</label>
                        <input type="date" id="start_date" name="start_date" value="{{ $getRecord->start_date }}" required class="form-control mb-3">
                      </div>

                      <!-- Middle Column: Profile Picture -->
                      <div class="text-start mt-1">
                        @if($getRecord->role_id !== 1 && $getRecord->role_id !== 2)
                        <label for="employment_pass" class="small">Employment Pass</label>
                        <input type="text" id="employment_pass" name="employment_pass" value="{{ $getRecord->employment_pass }}" required class="form-control mb-3">

                        <label for="passport_number" class="small">Passport Number</label>
                        <input type="text" id="passport_number" name="passport_number" value="{{ $getRecord->passport_number }}" required class="form-control mb-3">
                        @else
                        <input type="hidden" name="employment_pass" value="{{ $getRecord->employment_pass }}">
                        <input type="hidden" name="passport_number" value="{{ $getRecord->passport_number }}">
                        @endif

                        <label for="phone" class="small">Phone Number</label>
                        <input type="text" id="phone" name="phone" value="{{ $getRecord->phone }}" required class="form-control mb-3">

                        <label for="roleSelect" class="small">Role</label>
                        <select class="form-control form-control-sm mb-3" name="role_id" id="roleSelect" required>
                          <option value="">Select Role</option>
                          @foreach($getRole as $value)
                          <option value="{{ $value->id }}" {{ (old('role_id') == $value->id) ? 'selected' : '' }}>
                            {{ $value->name }}
                          </option>
                          @endforeach
                        </select>

                        <label for="job_position">Job Position</label>
                        <input type="text" id="job_position" name="job_position" value="{{ $getRecord->job_position }}" required class="form-control mb-3">
                        
                      </div>

                      <!-- Right Column:-->
                      <div class="flex-grow-1 bg-profile">
                        <label for="profile_photo" class="small">Profile Photo</label>
                        <div class="mb-2">
                          <img src="{{ $getRecord->profile_photo ? asset('public/storage/' . $getRecord->profile_photo) : asset('images/1.png') }}" 
                            alt="Profile Picture" 
                            class="img-account-profile rounded-circle" 
                            style="width: 220px; height: 220px; object-fit: cover; border-radius: 0;">
                        </div>
                        <div class="small font-italic text-muted mb-2 text-white">JPG or PNG no larger than 5 MB</div>
                        <input type="file" name="profile_photo" id="profile_photo" class="form-control form-control-sm" accept="image/*">
                        @if($errors->has('profile_photo'))
                        <div class="text-danger small">{{ $errors->first('profile_photo') }}</div>
                        @endif
                      </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                      <label for="password" class="small">Password</label>
                      <input type="text" id="password" name="password" class="form-control">
                      <small class="text-muted">(Leave blank if you don't want to change the password.)</small>
                    </div>

                    <!-- Submit Section -->
                    <div class="text-center mt-5">
                      <button type="submit" class="btn btn-dark fw-bold px-4">Submit</button>
                      <a href="{{ route('user.list') }}" class="btn btn-danger ms-2">Cancel</a>
                    </div>
                  </form>
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

    document.getElementById('age').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, ''); // Allow numbers only
        if (this.value.length > 2) this.value = this.value.slice(0, 2); // Limit to 2 digits
    });

    document.getElementById('phone').addEventListener('input', function (e) {
        let number = this.value.replace(/\D/g, ''); // Remove non-numeric characters
        if (number.length <= 3) {
            this.value = number;
        } else if (number.length <= 6) {
            this.value = `${number.slice(0, 3)}-${number.slice(3)}`;
        } else {
            this.value = `${number.slice(0, 3)}-${number.slice(3, 6)}-${number.slice(6, 10)}`;
        }
    });
</script>

@endsection
