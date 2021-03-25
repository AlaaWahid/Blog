@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotorn row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card-header text-center my-2">
                    <h3>Update Profile<h3>
                </div>
                <form method="POST" action="{{ route('profile.update', $user->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group my-4">
                        <label for="name">Name: </label>
                        <input type="text" class="form-control" name="name" value={{ $user->name }} />
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="text" class="form-control" name="email" value={{ $user->email }} />
                    </div>
                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password" class="form-control" name="password" value={{ $user->password }} />
                    </div>

                    <div class="form-group">
                        <label for="address">Address: </label>
                        <input type="text" class="form-control" name="address" value={{ $user->address }} />
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>


@endsection
