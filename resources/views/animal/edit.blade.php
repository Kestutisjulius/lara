@extends('layouts.app')
@section('content')
    <h1>Animal EDIT</h1>
    <ul>
        <form action="{{route('animal_update', $animal)}}" method="post">
            <input type="text" name="animal_name" value="{{$animal->name}}" />
            <select name="color_id">
                @foreach($colors as $color)
                    <option value="{{$color->id}}" @if($color->id == $animal->color_id)selected @endif>{{$color->title}}</option>
                @endforeach
            </select>

            @csrf
            @method('put')
            <button type="submit">repaint Animal!</button>
        </form>
    </ul>
@endsection
