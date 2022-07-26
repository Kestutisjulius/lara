@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Animal Edit</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('animal_update', $animal)}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Animal name</label>
                                <input class="form-control" type="text" name="animal_name" value="{{$animal->name}}" />
                            </div>
                            <div class="form-group">
                                <label>What color?</label>
                                <select class="form-control" name="color_id">
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}" @if($color->id == $animal->color_id)selected @endif>{{$color->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($animal->photo)
                                <div class="figure-img">
                                    <img src="{{$animal->photo}}">
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Portret of animal</label>
                                <input class="form-control-sm" type="file" name="animal_photo" />
                            </div>
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success mt-4" type="submit">Save</button>
                        </form>
                        @if($animal->photo)
                            <form action="{{route('delete_img', $animal)}}" method="post">
                                @csrf
                                @method('put')
                                <button class="btn btn-outline-danger mt-4" type="submit">Out picture</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
