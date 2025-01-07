@extends('panel.layout.app')

@section('content')

<body class="">
<div class="wrapper">

@include('panel.layout.sidebar')

@include('panel.layout.header')

<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" style="font-weight: bold;">Role: {{ $role->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th style="font-weight: 500;">Permission Name</th>
                                    <th style="font-weight: 500;">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->description }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">No permissions assigned to this role.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <a href="{{ url('panel/role') }}" class="btn btn-secondary mt-3">Back to Roles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
