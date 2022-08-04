@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Masters</h1>

                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($masters as $master)
                                <li class="list-group-item">
                                    <div class="master-bin">
                                        <div class="master-box">
                                            <h4>{{$master->master_name}}</h4>
                                        </div>

                                        <div>
                                            @forelse($master->skills as $skill)
                                                <i style="color:red;">{{$skill->skill}} |:|</i>
                                            @empty
                                                <i style="color:lightslategrey;">Looser, no one of skills</i>
                                            @endforelse

                                        </div>

                                        <div class="controls">
                                            <a class="btn btn-outline-success m-2" href="{{route('edit_master', $master)}}">Edit</a>
                                            <form class="delete" action="{{route('remove_master', $master)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger m-2">get OUT</button>
                                            </form>

                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">No MASTERS, no life.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
