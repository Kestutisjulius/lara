@extends('main')
@section('content')
    <ul>
        <form class="mb-3" method="post" action="{{route('colors_update', $color)}}">
            <input type="color" name="create_color_input" value="{{$color->color}}"/>
            @csrf
            @method('put')
            <button class="btn btn-primary" type="submit" >edit</button>

        </form>
    </ul>
@endsection
