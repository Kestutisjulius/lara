@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Account</h1>
                    </div>
                    <div class="card-body">
                        <form class="bankCreate mb-3" method="post" action="{{route('bank_update', $bank)}}">
                            @csrf
                            @method('put')

                                <ul class="list-group list-group-horizontal-sm">
                                    <li class="list-group-item"><input name="name" type="text" value="{{$bank->name}}"></li>
                                    <li class="list-group-item"><input name="email" type="text" value="{{$bank->email}}"></li>
                                    <li class="list-group-item"><input name="p_code" type="text" value="{{$bank->person_code}}"></li>
                                </ul>
                            <ul class="list-group list-group-horizontal-sm">
                                <li class="list-group-item"><input name="a_code" type="text" value="{{$bank->bank_code}}"></li>
                                <li class="list-group-item"><input name="amount" type="text" value="{{$bank->amount}}"></li>
                                <button style="width: 100%" class="btn btn-primary" type="submit" >save</button>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


