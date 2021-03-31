@extends('layouts.app')
@section('content')
    <div class="col-8 ml-5">
        <div class="col-sm-12">
            @if (session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <a href="{{ route('posts.create') }}" class="btn btn-outline-success my-3">Add New Post</a>

        @foreach ($posts as $post)
            <div class="card card-default my-4">
                <P class="card-header text-secondary font-weight-bold" style="background-color: #1fcc84;">
                    {{ $post->title }}

                </p>
                <div class="d-line">
                    <img src="{{ asset('images/posts/' . $post->image) }}" alt="post_image"
                        class="post-img rounded-circle float-left">
                    <div class="card-body text-dark" style="background-color: #97ddf5;">
                        {{ Str::limit($post->body, 100, ' .......') }} <a href="{{ route('posts.show', $post->id) }}"
                            class="btn btn-sm btn-info float-right bg-light ml-2">Read
                            more</a>
                    </div>
                </div>

                <div class="d-line mx-2">
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="float-right mx-3">
                        @csrf
                        @method('DELETE')
                        @if (Auth::user()->id == $post->user_id)
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endif
                    </form>
                    <div class="float-right">
                        @if (Auth::user()->id == $post->user_id)
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
                        @endif
                    </div>

                </div>

            </div>
        @endforeach


    </div>
@endsection
