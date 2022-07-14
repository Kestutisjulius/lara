@extends('layouts.app')
@section('content')
    <div style="margin-left: 35px; display: inline">
    <a href="{{route('colors_index', ['sort'=>'asc'])}}">A-Z</a>
    </div>
    <div style="margin-left: 35px; display: inline">
    <a href="{{route('colors_index', ['sort'=>'desc'])}}">Z-A</a>
    </div>
    <div style="margin-left: 35px; display: inline">
    <a href="{{route('colors_index', ['sort'=>'res'])}}">RESET</a>
    </div>
<ul>
    @forelse($colors as $color)
    <li>
        <div class="color-box" style="background-color: {{$color->color}}">
        <a style="background-color: blue" href="{{route('colors_edit', $color)}}">edit</a>
        <a style="background-color: #fff20a" href="{{route('colors_show', $color->id)}}">show</a>
            <form class="destroyClass" method="post" action="{{route('colors_delete', $color)}}">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm" type="submit" >destroy</button>

            </form>
        <h6>{{$color->title}}</h6>
        </div>
    </li>
    @empty
        <li>No Colors, no LIFE</li>
    @endforelse
</ul>

@endsection
