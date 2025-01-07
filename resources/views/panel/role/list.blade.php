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
                @if(!empty($PermissionAdd))
              <a class="btn btn-primary pull-right" href="{{ url('panel/role/add') }}">Add</a>
              @endif
              <h4 class="card-title" style="font-weight: bold;"> Role List</h4>
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
                        Date
                      </th>
                      @if(!empty($PermissionEdit) || !empty($PermissionDelete))
                      <th style="font-weight: 500;" class="text-right">
                        Action
                      </th>
                      @endif
                    </thead>
                    <tbody>
                    @foreach($getRecord as $value)
                      <tr>
                        <td>
                        {{ $value->id }}
                        </td>
                        <td>
                        {{ $value->name }}
                        </td>
                        <td>
                        {{ $value->created_at }}
                        </td>
                        <td class="text-right">
                        @if(!empty($PermissionEdit))
                          <a href="{{ url('panel/role/edit/' .$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        @endif
                        @if(!empty($PermissionDelete))
                          <a href="{{ url('panel/role/delete/' .$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
</div>

@endsection('content')