@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Add todo</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('todo_store')}}" method="post">
                            <div class="form-group">
                                <label>TODO title</label>
                                <input class="form-control" type="text" name="todo_title" />
                            </div>
                            <div class="form-group">
                                <label class="mt-2">text</label>
                                <input class="form-control" type="text" name="todo_text" />
                            </div>
                            @csrf
                            @method('post')
                            <button class="btn btn-outline-success mt-4" type="submit">add this TODO</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
