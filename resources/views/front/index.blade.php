@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center ">
                @include('front.box')
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header">
                        <h6>animals</h6>
                    </div>
                    @include('front.page')
                    <div class="card-body p-0">
                        <ul class="list-group">
                            @forelse($animals as $animal)
                                <li class="list-group-item">
                                    <div class="front-bin">
                                        <div class="front-box justify-content-between" style="background:{{$animal->color}};">
                                            <h6>{{$animal->title}}</h6>
                                            <h2>{{$animal->name}}</h2>

                                        <form class="controls" action="{{route('front_add')}}" method="post">
                                            @csrf
                                            @method('post')
                                            <input class="form-control-sm count_size" type="number" name="animal_count">
                                            <button class="btn btn-primary m-2 btn-sm">put to bag</button>
                                            <input type="hidden" value="{{$animal->id}}" name="animal_id">

                                        </form>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">No animals, no life.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                @include('front.page')
            </div>
        </div>
    </div>

@endsection

