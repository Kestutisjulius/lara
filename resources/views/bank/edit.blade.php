@extends('main_bank')
@section('content')

    <h1 class="bankH1"> EDIT record </h1>
    <form class="bankCreate mb-3" method="post" action="{{route('bank_update', $bank)}}">
        <table>
            <tr>
                <td><input name="name" type="text" value="{{$bank->name}}"></td>
                <td><input name="email" type="text" value="{{$bank->email}}"></td>
                <td><input name="p_code" type="text" value="{{$bank->person_code}}"></td>
                <td><input name="a_code" type="text" value="{{$bank->bank_code}}"></td>
                <td><input name="amount" type="text" value="{{$bank->amount}}"></td>
            </tr>
        </table>
        @csrf
        @method('put')
        <button class="btn btn-primary" type="submit" >save</button>

    </form>

@endsection
