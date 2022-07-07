@extends('main')
@section('content')
    <ul>
        <form class="mb-3" method="post" action="{{route('colors_store')}}">
        <input type="color" name="create_color_input"/>
            @csrf
            <button class="btn btn-primary" type="submit" >create</button>

        </form>
    </ul>
@endsection
