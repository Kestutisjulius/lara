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

                        <form class="row g-3" method="post" action="{{route('bank_store')}}">
                            @csrf
                            <div class="col-md-6">
                                <label for="inputClient" class="form-label">Client name</label>
                                <input type="text" class="form-control" id="inputClient" name="name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email">
                            </div>
                            <div class="col-12">
                                <label for="creditNum" class="form-label">Credit NUM</label>
                                <input type="text" class="form-control" id="creditNum" name="p_code">
                            </div>
                            <div class="col-12">
                                <label for="IBAN" class="form-label">IBAN:</label>
                                <input type="text" class="form-control" id="IBAN" name="a_code">
                            </div>
                            <div class="col-md-6">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="text" class="form-control" id="amount" name="amount">
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" >create</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
