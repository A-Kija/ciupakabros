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
                    <h2>Products</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($products as $product)
                        <div class="product-line">
                            @include('front.tags')
                            <div class="product-colors">
                                @foreach($product->color as $color)
                                <div class="color" style="background-color:{{$color->hex}};">{{$color->title}}</div>
                                @endforeach
                            </div>
                            <div class="product-info">
                                <a href="{{route('front-show-product', $product)}}">
                                    <h2>{{$product->title}}</h2>
                                </a>
                                @include('front.stars')
                                <div class="buy">
                                    <span>{{$product->price}} eur</span>
                                    <section class="--add--to--cart" data-url="{{route('cart-add')}}">
                                        <button type="button" class="btn btn-primary">add to cart</button>
                                        <input type="hidden" name="id" value={{$product->id}}>
                                        <input type="number" value="1" min="1" name="count">
                                    </section>
                                </div>
                            </div>
                        </div>
                        @empty
                        <li class="list-group-item">
                            No products
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
