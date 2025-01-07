@extends('panel.layout.app')

@section('content')

<body>
    <div class="wrapper">
        @include('panel.layout.sidebar')
        @include('panel.layout.header')

        <div class="panel-header panel-header-sm"></div>
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Add New User</h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                {{ csrf_field() }}
                                
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" value="{{ old('name') }}" required class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="text" name="age" value="{{ old('age') }}" required class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{ old('email') }}" required class="form-control">
                                            @if($errors->has('email'))
                                                <div style="color:red">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="employmentPassField">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Employment Pass</label>
                                            <input type="text" name="employment_pass" value="{{ old('employment_pass') }}" required class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="passportNumberField">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Passport Number</label>
                                            <input type="text" name="passport_number" value="{{ old('passport_number') }}" required class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" required class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control" name="role_id" id="roleSelect" required>
                                                <option value="">Select</option>
                                                @foreach($getRole as $value)
                                                    <option {{ (old('role_id') == $value->id) ? 'selected' : '' }} value="{{ $value->id }}">
                                                        {{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
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
        </div>
    </div>

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

            // Check if the selected role is Admin (ID 2) or Super Admin (ID 1)
            if (role == '1' || role == '2') {
                employmentPassField.style.display = 'none';
                passportNumberField.style.display = 'none';
            } else {
                employmentPassField.style.display = 'block';
                passportNumberField.style.display = 'block';
            }
        }
    </script>

@endsection
