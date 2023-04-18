@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Categories List</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($cats as $cat)
                        <li class="list-group-item">
                            <div class="cat-line">
                                <div class="cat-info">
                                    <h2>{{$cat->title}}</h2>
                                    <div class="cat-colors-count">
                                        @for($i = 0; $i < $cat->colors_count; $i++)
                                            <div class="--random--color"></div>
                                        @endfor
                                    </div>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('cats-edit', $cat)}}" class="btn btn-outline-success">Edit</a>
                                    <form action="{{route('cats-delete', $cat)}}" method="post">
                                        <button type="submit" class="btn btn-outline-danger">delete</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">
                            <div class="cat-line">No categories</div>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
