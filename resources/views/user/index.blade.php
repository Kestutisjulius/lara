@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Available USERS</h1>
                        <div>
                            <a href="{{route('users_index', ['sort' => 'asc'])}}">A to Z</a>
                            <a href="{{route('users_index', ['sort' => 'desc'])}}">Z to A</a>
                            <a href="{{route('users_index')}}">Reset</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($users as $user)
                                <li class="list-group-item">
                                    <div class="user-bin">
                                        <div class="user-box">
                                            <h2> {{$user->email}} </h2>
                                            <h2> {{$user->name}} </h2>
                                            <h4>{{$user->role}}</h4>
                                        </div>
                                        <div class="controls">
                                            <a class="btn btn-outline-success m-2" href="{{route('user_edit', $user)}}">Edit</a>
                                            <form class="delete" action="{{route('user_delete', $user)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger m-2">Destroy</button>
                                            </form>

                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">it's a miracle.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
