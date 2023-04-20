@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Add Product</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('products-update', $product)}}" method="post">

                        <div class="container">
                            <div class="row">
                                <div class="col-8">


                                    <div class="mb-3">
                                        <label class="form-label">Product Tile</label>
                                        <input type="text" class="form-control" name="title" value={{old('title', $product->title)}}>
                                        <div class="form-text">Please add product title here</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Product Price</label>
                                        <input type="text" class="form-control" name="price" value={{old('price', $product->price)}}>
                                        <div class="form-text">Please add product here</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Product Category</label>
                                    <select class="form-select --cat--select" name="cat_id" data-url="{{route('products-colors')}}" data-url-name="{{route('products-color-name')}}">
                                        <option value="0">Cats list</option>
                                        @foreach($cats as $cat)
                                        <option value="{{$cat->id}}" @if($product->cat_id == $cat->id) selected @endif>{{$cat->title}} ({{$cat->colors_count}})</option>
                                        @endforeach
                                    </select>
                                    <div class="form-text">Please select product category here</div>
                                </div>
                                <div class="col-12">
                                    <div class="colors-selectors --colors--selectors">

                                        @foreach($product->color as $color)
                                        <div class="one-color">
                                            <input type="color" name="color[]" value={{$color->hex}}>
                                            <input type="hidden" name="name[]" value={{$color->title}}>
                                            <div class="color-view" style="background-color:{{$color->hex}};">{{$color->title}}</div>
                                        </div>
                                        @endforeach


                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="mt-5 btn btn-outline-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
