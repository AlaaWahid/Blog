@extends('layouts.app')
@section('content')
    <h1 class="font-weight-bold ml-5">User : {{ $user->name }}</h1>

    @foreach ($posts as $post)
        <div class="card card-defult">
            <div class="card-header">{{ $post->title }}</div>
            <div class="card-body">{{ $post->body }}</div>
        </div>
    @endforeach
@endsection
