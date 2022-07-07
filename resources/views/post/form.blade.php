@extends('main')

@section('content')

@if($ro !== '')
    <h1>REZULTATAS: {{$ro}}</h1>
@endif
<form action="{{route('skaiciuokle')}}" method="post" class="input-group mb-3" >
    X: <input type="text" name="x" class="form-control f"/>
    Y: <input type="text" name="y" class="form-control f"/>
@csrf
    <button type="submit" class="btn btn-primary" > skirtumas </button>
</form>
<ul>
    @foreach($colors as $color)
        @include('post.li')
    @endforeach

</ul>
@endsection
@section('title')
    color form
@endsection

