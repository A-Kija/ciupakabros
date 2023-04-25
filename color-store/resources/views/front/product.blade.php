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
                    <h2>{{$product->title}}</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <div class="one-product">
                            <div class="one-product-colors">
                                @foreach($product->color as $color)
                                <div class="color" style="background-color:{{$color->hex}};">{{$color->title}}</div>
                                @endforeach
                            </div>
                            <div class="product-info">
                                <div class="buy">
                                    <span>{{$product->price}} eur</span>
                                    <button type="submit" class="btn btn-primary mt-3">add to cart</button>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
