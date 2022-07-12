@extends('main_bank')
@section('content')

    @if($msg !== '')
        <h1>{{$msg}}</h1>
    @endif


    <div class="bankContainer">
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
            <th scope="col">edit</th>
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
            <td><a href="{{route('account_edit', $account)}}">edit</a>|

                <form class="destroyAccount" method="post" action="{{route('account_delete', $account)}}">
                    @csrf
                    @method('delete')
                    <button class="btn-sm btn-danger btn" type="submit" >destroy</button>

                </form>

                &#32 | <a href="{{route('bank_transfer', $account)}}">transfer</a></td>
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
        <div class="linkBank"><a href="{{route('bank_create')}}">Add Account</a></div>
    </div>
    </div>

@endsection
