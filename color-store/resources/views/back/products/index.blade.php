@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Products List</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($products as $product)
                        <li class="list-group-item">
                            <div class="products-list">
                                <div class="product">
                                    <div class="title-price">
                                        <div>
                                            <h2>{{$product->title}}<span>{{$product->price}} EUR</span></h2>
                                            
                                        </div>
                                        @if(Auth::user()->role < 5)
                                        <div class="buttons">
                                            <a href="{{route('products-edit', $product)}}" class="btn btn-outline-success">Edit</a>
                                            <form action="{{route('products-delete', $product)}}" method="post">
                                                <button type="submit" class="btn btn-outline-danger">delete</button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="colors">
                                        @foreach($product->color as $color)
                                        <div class="color" style="background-color:{{$color->hex}};">
                                            {{$color->title}}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">
                            <div class="cat-line">No products</div>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
