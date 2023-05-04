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
                    <form action="{{route('cats-update', $cat)}}" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Category title</label>
                            <input type="text" class="form-control" name="title" value="{{old('title', $cat->title)}}">
                            <div class="form-text">Please add category title here</div>
                        </div>
                        <div class="mb-3 cat-color-range">
                            <label class="form-label">Colors Count: <span class="--colors--counter">{{old('colors_count', $cat->colors_count)}}</span></label>
                            <input type="range" min="1" max="6" class="form-range --colors--counter" name="colors_count" value={{old('colors_count', $cat->colors_count)}}>
                        </div>
                        <div class="mb-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                        @if($cat->photo)
                                        <img src="{{asset('cats-photo') .'/t_'. $cat->photo}}">
                                        @else
                                        <img src="{{asset('cats-photo') .'/no.png'}}">
                                        @endif
                                    </div>
                                    <div class="col-8">
                                        <label class="form-label">Main Cat photo</label>
                                        <input type="file" class="form-control" name="photo">
                                        <button type="submit" name="delete" value="1" class="mt-2 btn btn-danger">Delete photo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3" data-gallery="0">
                            <label class="form-label">Gallery photo <span class="rem">X</span></label>
                            <input type="file" class="form-control">
                        </div>
                        <div class="gallery-inputs">

                        </div>

                        <button type="button" class="btn btn-secondary --add--gallery">add gallery photo</button>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        @csrf
                        @method('put')
                    </form>

                    <ul class="list-group mt-5">
                        @foreach($cat->gallery as $photo)
                        <li class="list-group-item">
                            <form action="{{route('cats-delete-photo', $photo)}}" method="post">
                                <div class="gallery">
                                    <img src="{{asset('cats-photo') .'/'. $photo->photo}}">
                                    <button type="submit" class="m-5 btn btn-danger">Delete photo</button>
                                </div>
                                @csrf
                                @method('delete')
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
