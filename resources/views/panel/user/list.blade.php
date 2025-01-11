@extends('panel.layout.app')

@section('content')

<body class="">
<div class="wrapper ">

@include('panel.layout.sidebar')

  
@include('panel.layout.header')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.0/css/dataTables.bootstrap5.css">

<div class="panel-header panel-header-sm"></div>

<div class="p-5">
  @include('_message')
  @if(!empty($PermissionAdd))
              <a class="btn btn-primary pull-right" href="{{ url('panel/user/add') }}">Add</a>
              @endif
  <!-- User Table -->
  <div class="card">
    <div class="card-header">
      <h4 class="card-title" style="font-weight: bold;">Manage User</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="userTable" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>Name</th>
              <th>Age</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Role</th>
              <th>Employment Pass</th>
              <th>Passport</th>
              <th>Address</th>
              <th>Date</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($getRecord as $value)
              @if($value->role_name == "User")
                <tr>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->age }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->phone }}</td>
                  <td>{{ $value->role_name }}</td>
                  <td>{{ $value->employment_pass }}</td>
                  <td>{{ $value->passport_number }}</td>
                  <td>{{ $value->address }}</td>
                  <td>{{ $value->created_at }}</td>
                  <td class="text-right">
                    <a href="{{ url('panel/user/edit/' . $value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ url('panel/user/delete/' . $value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Admin Table -->
  <div class="card mt-4">
    <div class="card-header">
      <h4 class="card-title" style="font-weight: bold;">Manage Admin</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="adminTable" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>Name</th>
              <th>Age</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Role</th>
              <th>Address</th>
              <th>Date</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($getRecord as $value)
              @if($value->role_name == "Admin")
                <tr>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->age }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->phone }}</td>
                  <td>{{ $value->role_name }}</td>
                  <td>{{ $value->address }}</td>
                  <td>{{ $value->created_at }}</td>
                  <td class="text-right">
                    <a href="{{ url('panel/user/edit/' . $value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ url('panel/user/delete/' . $value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Super Admin Table -->
  <div class="card mt-4">
    <div class="card-header">
      <h4 class="card-title" style="font-weight: bold;">Manage Super Admin</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="superAdminTable" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>Name</th>
              <th>Age</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Role</th>
              <th>Address</th>
              <th>Date</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($getRecord as $value)
              @if($value->role_name == "Super Admin")
                <tr>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->age }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->phone }}</td>
                  <td>{{ $value->role_name }}</td>
                  <td>{{ $value->address }}</td>
                  <td>{{ $value->created_at }}</td>
                  <td class="text-right">
                    <a href="{{ url('panel/user/edit/' . $value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ url('panel/user/delete/' . $value->id) }}" class="btn btn-danger btn-sm">Delete</a>
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

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.2.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.0/js/dataTables.bootstrap5.js"></script>

<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var userId = button.data('id'); // Extract the user ID from the data-id attribute
        var actionUrl = '/panel/user/delete/' + userId; // Construct the URL for the delete action

        var modal = $(this);
        modal.find('#deleteForm').attr('action', actionUrl); // Set the form's action URL dynamically
    });
</script>
<script>
  new DataTable('#userTable');
  new DataTable('#adminTable');
  new DataTable('#superAdminTable');
</script>

@endsection('content')