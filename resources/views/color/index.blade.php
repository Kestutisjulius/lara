@extends('main')
@section('content')
<ul>
    @forelse($colors as $color)
    <li><div class="color-box" style="background-color: {{$color->color}}">{{$color->color}}
        <a href="{{route('colors_edit', $color)}}">edit</a>
            <form class="destroyClass" method="post" action="{{route('colors_delete', $color)}}">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm" type="submit" >destroy</button>

            </form>
        </div>
    </li>
    @empty
        <li>No Colors, no LIFE</li>
    @endforelse
</ul>
    <a href="{{route('colors_create')}}">Add Color</a>
@endsection