@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Assessment 1</h5>
                    <p class="card-text">User Details Management</p>
                    <a href="{{ route('assessment1.index') }}" class="btn btn-primary">Go to Assessment 1</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Assessment 2</h5>
                    <p class="card-text">Category Management</p>
                    <a href="{{ route('assessment2.index') }}" class="btn btn-primary">Go to Assessment 2</a>
                </div>
            </div>
        </div>
    </div>
@endsection