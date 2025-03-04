@if(!empty(session('success')))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

@if(!empty(session('error')))
<div class="alert alert-danger" role="alert" style="color: white; background-color: rgba(255, 0, 0, 0.1);">
    {{ session('error') }}
</div>
@endif
