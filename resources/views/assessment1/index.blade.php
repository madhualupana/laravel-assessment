@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Users</h1>
        <a href="{{ route('assessment1.create') }}" class="btn btn-primary">Create User</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->fullName }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('assessment1.show', $user->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('assessment1.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('assessment1.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection