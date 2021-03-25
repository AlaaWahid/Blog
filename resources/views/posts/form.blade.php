@extends('layouts.app')
@section('content')
    <div class="ml-5">
        <div class="col-sm-12">
            @if (session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>

        <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST">
            @csrf
            @if (isset($post))
                @method('PUT')
            @endif
            <div class="form-group">
                <label>Post title</label>
                <input id="title" name="title" type="text" class="form-control"
                    value="{{ isset($post) ? $post->title : '' }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Post Body</label>
                <textarea id="body" class="form-control" name="body" cols="30"
                    rows="10">{{ isset($post) ? $post->body : '' }}</textarea>
                @error('body')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
