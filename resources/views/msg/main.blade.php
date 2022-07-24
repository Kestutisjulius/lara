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
@if($errors->any())
    <div class="alert ">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item list-group-item-danger ">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
