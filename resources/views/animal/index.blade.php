@extends('main_animals')
@section('content')

    <ul>
        @forelse($animals as $animal)
            <li>
                opa
            </li>
        @empty
            <li>No Animals, no LIFE</li>
        @endforelse
    </ul>

@endsection
