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
    .table-custom-shadow {
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1); /* You can adjust the values to control the shadow's size and intensity */
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
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add New User</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Add New User</h6>
            </nav>
            <br>

            <!-- Error Alert -->
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-10">
                    <div class="card mb-3 table-custom-shadow p-6">
                        <h2 class="mb-4">Add New User</h2>
                        <form action="{{ route('user.insert') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <!-- Profile Picture Field -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="profile_photo" class="small">Profile Photo</label>
                                    <input type="file" name="profile_photo" id="profile_photo" class="form-control form-control-sm" accept="image/*">
                                    @if($errors->has('profile_photo'))
                                        <div class="text-danger small">{{ $errors->first('profile_photo') }}</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Name & Age Row -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="small">Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-control form-control-sm" placeholder="Enter Your Full Name">
                                </div>
                                <div class="col-md-2">
                                    <label for="age" class="small">Age</label>
                                    <input type="number" name="age" id="age" value="{{ old('age') }}" required class="form-control form-control-sm" placeholder="Age" min="10" max="99">
                                </div>
                            </div>

                            <!-- Email & Phone Row -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="small">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required class="form-control form-control-sm" placeholder="Enter Email">
                                    @if($errors->has('email'))
                                        <div class="text-danger small">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label for="phone" class="small">Phone Number</label>
                                    <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required class="form-control form-control-sm" placeholder="010-123-4567" maxlength="12">
                                </div>
                            </div>

                            <!-- Employment Pass & Passport Number Row -->
                            <div class="row mb-3">
                                <div id="employmentPassField" class="col-md-6">
                                    <label for="employment_pass" class="small">Employment Pass</label>
                                    <input type="text" name="employment_pass" id="employment_pass" value="{{ old('employment_pass') }}" required class="form-control form-control-sm" placeholder="Enter Employment Pass">
                                </div>
                                <div id="passportNumberField" class="col-md-6">
                                    <label for="passport_number" class="small">Passport Number</label>
                                    <input type="text" name="passport_number" id="passport_number" value="{{ old('passport_number') }}" required class="form-control form-control-sm" placeholder="Enter Passport Number">
                                </div>
                            </div>

                            <!-- Address Row -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="address" class="small">Address</label>
                                    <input type="text" name="address" id="address" value="{{ old('address') }}" required class="form-control form-control-sm" placeholder="Enter Address">
                                </div>
                            </div>

                            <!-- Password & Role Row -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password" class="small">Password</label>
                                    <input type="password" name="password" id="password" required class="form-control form-control-sm" placeholder="Enter Password">
                                </div>
                                <div class="col-md-3">
                                    <label for="roleSelect" class="small">Role</label>
                                    <select class="form-control form-control-sm" name="role_id" id="roleSelect" required>
                                        <option value="">Select Role</option>
                                        @foreach($getRole as $value)
                                            <option value="{{ $value->id }}" {{ (old('role_id') == $value->id) ? 'selected' : '' }}>
                                                {{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-5">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark fw-bold px-4">Submit</button>
                                    <a href="{{ route('user.list') }}" class="btn btn-danger ms-2">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>


<script>
    // When the page loads, toggle fields based on selected role
    window.onload = function() {
        toggleFieldsBasedOnRole();
    };

    // Listen for change on role selection
    document.getElementById('roleSelect').addEventListener('change', function() {
        toggleFieldsBasedOnRole();
    });

    function toggleFieldsBasedOnRole() {
    var role = document.getElementById('roleSelect').value;
    console.log("Selected Role ID: ", role);  // Debugging line

    // Get the form fields
    var employmentPassField = document.getElementById('employmentPassField');
    var passportNumberField = document.getElementById('passportNumberField');
    var employmentPassInput = employmentPassField.querySelector('input');
    var passportNumberInput = passportNumberField.querySelector('input');

    // Check if the selected role is Admin (ID 2) or Super Admin (ID 1)
    if (role == '1' || role == '2') {
        employmentPassField.style.display = 'none';
        passportNumberField.style.display = 'none';
        // Remove required attribute for hidden fields
        employmentPassInput.removeAttribute('required');
        passportNumberInput.removeAttribute('required');
    } else {
        employmentPassField.style.display = 'block';
        passportNumberField.style.display = 'block';
        // Add required attribute back for visible fields
        employmentPassInput.setAttribute('required', 'required');
        passportNumberInput.setAttribute('required', 'required');
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


@endsection('content')
