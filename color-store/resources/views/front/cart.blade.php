@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            @include('front.cats')
        </div>
        <div class="col-9">
            <div class="card mt-5">
                <div class="card-header">
                    <h2>Cart</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($products as $product)
                        <div class="product-line">
                            <div class="product-colors">
                                @foreach($product->color as $color)
                                <div class="color" style="background-color:{{$color->hex}};">{{$color->title}}</div>
                                @endforeach
                            </div>
                            <div class="product-info">
                                <a href="{{route('front-show-product', $product)}}">
                                    <h2>{{$product->title}}</h2>
                                </a>
                                <div class="buy cart">
                                    <span>{{$product->price}} eur</span>
                                    <form action="{{route('cart-rem')}}" method="post">
                                        <input type="hidden" name="id" value={{$product->id}}>
                                        <button type="submit" class="btn btn-danger">remove</button>
                                        @method('put')
                                        @csrf
                                    </form>
                                    <form action="{{route('cart-rem')}}" method="post">
                                        <input type="hidden" name="id" value={{$product->id}}>
                                        <button type="submit" name="update" class="btn btn-info">update</button>
                                        <input type="number" value="{{$product->count}}" min="1" name="count">
                                        @method('put')
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <li class="list-group-item">
                            Cart is empty
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
