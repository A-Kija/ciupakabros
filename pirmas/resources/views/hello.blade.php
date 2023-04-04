@extends('sum.index')

@section('title', 'HELLO')

@section('main')

@include('nav')

<h1 style="color:{{$color}};">LABAS, {{$animal}}</h1>

@endsection