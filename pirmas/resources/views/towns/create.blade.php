@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Add Towns</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('towns-store')}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Towns Name</label>
                            <input type="text" class="form-control" name="name" value={{old('name')}}>
                            <div class="form-text">Please add town name here</div>
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