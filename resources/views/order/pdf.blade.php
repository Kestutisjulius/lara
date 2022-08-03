<html>
<head>
    <style>

        body {
            font-family: Courier;
        }
    </style>
</head>
<body>
<p>hello world</p>

<ul class="list-group">
    <h1>{{$order->user->name}}</h1>>
    @foreach($order->animals as $animal)
        <li class="list-group-item">
            <div class="front-bin">
                <div class="front-box justify-content-between" style="background: {{$animal->ecolor->color}};">
                    <h6>{{$animal->ecolor->title}}</h6>
                    <h6>
                        <strong>[ {{$animal->count}} ]</strong> units</h6>

                    <h2>{{$animal->name}}</h2>

                </div>
            </div>
            <!-- -->
            <div class="card mt-1" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="" class="img-fluid rounded-start" alt="animal PHOTO">
                        <p>PHOTO: {{$animal->photo}}</p>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card TITLE</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- -->
        </li>
    @endforeach
</ul>


</body>
</html>
