@extends('sum.index')

@section('title', 'SUMATORIUS')

@section('main')

@if($rez > 100)

<h1 style="color:crimson;">

@else

<h1 style="color:skyblue;">

@endif


SUMA: {{$rez}}
</h1>

@endsection