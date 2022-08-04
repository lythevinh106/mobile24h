@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-success" role="alert">
        {{ session('error') }}
    </div>
@endif


{{-- @if (session('module_active'))
    <div class="alert alert-success" role="alert">
        {{ session('module_active') }}
    </div>
@endif --}}
