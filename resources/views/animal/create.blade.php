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
                        <form action="{{route('animals_store')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="animal_name">Animal name</label>
                                <input class="form-control" type="text" name="animal_name" />
                                <label for="formFile" class="form-label mt-3">prtrait of animal</label>
                                <input class="form-control" type="file" id="formFile" name="animal_photo">
                            </div>
                            <select name="color_id">
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->title}}</option>
                                @endforeach
                            </select>
                            @csrf
                            @method('post')
                            <button class="btn btn-outline-success mt-4" type="submit">save this ANIMAL</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

