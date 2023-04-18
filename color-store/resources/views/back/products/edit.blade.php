@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Edit Category</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('cats-update', $cat)}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Category title</label>
                            <input type="text" class="form-control" name="title" value={{old('title', $cat->title)}}>
                            <div class="form-text">Please add category title here</div>
                        </div>
                        <div class="mb-3 cat-color-range">
                            <label class="form-label">Colors Count: <span class="--colors--counter">{{old('colors_count', $cat->colors_count)}}</span></label>
                            <input type="range" min="1" max="6" class="form-range --colors--counter" name="colors_count" value={{old('colors_count', $cat->colors_count)}}>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
