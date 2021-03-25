@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-4">Add User</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" />
                    </div>

                    <div class="form-group">
                        <label for="address">Address: </label>
                        <input type="text" class="form-control" name="address" />
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender: </label>
                        <select class="form-control" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Role: </label>
                        <select class="form-control" name="Role">
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
