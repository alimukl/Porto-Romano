@extends('panel.layout.app')

@section('content')

<body class="">
<div class="wrapper ">
    
@include('panel.layout.sidebar')

  
@include('panel.layout.header')

@include('_message')

<div class="panel-header panel-header-sm">
</div>
      <div class="content">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Role</h5>
              </div>
              <div class="card-body">
                <form action="" method="post">
                {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Role Name</label>
                        <input type="text" name="name" value="{{ $getRecord->name }}" required class="form-control">
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
                                @php
                                    $checked = '';
                                @endphp
                                
                              @foreach($getRolePermission as $role)
                                @if($role->permission_id == $group['id'])
                                @php
                                    $checked = 'checked';
                                @endphp
                              @endif
                              @endforeach
                              <div class="d-flex align-items-center mr-3 mb-2">
                                <label><input type="checkbox" {{ $checked }} value="{{ $group['id'] }}"  name="Permission_id[]">  {{ $group['name'] }}</label>
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