@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1>Create NEW account</h1>
                    </div>
                    <div class="card-body">

                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">

                                </div>

                            </div>
                        </form>















                        <form class="bankCreate mb-3" method="post" action="{{route('bank_store')}}">

                                    <input name="name" type="text" placeholder="name">
                                    <input name="email" type="text" placeholder="email">
                                    <input name="p_code" type="text" placeholder="personal code">
                                    <input name="a_code" type="text" placeholder="account number">
                                    <input name="amount" type="text" placeholder="amount">

                            @csrf
                            <button class="btn btn-primary" type="submit" >create</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
