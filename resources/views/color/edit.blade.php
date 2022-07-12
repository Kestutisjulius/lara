@extends('main')
@section('content')
    <ul>
        <form class="mb-3" method="post" action="{{route('colors_update', $color)}}">
            <input type="color" name="create_color_input" value="{{$color->color}}"/>
            <input type="text" name="color_title" value="{{$color->title}}"/>
            @csrf
            @method('put')
            <button class="btn btn-primary" type="submit" >save</button>

        </form>
    </ul>
@endsection
