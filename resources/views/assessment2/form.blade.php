@if(isset($category))
    <form action="{{ route('assessment2.update', $category->id) }}" method="POST">
        @method('PUT')
@else
    <form action="{{ route('assessment2.store') }}" method="POST">
@endif
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name ?? old('name') }}" required>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
            <option value="1" {{ isset($category) && $category->status == 1 ? 'selected' : '' }}>Enabled</option>
            <option value="2" {{ isset($category) && $category->status == 2 ? 'selected' : '' }}>Disabled</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="parent_id" class="form-label">Parent Category</label>
        <select class="form-select" id="parent_id" name="parent_id">
            <option value="">No Parent</option>
            @foreach($parentOptions as $id => $path)
                <option value="{{ $id }}" {{ isset($category) && $category->parent_id == $id ? 'selected' : '' }}>{{ $path }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('assessment2.index') }}" class="btn btn-secondary">Cancel</a>
</form>