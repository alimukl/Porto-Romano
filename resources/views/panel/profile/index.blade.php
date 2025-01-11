@extends('panel.layout.app')

@section('content')

<body class="">
<div class="wrapper">

@include('panel.layout.sidebar')

@include('panel.layout.header')

<div class="panel-header panel-header-sm">
</div>

<!-- Container with Bootstrap grid system -->
<div class="container-fluid px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row justify-content-center">
        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data" class="col-12 col-md-10 col-lg-8">
            @csrf
            @method('PUT')
            
            <!-- Profile Picture Section -->
            <div class="row mb-4">
                <div class="col-xl-4">
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">
                            <img class="img-account-profile rounded-circle mb-2"
                                 src="{{ Auth::user()->profile_photo ? asset('public/storage/' . Auth::user()->profile_photo) : asset('images/1.png') }}"
                                 alt="Profile Picture">
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <input type="file" class="form-control" name="profile_photo">
                        </div>
                    </div>
                </div>
                
                <!-- Account Details Section -->
                <div class="col-xl-8">
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <!-- Name -->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputname">Name</label>
                                <input class="form-control" id="inputname" type="text" placeholder="Enter your name" name="name" value="{{ Auth::user()->name }}" required>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <!-- Age -->
                                    <label class="small mb-1" for="inputage">Age</label>
                                    <input class="form-control" id="inputage" type="text" placeholder="Enter your age" name="age" value="{{ Auth::user()->age }}" required>
                                </div>
                                <div class="col-md-6">
                                    <!-- Email -->
                                    <label class="small mb-1" for="inputEmail">Email</label>
                                    <input class="form-control" id="inputEmail" type="email" placeholder="Enter your email" name="email" value="{{ Auth::user()->email }}" required>
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <!-- Employment Pass -->
                                    <label class="small mb-1" for="inputemployment_pass">Employment Pass</label>
                                    <input class="form-control" id="inputemployment_pass" type="text" placeholder="Enter your employment pass" name="employment_pass" value="{{ Auth::user()->employment_pass }}" required>
                                </div>
                                <div class="col-md-6">
                                    <!-- Passport -->
                                    <label class="small mb-1" for="inputpassport">Passport</label>
                                    <input class="form-control" id="inputpassport" type="text" placeholder="Enter your passport" name="passport_number" value="{{ Auth::user()->passport_number }}" required>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" name="phone" value="{{ Auth::user()->phone }}" required>
                                </div>
                            </div>

                            <!-- Save Changes Button -->
                            <button class="btn btn-primary" type="submit">Save changes</button>

                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
