@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>EDIT todo</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('todo_update', $todo)}}" method="post">
                            <div class="form-group">
                                <label>TODO title</label>
                                <input class="form-control" type="text" name="todo_title" value="{{$todo->title}}"/>
                            </div>
                            <div class="form-group">
                                <label class="mt-2">text</label>
                                <input class="form-control" type="text" name="todo_text" value="{{$todo->text}}"/>
                            </div>

                                @if($todo->todo == 1)
                            <div class="form-check">
                                <input name="check_box" class="form-check-input" type="checkbox"  id="flexCheckDefault" checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    todo checkbox
                                </label>
                            </div>
                            @else
                            <div class="form-check">
                                <input name="check_box" class="form-check-input" type="checkbox"  id="flexCheckDefault" >
                                <label class="form-check-label" for="flexCheckDefault">
                                    todo checkbox
                                </label>
                            </div>
                            @endif
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success mt-4" type="submit">save this</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
