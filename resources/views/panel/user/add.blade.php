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
<body class="g-sidenav-show  bg-gray-100">
@include('panel.layout.sidebar')
<main class="main-content position-relative max-height-vh-150 h-150 border-radius-lg">
    @include('panel.layout.header')

    <div class="wrapper">
        <div class="panel-header panel-header-sm"></div>
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Add New User</h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                {{ csrf_field() }}

                                <!-- Name and Age (Left and Right) -->
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="small">Name</label>
                                            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-control form-control-sm" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="age" class="small">Age</label>
                                            <input type="text" name="age" id="age" value="{{ old('age') }}" required class="form-control form-control-sm" placeholder="Enter Age">
                                        </div>
                                    </div>
                                </div>

                                <!-- Email and Phone (Left and Right) -->
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="small">Email</label>
                                            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="form-control form-control-sm" placeholder="Enter Email">
                                            @if($errors->has('email'))
                                                <div class="text-danger small">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone" class="small">Phone Number</label>
                                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required class="form-control form-control-sm" placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                </div>

                                <!-- Employment Pass and Passport Number (Left and Right) -->
                                <div class="row mb-2" id="employmentPassField">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="employment_pass" class="small">Employment Pass</label>
                                            <input type="text" name="employment_pass" id="employment_pass" value="{{ old('employment_pass') }}" required class="form-control form-control-sm" placeholder="Enter Employment Pass">
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="passportNumberField">
                                        <div class="form-group">
                                            <label for="passport_number" class="small">Passport Number</label>
                                            <input type="text" name="passport_number" id="passport_number" value="{{ old('passport_number') }}" required class="form-control form-control-sm" placeholder="Enter Passport Number">
                                        </div>
                                    </div>
                                </div>

                                <!-- Address and Password (Left and Right) -->
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address" class="small">Address</label>
                                            <input type="text" name="address" id="address" value="{{ old('address') }}" required class="form-control form-control-sm" placeholder="Enter Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password" class="small">Password</label>
                                            <input type="password" name="password" id="password" required class="form-control form-control-sm" placeholder="Enter Password">
                                        </div>
                                    </div>
                                </div>

                                <!-- Role (Full Width) -->
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
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
                                </div>

                                <!-- Submit Button -->
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
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

</script>


@endsection('content')
