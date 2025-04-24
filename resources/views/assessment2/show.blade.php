@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Category Details</h1>
        <div>
            <a href="{{ route('assessment2.edit', $category->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('assessment2.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3>{{ $category->fullPath }}</h3>
            <p><strong>Status:</strong> {{ $category->status == 1 ? 'Enabled' : 'Disabled' }}</p>
            <p><strong>Parent:</strong> {{ $category->parent ? $category->parent->fullPath : 'None' }}</p>
            <p><strong>Created At:</strong> {{ $category->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $category->updated_at }}</p>
            
            @if($category->children->count() > 0)
                <h4 class="mt-4">Child Categories</h4>
                <ul>
                    @foreach($category->children as $child)
                        <li>{{ $child->fullPath }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection