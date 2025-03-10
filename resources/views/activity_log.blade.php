@extends('panel.layout.app')
@section('content')
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Soft UI Dashboard 3 by Creative Tim</title>
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

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

  <h2 class="text-center text-primary">User Login Activity Log</h2>

  <div class="table-responsive">
    <table class="table table-striped table-hover table-bordered align-middle text-center shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Action</th>
                <th>Before Update</th>
                <th>After Update</th>
                <th>Time</th>
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
                        <span class="badge bg-primary text-white">
                            {{ $log->causer?->name ?? 'Unknown' }}
                        </span>
                    </td>
                    <td>
                        <i class="fas fa-info-circle text-info"></i>
                        {{ $log->description }}
                    </td>
                    <td class="text-start text-wrap">
                        @if(!empty($oldValues))
                            <pre class="bg-light p-2 rounded">{{ json_encode($oldValues, JSON_PRETTY_PRINT) }}</pre>
                        @else
                            <span class="text-muted">No previous data</span>
                        @endif
                    </td>
                    <td class="text-start text-wrap">
                        @if(!empty($newValues))
                            <pre class="bg-light p-2 rounded">{{ json_encode($newValues, JSON_PRETTY_PRINT) }}</pre>
                        @else
                            <span class="text-muted">No new data</span>
                        @endif
                    </td>
                    <td>
                        <span class="text-muted">
                            {{ $log->created_at->format('Y-m-d H:i:s') }}
                        </span>
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
</main>
</body>
@endsection('content')
