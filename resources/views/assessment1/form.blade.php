@if(isset($user))
    <form action="{{ route('assessment1.update', $user->id) }}" method="POST">
        @method('PUT')
@else
    <form action="{{ route('assessment1.store') }}" method="POST">
@endif
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="prefixname" class="form-label">Prefix</label>
                <select class="form-select" id="prefixname" name="prefixname">
                    <option value="Mr." {{ isset($user) && $user->prefixname === 'Mr.' ? 'selected' : '' }}>Mr.</option>
                    <option value="Mrs." {{ isset($user) && $user->prefixname === 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                    <option value="Ms." {{ isset($user) && $user->prefixname === 'Ms.' ? 'selected' : '' }}>Ms.</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname ?? old('firstname') }}" required>
            </div>
            <div class="mb-3">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middlename" name="middlename" value="{{ $user->middlename ?? old('middlename') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname ?? old('lastname') }}" required>
            </div>
            <div class="mb-3">
                <label for="suffixname" class="form-label">Suffix</label>
                <input type="text" class="form-control" id="suffixname" name="suffixname" value="{{ $user->suffixname ?? old('suffixname') }}">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo URL</label>
                <input type="text" class="form-control" id="photo" name="photo" value="{{ $user->photo ?? old('photo') }}">
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-6">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $user->username ?? old('username') }}" required>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email ?? old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" {{ !isset($user) ? 'required' : '' }}>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" {{ !isset($user) ? 'required' : '' }}>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('assessment1.index') }}" class="btn btn-secondary">Cancel</a>
</form>