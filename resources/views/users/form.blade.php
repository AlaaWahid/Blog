@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">{{ $user->name }}</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="name">Name: </label>
                    <input type="text" class="form-control" name="name" value={{ $user->name }} />
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" class="form-control" name="email" value={{ $user->email }} />
                </div>
                <div class="form-group">
                    <label for="address">Address: </label>
                    <input type="text" class="form-control" name="address" value={{ $user->address }} />
                </div>
                <div class="form-group">
                    <label for="role">Role: </label>
                    <select class="form-control" name="role">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
