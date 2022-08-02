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
        <a class="dropdown-item" href="">
        <span class="clear--cart">CLEAR</span>
        </a>


    </div>
</li>
            </span>
