@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Animal create</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{route('animals_store')}}" method="post">
                            <div class="form-group">
                                <label>Animal name</label>
                                <input class="form-control" type="text" name="animal_name" />
                            </div>
                            <select name="color_id">
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->title}}</option>
                                @endforeach
                            </select>
                            @csrf
                            @method('post')
                            <button class="btn btn-outline-success mt-4" type="submit">save this color</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

