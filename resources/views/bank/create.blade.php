@extends('main')
@section('content')

        <h1 class="bankH1"> create new record to new client</h1>
        <form class="bankCreate mb-3" method="post" action="{{route('bank_store')}}">
            <table>
                <tr>
                    <td><input name="name" type="text" placeholder="name"></td>
                    <td><input name="email" type="text" placeholder="email"></td>
                    <td><input name="p_code" type="text" placeholder="personal code"></td>
                    <td><input name="a_code" type="text" placeholder="account number"></td>
                    <td><input name="amount" type="text" placeholder="amount"></td>
                </tr>
            </table>
            @csrf
            <button class="btn btn-primary" type="submit" >create</button>

        </form>

@endsection
