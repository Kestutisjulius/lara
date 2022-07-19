@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
                @include('front.box')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6>animals</h6>
                        <div>

                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($animals as $animal)
                                <li class="list-group-item">
                                    <div class="front-bin">
                                        <div class="front-box" style="background:{{$animal->color->color}};">
                                            <h6>{{$animal->color->title}}</h6>
                                            <h2>{{$animal->name}}</h2>
                                        </div>
                                        <div class="controls">
                                            <a class="btn btn-outline-secondary m-2 btn-sm" href="">put to bag</a>


                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">No animals, no life.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

