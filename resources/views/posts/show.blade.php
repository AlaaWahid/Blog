@extends('layouts.app')
@section('content')
    <div class="ml-4">
        <div class="col-sm-12">
            @if (session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="card-header text-success my-3">
            <h3>written by: {{ $post->user->name }}</h3>
        </div>
        <div class="text-center">
            <img src="{{ asset('images/posts/' . $post->image) }}" alt="post_image" class="w-50">
        </div>
        <div class="my-2">
            <div class="card-header" style="background-color: #1fcc84;">
                <h3>{{ $post->title }}</h3>
            </div>
            <div class="card-body" style="background-color: #97ddf5; text-color:yellow">{{ $post->body }}</div>
        </div>

        <div class="text-dark">
            <h4>Comments</h4>

            <ul class="list-group">
                @foreach ($post->comments as $comment)
                    <li class="list-group-item">
                        <div>{{ $comment->user->name }}</div>
                        <div class="card-body">{{ $comment->body }}</div>
                        <div class="float-right mx-2">

                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                @if (Auth::user()->id == $comment->user_id)
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                @endif
                            </form>

                        </div>
                        <div class="float-left mx-2">
                            @if (Auth::user()->id == $comment->user_id)
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-info">Edit</a>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul><br>
            <form action="{{ route('comments.store') }}" method="POST" class="my-3">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="text" placeholder="write comment" class="form-control" name="body">
                <button class="btn btn-sm btn-primary my-3" type="submit">Comment</button>
            </form>
        </div>
    </div>
@endsection
