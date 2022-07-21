



                <div class="card mb-4">
                    <div class="card-header">
                        <h6>sort, filter & search box</h6>
                    </div>
                    <div class="card-body">
                        <form class="form-control" action="{{route('front_index')}}" method="get">
                            <div class="">
                                <label for="f">what sort?</label>
                                <select class="form-select-sm" name="sort" id="f">
                                    <option value="default" @if($sort == 'default') selected @endif>Default Sort</option>
                                    <option value="color-asc"@if($sort == 'color-asc') selected @endif> Color A-Z</option>
                                    <option value="color-desc"@if($sort == 'color-desc') selected @endif> Color Z-A</option>
                                    <option value="animal-asc"@if($sort == 'animal-asc') selected @endif> Animal A-Z</option>
                                    <option value="animal-desc"@if($sort == 'animal-desc') selected @endif> Animal Z-A</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <button type="submit" class="btn btn-sm btn-outline-secondary m-2 mt-4" >sort</button>
                                <a class="btn btn-sm btn-outline-success m-2 mt-4" href="{{route('front_index')}}">Clear!</a>
                            </div>
                        </form>
                    </div>
                </div>





