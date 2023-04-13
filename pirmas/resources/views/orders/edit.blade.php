@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Edit Order</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('orders-update', $order)}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value={{old('title', $order->title)}}>
                            <div class="form-text">Please add title of good or bad or whatever here</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" value={{old('price', $order->price)}}>
                            <div class="form-text">Please add price to pay</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Client</label>
                            <select class="form-select" disabled>
                                <option>{{$order->orderClient->name}} {{$order->orderClient->surname}}</option>
                            </select>
                            <div class="form-text">Orders client</div>
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
