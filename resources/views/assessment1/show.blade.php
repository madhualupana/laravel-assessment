@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>User Details</h1>
        <div>
            <a href="{{ route('assessment1.edit', $user->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('assessment1.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ $user->avatar }}" alt="Avatar" class="img-fluid rounded-circle mb-3" style="max-width: 200px;">
                </div>
                <div class="col-md-8">
                    <h3>{{ $user->fullName }}</h3>
                    <p><strong>Username:</strong> {{ $user->username }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Type:</strong> {{ $user->type }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Additional Details</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->details as $detail)
                        <tr>
                            <td>{{ $detail->key }}</td>
                            <td>{{ $detail->value }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection