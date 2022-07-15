@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1>transfer money</h1>
                    </div>
                    <div class="card-body">
                        <form class="bankCreate mb-3" method="post" action="{{route('transfer_do', $bank)}}">
                            @csrf
                            @method('put')
                            <ul class="list-group list-group-horizontal-sm">
                                <li class="list-group-item">from: {{$bank->bank_code}}></li>
                                <li class="list-group-item"><input name="toAccount" type="text" placeholder="accountNumber to transfer"></li>
                                <li class="list-group-item"><input name="suma" type="text" placeholder="sum"></li>
                            <button class="btn btn-primary" type="submit" >transfer</button>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
