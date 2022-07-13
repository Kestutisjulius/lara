@extends('main_animals')
@section('content')

    <ul>
        @forelse($animals as $animal)
            <li style="background-color: {{$animal->id}}">
                {{$animal->name}}
            </li>
        @empty
            <li>No Animals, no LIFE</li>
        @endforelse
    </ul>

@endsection
