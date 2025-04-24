@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit User</h1>
        <a href="{{ route('assessment1.index') }}" class="btn btn-secondary">Back</a>
    </div>

    @include('assessment1.form')
@endsection