@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>My colors</h1>
                        <div>
                            <a href="{{route('colors_index', ['sort' => 'asc'])}}">A to Z</a>
                            <a href="{{route('colors_index', ['sort' => 'desc'])}}">Z to A</a>
                            <a href="{{route('colors_index')}}">Reset</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($colors as $color)
                                <li class="list-group-item">
                                    <div class="color-bin">
                                        <div class="color-box" style="background:{{$color->color}};">
                                            <h2>{{$color->title}}</h2>
                                        </div>
                                        <div class="controls">
                                            <a class="btn btn-outline-primary m-2" href="{{route('colors_show', $color->id)}}">Show</a>

                                                <a class="btn btn-outline-success m-2" href="{{route('colors_edit', $color)}}">Edit</a>
                                                <form class="delete" action="{{route('colors_delete', $color)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger m-2">Destroy</button>
                                                </form>

                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">No colors, no life.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
