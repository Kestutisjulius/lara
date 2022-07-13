@extends('main_animals')
@section('content')
    <div style="margin-left: 35px; display: inline">
    <a href="{{route('animals_index', ['sort'=>'asc'])}}">A-Z</a>
    </div>
    <div style="margin-left: 35px; display: inline">
    <a href="{{route('animals_index', ['sort'=>'desc'])}}">Z-A</a>
    </div>
    <div style="margin-left: 35px; display: inline">
    <a href="{{route('animals_index', ['sort'=>'res'])}}">RESET</a>
    </div>
<ul>
    @forelse($animals as $animal)
    <li>
        <div class="animal-box" style="background-color: {{$animal->color->color}}">
        <a style="background-color: blue" href="{{route('animal_edit', $animal)}}">edit</a>
        <a style="background-color: #fff20a" href="{{route('animal_show', $animal->id)}}">show</a>
            <form class="destroyClass" method="post" action="{{route('animal_kill', $animal)}}">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm" type="submit" >destroy</button>

            </form>
        <h6>{{$animal->name}}</h6>
        </div>
    </li>
    @empty
        <li>No Animals, no LIFE</li>
    @endforelse
</ul>

@endsection
