@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1>All accounts</h1>
                        <div>
                            <a href="{{route('bank_index', ['sort' => 'asc'])}}">A to Z</a>
                            <a href="{{route('bank_index', ['sort' => 'desc'])}}">Z to A</a>
                            <a href="{{route('bank_index')}}">Reset</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="bankContainer">
                            @if($msg !== '')
                                <h1 style="color: red; width: 100%; border: solid 2px red; border-radius: 15px; text-align: center">{{$msg}}</h1>
                            @endif
                            <div class="bankTop">accounts manager</div>
                            <div class="bankTable">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">personal CODE</th>
                                        <th scope="col">acc code</th>
                                        <th scope="col">amount</th>
                                        <th style="display: flex; justify-content: flex-end;" scope="col">edit | destroy | transfer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @forelse($accounts as $account)
                                            <th scope="row">{{$account->id}}</th>
                                            <td>{{$account->email}}</td>
                                            <td>{{$account->person_code}}</td>
                                            <td>{{$account->bank_code}}</td>
                                            <td>{{$account->amount}}</td>
                                            <td style="display: flex; justify-content: flex-end;"><a class="btn-sm btn-primary" href="{{route('account_edit', $account)}}">edit</a>
                                                @if(Auth::user()->role >= 12)
                                                <form class="destroyAccount" method="post" action="{{route('account_delete', $account)}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn-sm btn-danger btn" type="submit" >destroy</button>

                                                </form>
                                                @endif
                                                 <a class="btn-sm btn-success" href="{{route('bank_transfer', $account)}}">transfer</a></td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <th scope="row">no Data</th>
                                            <td>no Data</td>
                                            <td>no Data</td>
                                            <td>no Data</td>
                                            <td>no Data</td>
                                            <td>no Data</td>
                                            @endforelse
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

