@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Add Order</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('orders-store')}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value={{old('title')}}>
                            <div class="form-text">Please add title of good or bad or whatever here</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" value={{old('price')}}>
                            <div class="form-text">Please add price to pay</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Client</label>
                            <select class="form-select" name="client_id">
                                <option value="0">Clients list</option>
                                @foreach($clients as $client)
                                <option value="{{$client->id}}" @if($client->id == $id) selected @endif>
                                {{$client->name}} {{$client->surname}}</option>
                                @endforeach
                            </select>
                            <div class="form-text">Please select client</div>
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
