<span>{{$count}}

<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false" v-pre>
CART
    </a>
    <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="">
        @forelse($cart as $value)
                <a style="background-color: {{$value->ecolor->title}}" class="dropdown-item" href="">
                {{$value->id}} : {{$value->name}} | {{$value->count}}
                </a>
            @empty
            Your cart empty ?
            @endforelse
        </a>
        <a class="dropdown-item" href="">
        <span class="clear--cart">CLEAR</span>
        </a>


    </div>
</li>
            </span>
