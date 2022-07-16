@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>TO DO</h1>
                        <div>
                            <a href="{{route('todos_index', ['sort' => 'asc'])}}">A to Z</a>
                            <a href="{{route('todos_index', ['sort' => 'desc'])}}">Z to A</a>
                            <a href="{{route('todos_index')}}">Reset</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($todos as $todo)
                                <li class="list-group-item">
                                    <div class="todo-bin">
                                        <div class="todo-box">
                                            <h2>{{$todo->title}}</h2>


                                            @if($todo->todo == 0)
                                                <h4>{{$todo->text}}</h4>
                                            @else
                                                <h4 style="text-decoration:line-through; background-color: mediumpurple">{{$todo->text}}</h4>
                                            @endif


                                        </div>
                                        <div class="controls">
                                            <form method="post" action="{{route('todo_todo', $todo)}}">
                                            <button type="submit" class="btn btn-outline-secondary m-2">TO DO</button>
                                                @if($todo->todo == 0)
                                                    <input type="hidden" name="todo" value="1">
                                                @else
                                                    <input type="hidden" name="todo" value="0">
                                                @endif
                                                @csrf
                                                @method('put')
                                            </form>
                                            <a class="btn btn-outline-primary m-2" href="{{route('todo_show', $todo->id)}}">Show</a>

                                            <a class="btn btn-outline-success m-2" href="{{route('todo_edit', $todo)}}">Edit</a>
                                            <form class="delete" action="{{route('todo_annihilate', $todo)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger m-2">Out from this Life</button>
                                            </form>

                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">No DO, ..coding.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
