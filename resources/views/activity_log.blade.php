@extends('panel.layout.app')
@section('content')
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Log Activity</title>
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/soft-ui-dashboard.css" />
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
    font-size: 13px; /* Reduce font size slightly */
    line-height: 0.8; /* Reduce spacing between lines */
    max-height: 100px; /* Set a max height to avoid excessive space */
    overflow-y: auto; /* Enable scrolling for long content */
    background: #f8f9fa; /* Light gray background for better contrast */
    padding: 8px; /* Add some padding for better readability */
    border-radius: 5px; /* Slightly rounded corners */
    border: 2px solid #ddd; /* Add a border for separation */
  }

  .custom-gradient {
    background: linear-gradient(45deg,rgb(176, 75, 75),rgb(115, 38, 38));
    color: #fff;
    border-radius: 8px;
    padding: 5px 10px;
    font-weight: bold;
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
        <li class="breadcrumb-item text-sm"><a class="opacity-5" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm active" aria-current="page">Activity Log</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Activity Log</h6>
    </nav>
    <br>

    <div class="row">
      <div class="col-12">
        <div class="card mb-4 table-custom-shadow bg-dark-table">
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User</th>
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
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          <img src="{{ $log->causer?->profile_photo ? asset('public/storage/' . $log->causer->profile_photo) : asset('public/images/1.png') }}" 
                          class="avatar avatar-sm me-3" 
                          style="object-fit: cover;" 
                          alt="user">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ ucwords(strtolower($log->causer?->name ?? 'Unknown')) }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="badge badge-sm custom-gradient">{{ $log->description }}</span>
                      </td>
                      <td>
                        <pre class="bg-light p-4 rounded">
                          @if (!empty($oldValues))
                            @foreach ($oldValues as $key => $value)
                              <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}<br>
                            @endforeach
                          @else
                            No action
                          @endif
                        </pre>
                      </td>
                      <td>
                        <pre class="bg-light p-4 rounded">
                          @if (!empty($newValues))
                            @foreach ($newValues as $key => $value)
                              <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}<br>
                            @endforeach
                          @else
                          No action
                          @endif
                        </pre>
                      </td>
                      <td>
                        <span class="text-muted text-secondary text-xs font-weight-bold">{{ $log->created_at->format('Y-m-d H:i:s') }}</span>
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
@endsection
