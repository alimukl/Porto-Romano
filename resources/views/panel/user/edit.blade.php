@extends('panel.layout.app')

@section('content')

<body class="">
<div class="wrapper ">
    
@include('panel.layout.sidebar')

  
@include('panel.layout.header')


<div class="panel-header panel-header-sm">
</div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit User</h5>
              </div>
              <div class="card-body">
                <form action="" method="post">
                {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $getRecord->name }}"required class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" value="{{ $getRecord->age }}"required class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="{{ $getRecord->email }}"readonly class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Employment Pass</label>
                        <input type="test" name="employment_pass" value="{{ $getRecord->employment_pass }}" required class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Passport Number</label>
                        <input type="text" name="passport_number" value="{{ $getRecord->passport_number }}" required class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label for="inputText" class="col-sm-12 col-form-label">Password</label>
                        <div class="col-sm-12">
                        <input type="text" name="password" class="form-control">
                        (do you want to change password please add. Otherwise leave it)
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role_id" required>
                            <option value="">Select</option>
                            @foreach($getRole as $value)
                            <option {{ ($getRecord->role_id == $value->id) ? 'selected' : '' }} value="{{ $value->
                                id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
</div>


@endsection('content')