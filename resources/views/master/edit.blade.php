@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>skils of MASTER {{$master->master_name}} </h1>
                </div>
                <div class="card-body">
                    <div class="master-bin justify-content-start">
                        <div class="controls ">
                            <form action="{{route('update_master', $master)}}" method="post">
                                @foreach($skills as $key => $skill)
                                    <div class="form-control-sm form-check">
                                        <label for="_{{$key}}" class="form-check-label">{{$skill->skill}}</label>
                                        <input type="checkbox" {{$skill->has ? 'checked' : ''}} class="form-check-input" id="_{{$key}}" name="skill[]" value={{$skill->id}}>
                                    </div>
                                @endforeach
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-outline-primary m-2">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
