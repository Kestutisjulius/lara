@if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
@endif
@if(session('deleted'))
    <div class="alert alert-danger">
        {{ session('deleted') }}
    </div>
@endif
@if(session('info'))
    <div class="alert alert-secondary">
        {{ session('info') }}
    </div>
@endif
