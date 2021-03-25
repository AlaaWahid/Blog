@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12 ml-5">
            <div class="col-sm-12">
                @if (session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <div>
                <a style="margin: 19px;" href="{{ route('users.create') }}" class="btn btn-primary">New User</a>
            </div>
            <h6 class="display-4">Users</h6>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Gender</td>
                        <td>Address</td>
                        <td>Role</td>
                        <td colspan=2></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                            </td>

                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Posts</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
