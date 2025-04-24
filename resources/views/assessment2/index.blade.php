@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Categories</h1>
        <a href="{{ route('assessment2.create') }}" class="btn btn-primary">Add Category</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Parent ID</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->fullPath }}</td>
                    <td>{{ $category->status == 1 ? 'Enabled' : 'Disabled' }}</td>
                    <td>{{ $category->parent_id ?? '-' }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <a href="{{ route('assessment2.show', $category->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('assessment2.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('assessment2.destroy', $category->id) }}" method="POST" class="d-inline">
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