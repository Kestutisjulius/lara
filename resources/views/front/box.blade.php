

    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6>sort, filter & search box</h6>
                    </div>
                    <div class="card-body">
                        <form class="form-control" action="{{route('front_index')}}" method="get">
                            <div class="form-floating">
                                <label for="f">what sort?</label>
                                <select class="form-select-sm" name="sort" id="f">
                                    <option value="default">No Sort</option>
                                    <option value="color-asc"> Color A-Z</option>
                                    <option value="color-desc"> Color Z-A</option>
                                    <option value="animal-asc"> Animal A-Z</option>
                                    <option value="animal-desc"> Animal Z-A</option>
                                </select>
                            </div>
                            <button type="submit" class="btn-sm btn-outline-secondary" >sort</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



