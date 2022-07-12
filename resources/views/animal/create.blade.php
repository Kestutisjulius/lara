@extends('main_animals')
@section('content')
    <ul>
        <form class="mb-3" method="post" action="{{route('animals_store')}}">
            <input type="text" name="name"/>
            <input type="text" name="color_title"/>
            @csrf
            <button class="btn btn-primary" type="submit" >create</button>

        </form>
    </ul>
@endsection
