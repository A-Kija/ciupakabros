@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Client</h1>
                </div>
                <div class="card-body">
                    <div class="client-line">
                        <div class="client-info">
                            {{$client->name}}
                            {{$client->surname}}
                            <span>{{$client->tt ? 'TIK TOK' : 'FB'}}</span>
                        </div>
                        <div class="buttons">
                            <a href="{{route('orders-create', ['id' => $client])}}" class="btn btn-info">new order</a>
                            <a href="{{route('clients-edit', $client)}}" class="btn btn-success">Edit</a>
                            <form action="{{route('clients-delete', $client)}}" method="post">
                                <button type="submit" class="btn btn-danger">delete</button>
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                    <h2>Orders</h2>
                    <ul class="list-group">
                        @forelse($client->order as $order)
                        <li class="list-group-item">
                            <div class="order-line">
                                <div class="order-info">
                                    {{$order->title}}
                                    {{$order->price}}
                                </div>
                                <div class="buttons">
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
                            <div class="client-line">No orders</div>
                        </li>
                        @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
