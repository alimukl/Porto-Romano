    @extends('panel.layout.app')

    @section('content')

<body class="">
  <div class="wrapper ">
    
  @include('panel.layout.sidebar')
    
      
    @include('panel.layout.header')
    <div class="panel-header panel-header-lg">
  <div class="panel-header panel-header-lg" style="display: flex; justify-content: center; align-items: center; height: 100%; color: white;">
  <h1>Dashboard</h1>
  </div>
  </div>


      @include('panel.layout.footer')
    </div>
  </div>

  @endsection('content')