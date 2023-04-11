@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Clients List</h1>
                    <form action="{{route('clients-index')}}" method="get">

                        <div class="container">
                            <div class="row">

                                <div class="col-5">
                                    <div class="mb-3">
                                        <label class="form-label">Sort</label>
                                        <select class="form-select" name="sort">
                                            @foreach($sortSelect as $value => $text)
                                                <option value="{{$value}}" @if($value === $sort) selected @endif>{{$text}}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-text">Please select your sort preferences</div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="mb-3">
                                        <label class="form-label">Filter</label>
                                        <select class="form-select">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <div class="form-text">Please select your filter preferences</div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="sort-filter-buttons">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{route('clients-index')}}" class="btn btn-danger">clear</a>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </form>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($clients as $client)
                        <li class="list-group-item">
                            <div class="client-line">
                                <div class="client-info">
                                    {{$client->name}}
                                    {{$client->surname}}
                                    <span>{{$client->tt ? 'TIK TOK' : 'FB' }}</span>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('clients-show', $client)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('clients-edit', $client)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('clients-delete', $client)}}" method="post">
                                        <button type="submit" class="btn btn-danger">delete</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">
                            <div class="client-line">No clients</div>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
