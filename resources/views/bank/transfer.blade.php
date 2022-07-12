@extends('main_bank')
@section('content')

    <h1 class="bankH1"> transfer money </h1>
    <form class="bankCreate mb-3" method="post" action="{{route('transfer_do', $bank)}}">
        <table>
            <tr>
                <td>from: {{$bank->bank_code}}></td>
                <td><input name="toAccount" type="text" placeholder="accountNumber to transfer"></td>
                <td><input name="suma" type="text" placeholder="sum"></td>
            </tr>
        </table>
        @csrf
        @method('put')
        <button class="btn btn-primary" type="submit" >transfer</button>

    </form>

@endsection

