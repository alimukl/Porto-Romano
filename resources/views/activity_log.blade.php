@extends('panel.layout.app')
@section('content')
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Log Activity</title>
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <style>
    .table-custom-shadow {
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    }
    .table-responsive thead {
      white-space: nowrap;
    }
    pre {
      white-space: pre-wrap;
      word-wrap: break-word;
      font-size: 14px;
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
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Log Activity</li>
    </ol>
  </nav>
  <br>

  <h6 class="mb-0">User Login Activity Log</h6>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4 table-custom-shadow">
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Before Update</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">After Update</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Time</th>
                </tr>
              </thead>
              <tbody>
                @forelse($logs as $index => $log)
                  @php
                    $oldValues = $log->properties['old'] ?? [];
                    $newValues = $log->properties['attributes'] ?? [];
                  @endphp
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../public/images/admin.jpg" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $log->causer?->name ?? 'Unknown' }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span class="badge badge-sm bg-gradient-success">{{ $log->description }}</span>
                    </td>
                    <td>
                      <pre class="bg-light p-2 rounded">{{ json_encode($oldValues, JSON_PRETTY_PRINT) ?? 'No previous data' }}</pre>
                    </td>
                    <td>
                      <pre class="bg-light p-2 rounded">{{ json_encode($newValues, JSON_PRETTY_PRINT) ?? 'Deleted User' }}</pre>
                    </td>
                    <td>
                      <span class="text-muted">{{ $log->created_at->format('Y-m-d H:i:s') }}</span>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center text-muted">No login activity found</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
</body>
@endsection('content')
