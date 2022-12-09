@extends('layouts.app')
@section('content')
<div class="container">
    <form action="">
        <label for="">Name</label>
        <input type="text" value="{{ $client->name }}" class="form-control" name="name">

        <label for="">Email</label>
        <input type="email" value="{{ $client->email }}" class="form-control" name="email">

        <label for="">Phone</label>
        <input type="text" value="{{ $client->phone }}" class="form-control" name="phone">

        <div class="card mt-5">
        <label for="companies" class="text-center"><b>Companies</b></label>
        @foreach($client->companies as $company)
        <input id type="text" value="{{ $company->name }}" readonly class="form-control mt-1">
        @endforeach
        </div>
        <button class="btn btn-warning mt-2">Update</button>
    </form>
</div>
@endsection
