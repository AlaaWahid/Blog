@extends('layouts.app')
@section('content')
    <div class="col-9 ml-5">
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
                <p class="card-body text-dark" style="background-color: #97ddf5;">
                    {{ Str::limit($post->body, 100, ' .......') }} <a href="{{ route('posts.show', $post->id) }}"
                        class="btn btn-sm btn-info float-right bg-light">Read
                        more</a>
                </p>


                <div class="float-left mx-2">
                    <div class="float-left mx-3">
                        @if (Auth::user()->id == $post->user_id)
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
                        @endif
                    </div>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="float-left">
                        @csrf
                        @method('DELETE')
                        @if (Auth::user()->id == $post->user_id)
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endif
                    </form>
                </div>

            </div>
        @endforeach


    </div>
@endsection
