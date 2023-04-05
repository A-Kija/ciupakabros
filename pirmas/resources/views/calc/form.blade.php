@extends('sum.index')

@section('title', 'CALCULATOR')


@section('main')

    <form action="{{route('do-calc')}}" method="post">

    <h1>
        <input type="text" name="x" value="{{old('x')}}"> + 
        <input type="text" name="y" value="{{old('y')}}"> = 
        <input type="text" value="{{$rez }}">
    </h1>

    <button type="submit">CALC</button>
    <button type="button">CLEAR</button>

    @csrf

    </form>

    <script>
    document.querySelector('[type=button]').
    addEventListener('click', _ => {
        document.querySelectorAll('[type=text]')
        .forEach(i => i.value = '')
    });
    </script>


@endsection