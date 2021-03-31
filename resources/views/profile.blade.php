@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotorn row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card-header bg-info text-center my-2">
                    <h3>Profile<h3>
                </div>
                <div class="text-center">
                    <img src="{{ asset('images/users/' . $user->image) }}" alt="image" class="w-50">
                </div>
                <div class="text-center">
                    <h2><b>Name: </b> {{ $user->name }}</h2>
                    <br>
                    <h2><b>Email: </b> {{ $user->email }}</h2>
                    <br>
                    <h2><b>Gender: </b> {{ $user->gender }}</h2>
                    <br>
                    <h2><b>Address: </b> {{ $user->address }}</h2>
                    <br>
                    <h2><b>Role: </b> {{ $user->role }}</h2>
                    <br>
                </div>
                <div class="d-line">
                    <div class="float-left">
                        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-success">Update</a>
                    </div>
                    <form action="{{ route('profile.destroy', $user->id) }}" method="POST" class="float-right">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
