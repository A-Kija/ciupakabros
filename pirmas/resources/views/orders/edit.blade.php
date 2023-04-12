@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Add Client</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('clients-update', $client)}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Client Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $client->name) }}">
                            <div class="form-text">Please add client name here</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Client Surname</label>
                            <input type="text" class="form-control" name="surname"  value="{{ old('surname', $client->surname) }}">
                            <div class="form-text">Please add client surname here</div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="tt" name="tt" 
                            @if ((Session::has('tt') && Session::get('tt')) || (!Session::has('tt') && $client->tt)) checked @endif>
                            <label class="form-check-label" for="tt">Has TikTok account</label>
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