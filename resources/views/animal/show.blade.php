@extends('layouts.app')
@section('content')
    <ul>

            <li>
                <div class="animal-box" style="background-color: {{$animal->color->color}}">
                    <a href="{{route('animal_edit', $animal)}}">edit</a>
                    <form class="destroyClass" method="post" action="{{route('animal_kill', $animal)}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit" >kill</button>

                    </form>
                    <h6>{{$animal->name}}</h6>
                </div>
            </li>


    </ul>

@endsection
