@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Add Tag</h1>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Tag</label>
                        <input type="text" class="form-control" name="create-title">
                        <div class="form-text">Please add product tag here</div>
                    </div>
                    <button type="button" class="mt-1 btn btn-outline-primary --create" data-url="{{route('tags-create')}}">Add</button>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Tags List</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group --tags--list" data-url="{{route('tags-list')}}">
                        <li class="list-group-item">
                            <div class="cat-line">Loading tags...</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="loader">
    <div class="lds-ring">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
@endsection
