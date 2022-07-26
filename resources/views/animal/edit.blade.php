@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit my "{{$animal->ecolor->title}} {{$animal->name}}" animal</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('animal_update', $animal)}}" method="post" class="form-control-sm">
                            <div class="card-body">
                                <label>Animal name</label>
                                <input class="col-3" type="text" name="animal_name" value="{{$animal->name}}"/>

                    <div class="figure-img mt-2">
                        <img src="{{$animal->photo}}">
                    </div>
                                <div class="col-3">
                                    <label>What color?</label>
                                    <select class="form-control" name="color_id">
                                        @foreach($colors as $color)
                                            <option value="{{$color->id}}"
                                                    @if($color->id == $animal->color_id)selected @endif>{{$color->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                @csrf
                                @method('put')
                                <button class="btn btn-outline-success ms-3" type="submit">change
                                    my {{$animal->name}}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

