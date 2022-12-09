@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="">
            <label for="">Name</label>
            <input type="text" value="{{ $company->name }}" class="form-control" name="name">


             <div class="card mt-5">
                <label for="companies" class="text-center"><b>Clients</b></label>
                @foreach($company->clients as $client)
                    <input id type="text" value="{{ $client->name }}" readonly class="form-control mt-1">
                @endforeach
            </div>
            <button class="btn btn-warning mt-2">Update</button>
        </form>
    </div>
@endsection
