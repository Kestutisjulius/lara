@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="todo-box">
                            <h2>{{$todo->title}}</h2>


                            @if($todo->todo == 0)
                                <h4>{{$todo->text}}</h4>
                            @else
                                <h4 style="text-decoration:line-through; background-color: mediumpurple">{{$todo->text}}</h4>
                            @endif


                        </div>
                    </div>
                    <div class="card-body">
                        <div class="color-bin">
                            <div class="controls">
                                <a class="btn btn-outline-success m-2" href="{{route('todo_edit', $todo)}}">Edit</a>
                                <form class="delete" action="{{route('todo_annihilate', $todo)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger m-2">Forget about this</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
