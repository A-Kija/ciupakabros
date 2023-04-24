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
                            <div class="product-colors">
                                @foreach($product->color as $color)
                                    <div class="color" style="background-color:{{$color->hex}};">{{$color->title}}</div>
                                @endforeach
                            </div>
                            <div class="product-info">
                                <h2>{{$product->title}}</h2>
                                <div class="buy">
                                    <span>{{$product->price}} eur</span>
                                    <button type="submit" class="btn btn-primary">add to cart</button>
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
