@extends('layouts.app')
@section('content')
    <div class="row justify-content-center text-center ml-5 my-4">
        <div class="col-md-8 ">
            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h4>Update Comment</h4>
                <br>
                <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                <div class="form-group">
                    <textarea id="body" class="form-control" name="body" cols="15"
                        rows="5">{{ isset($comment) ? $comment->body : '' }}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-info ">Update</button>
            </form>
        </div>
    </div>
@endsection
