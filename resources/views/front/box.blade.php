<div class="row justify-content-center mb-0">
    <div class="col-md-9">
        <div class="card-header">sort, filter & search box</div>
        <div class="card-body">
            <form class="form-control " action="{{route('front_index')}}" method="get">
                <div class="flex-lg-row">
                    <!-- -->
                    <label for="f" class="ms-4 col-form-label-sm">what sort?</label>
                    <select class="form-select-sm" name="sort" id="f">
                        <option value="default" @if($sort == 'default') selected @endif>Default Sort</option>
                        <option value="color-asc" @if($sort == 'color-asc') selected @endif> Color A-Z</option>
                        <option value="color-desc" @if($sort == 'color-desc') selected @endif> Color Z-A</option>
                        <option value="animal-asc" @if($sort == 'animal-asc') selected @endif> Animal A-Z</option>
                        <option value="animal-desc" @if($sort == 'animal-desc') selected @endif> Animal Z-A</option>
                    </select>
                        <!-- -->
                    <label for="color_id" class="ms-4 col-form-label-sm">what color ?</label>
                    <select class="form-select-sm " name="color_id" id="color_id">
                        <option value="0" @if($filter == 0) selected @endif>no filler, please</option>
                        @foreach($colors as $color)
                            <option value="{{$color->id}}" @if($filter == $color->id) selected @endif>{{$color->title}}</option>
                        @endforeach
                    </select>
                    <!-- -->
                    <button type="submit" class="btn btn-sm btn-outline-secondary m-2 ">sort</button>
                    <a class="btn btn-sm btn-outline-success " href="{{route('front_index')}}">Clear!</a>
                </div>
            </form>
            <form class="form-control" action="{{route('front_index')}}" method="get">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Do search</span>
                                <input class="form-control " type="text" name="s" value="{{$s}}"/>
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Search!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>





