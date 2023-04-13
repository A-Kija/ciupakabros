@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Orders List</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($orders as $order)
                        <li class="list-group-item">
                            <div class="order-line @if(Session::has('light-up') && Session::get('light-up') ==  $order->id) active @endif">
                                <div class="order-info">
                                    <div class="order-data">
                                    {{$order->title}}
                                    {{$order->price}}
                                    </div>
                                    <a class="client" href="{{route('clients-show', $order->orderClient)}}">
                                        {{$order->orderClient->name}} {{$order->orderClient->surname}}
                                    </a>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('orders-show', $order)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('orders-edit', $order)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('orders-delete', $order)}}" method="post">
                                        <button type="submit" class="btn btn-danger">delete</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">
                            <div class="order-line">No orders</div>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
