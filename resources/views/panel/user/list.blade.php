@extends('panel.layout.app')

@section('content')

<body class="">
<div class="wrapper ">

@include('panel.layout.sidebar')

  
@include('panel.layout.header')

<div class="panel-header panel-header-sm">
</div>
      <div class="content">
      @include('_message')
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <a class="btn btn-primary pull-right" href="{{ url('panel/user/add') }}">Add</a>
              <h4 class="card-title" style="font-weight: bold;"> Manage User</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th style="font-weight: 500;">
                        Id
                      </th>
                      <th style="font-weight: 500;">
                        Name
                      </th>
                      <th style="font-weight: 500;">
                        Age
                      </th>
                      <th style="font-weight: 500;">
                        Email
                      </th>
                      <th style="font-weight: 500;">
                        Role
                      </th>
                      <th style="font-weight: 500;">
                        Employment Pass
                      </th>
                      <th style="font-weight: 500;">
                        Passport
                      </th>
                      <th style="font-weight: 500;">
                        Date
                      </th>
                      <th style="font-weight: 500;" class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                        @foreach($getRecord as $value)
                        @if($value->role_name == "User")
                        <tr>
                        <td>
                        {{ $value->id }}
                        </td>
                        <td>
                        {{ $value->name }}
                        </td>
                        <td>
                        {{ $value->age }}
                        </td>
                        <td>
                        {{ $value->email }}
                        </td>
                        <td>
                        {{ $value->role_name }}
                        </td>
                        <td>
                        {{ $value->employment_pass }}
                        </td>
                        <td>
                        {{ $value->passport_number }}
                        </td>
                        <td>
                        {{ $value->created_at }}
                        </td>
                        <td class="text-right">
                          <a href="{{ url('panel/user/edit/' .$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{ url('panel/user/delete/' .$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <a class="btn btn-primary pull-right" href="{{ url('panel/user/add') }}">Add</a>
              <h4 class="card-title" style="font-weight: bold;"> Manage Admin</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th style="font-weight: 500;">
                        Id
                      </th>
                      <th style="font-weight: 500;">
                        Name
                      </th>
                      <th style="font-weight: 500;">
                        Age
                      </th>
                      <th style="font-weight: 500;">
                        Email
                      </th>
                      <th style="font-weight: 500;">
                        Role
                      </th>
                      <th style="font-weight: 500;">
                        Date
                      </th>
                      <th style="font-weight: 500;" class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                        @foreach($getRecord as $value)
                        @if($value->role_name == "Admin")
                        <tr>
                        <td>
                        {{ $value->id }}
                        </td>
                        <td>
                        {{ $value->name }}
                        </td>
                        <td>
                        {{ $value->age }}
                        </td>
                        <td>
                        {{ $value->email }}
                        </td>
                        <td>
                        {{ $value->role_name }}
                        </td>
                        <td>
                        {{ $value->created_at }}
                        </td>
                        <td class="text-right">
                          <a href="{{ url('panel/user/edit/' .$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{ url('panel/user/delete/' .$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <a class="btn btn-primary pull-right" href="{{ url('panel/user/add') }}">Add</a>
              <h4 class="card-title" style="font-weight: bold;"> Manage Super Admin</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th style="font-weight: 500;">
                        Id
                      </th>
                      <th style="font-weight: 500;">
                        Name
                      </th>
                      <th style="font-weight: 500;">
                        Age
                      </th>
                      <th style="font-weight: 500;">
                        Email
                      </th>
                      <th style="font-weight: 500;">
                        Role
                      </th>
                      <th style="font-weight: 500;">
                        Date
                      </th>
                      <th style="font-weight: 500;" class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                        @foreach($getRecord as $value)
                        @if($value->role_name == "Super Admin")
                        <tr>
                        <td>
                        {{ $value->id }}
                        </td>
                        <td>
                        {{ $value->name }}
                        </td>
                        <td>
                        {{ $value->age }}
                        </td>
                        <td>
                        {{ $value->email }}
                        </td>
                        <td>
                        {{ $value->role_name }}
                        </td>
                        <td>
                        {{ $value->created_at }}
                        </td>
                        <td class="text-right">
                          <a href="{{ url('panel/user/edit/' .$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{ url('panel/user/delete/' .$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>

@endsection('content')