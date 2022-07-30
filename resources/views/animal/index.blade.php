@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>My animals</h1>
                        <div>
                            <a href="{{route('animals_index', ['sort' => 'asc'])}}">A to Z</a>
                            <a href="{{route('animals_index', ['sort' => 'desc'])}}">Z to A</a>
                            <a href="{{route('animals_index')}}">Reset</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($animals as $animal)
                                <li class="list-group-item">
                                            <div class="animal-box" style="background:{{$animal->ecolor->color}};">
                                                <h2>{{$animal->name}}</h2>
                                            </div>




                                    <div class="animal-bin ">
                                        <div class="lr">

                                            <div class="figure-img">
                                                <img src="{{$animal->photo}}">
                                            </div>

                                        </div>
                                            <div class="form-control-sm trijule ">
                                                <a class="btn btn-outline-primary m-2 i-btn" href="{{route('animal_show', $animal->id)}}">Show</a>

                                                <a class="btn btn-outline-success m-2 i-btn" href="{{route('animal_edit', $animal)}}">Edit</a>
                                                <form class="delete" action="{{route('animal_kill', $animal)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger m-2 i-btn">Kill</button>
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

