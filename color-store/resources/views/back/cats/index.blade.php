@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Towns List</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($towns as $town)
                        <li class="list-group-item">
                            <div class="client-line">
                                <div class="client-info">
                                    <h2>{{$town->name}}</h2>
                                    <div class="clients-count">clients: [{{$town->client->count()}}]</div>
                                    <div class="clients-count">orders: [{{$town->ordersCount}}]</div>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('towns-show', $town)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('towns-edit', $town)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('towns-delete', $town)}}" method="post">
                                        <button type="submit" class="btn btn-danger">delete</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">
                            <div class="client-line">No towns</div>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
