@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
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
@endsection
