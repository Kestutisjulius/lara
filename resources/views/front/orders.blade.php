@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center ">

            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header">
                        <h6>My Orders</h6>
                    </div>

                    <div class="card-body p-0">
                        <ul class="list-group">
                            @forelse($orders as $order)
                                <li class="list-group-item">
                                    <div class="front-bin">
                                        <div class="front-box justify-content-between" style="background:{{$order->animal->ecolor->color}};">
                                            <h6>{{$order->animal->ecolor->title}}</h6>
                                            <h6>{{$order->time}} | <strong>{{$order->user->name}}</strong> have: {{$order->count}} units</h6>

                                            <h2>{{$order->animal->name}}</h2>

                                        </div>
                                    </div>
                                    <!-- -->
                                    <div class="card mt-1" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{$order->animal->photo}}" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- -->
                                </li>
                            @empty
                                <li class="list-group-item">No Order! Why?</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

