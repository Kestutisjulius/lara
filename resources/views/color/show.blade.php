@extends('layouts.app')
@section('content')
    <ul>

            <li>
                <div class="color-box" style="background-color: {{$color->color}}">{{$color->color}}
                    <a href="{{route('colors_edit', $color)}}">edit</a>
                    <form class="destroyClass" method="post" action="{{route('colors_delete', $color)}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit" >destroy</button>

                    </form>
                    <h6>{{$color->title}}</h6>
                </div>
            </li>


    </ul>

@endsection
