@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Add Category</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('cats-store')}}" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Category title</label>
                            <input type="text" class="form-control" name="title" value={{old('title')}}>
                            <div class="form-text">Please add category title here</div>
                        </div>
                        <div class="mb-3 cat-color-range">
                            <label class="form-label">Colors Count: <span class="--colors--counter">{{old('colors_count', 1)}}</span></label>
                            <input type="range" min="1" max="6" class="form-range --colors--counter" name="colors_count" value={{old('colors_count', 1)}}>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cat photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
