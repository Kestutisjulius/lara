@extends('main')
@section('content')

        <form class="bankCreate mb-3" method="post" action="">
            <label for="name">name: </label>
            <input type="text" name="name"/>
            <label for="email">email: </label>
            <input type="text" name="email"/>
            <label for="p_code">person code: </label>
            <input type="text" name="p_code"/>
            <label for="b_code">account code: </label>
            <input type="text" name="b_code"/>
            <label for="amount">amount: </label>
            <input type="text" name="amount"/>
            @csrf
            <button class="btn btn-primary" type="submit" >create</button>

        </form>

@endsection
