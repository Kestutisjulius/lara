@extends('main')
@section('content')
<ul>
    @forelse($colors as $color)
    <li><div class="color-box" style="background-color: {{$color->color}}">{{$color->color}}
        <a href="{{route('colors_edit', $color)}}">edit</a>
        </div></li>
    @empty
        <li>No Colors, no LIFE</li>
    @endforelse
</ul>
@endsection
