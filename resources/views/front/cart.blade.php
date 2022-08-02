<span>{{$count}}

<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false" v-pre>
    </a>
    <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="navbarDropdown">
        <span class="dropdown-item" >
        @forelse($cart as $value)
                <div class="dropdown-item line small--cart">
                {{$value->name}} | {{$value->count}} unit
                <a style="background-color: {{$value->ecolor->title}}" class="color-small-box delete--item" data-item-id="{{$value->id}}">X</a>

                </div>
            @empty
            Your cart empty ?
            @endforelse
        </span>
        <span class="dropdown-item">
            <form action="{{route('front_add')}}" method="post" class="form-control">
                @csrf
        <button class="btn btn-dark btn-sm buy--cart" type="submit">BUY</button>
            </form>
        </span>



    </div>
</li>
            </span>
