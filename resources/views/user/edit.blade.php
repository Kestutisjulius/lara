@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit USER role</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('user_update', $user)}}" method="post">
                            <div class="form-group">
                                <label>editable USER's name</label>
                                <input readonly class="form-control" type="text" name="name" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label class="mt-2">ROLE</label>
                                <input class="form-control" type="text" name="role" value="{{$user->role}}" />
                            </div>
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success mt-4" type="submit">save Role to USER</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

