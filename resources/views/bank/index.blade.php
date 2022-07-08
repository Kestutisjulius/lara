@extends('main')
@section('content')
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
            <td>edit|delete|transfer</td>
            @empty
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

@endsection
