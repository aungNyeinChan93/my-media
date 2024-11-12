@extends('admin.layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card my-4">
                    <div class="card-header bg-secondary text-center">
                        <h3>User Information</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="row p-2">
                            <span class="col-4 text-muted">User Name </span>
                            <span class="text-danger">{{ auth()->user()->name }}</span>
                        </h5>
                        <h5 class="row p-2">
                            <span class="col-4 text-muted">Email </span>
                            <span class="text-danger">{{ auth()->user()->email }}</span>
                        </h5>
                        <h5 class="row p-2">
                            <span class="col-4 text-muted">Gender </span>
                            <span class="text-danger">{{ auth()->user()->gender }}</span>
                        </h5>
                        <h5 class="row p-2">
                            <span class="col-4 text-muted">Address </span>
                            <span class="text-danger">{{ auth()->user()->address }}</span>
                        </h5>
                        <a href="{{ route('profile') }}" class="btn btn-sm btn-info mt-3 mr-2">Edit profile</a>
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-secondary mt-3 mr-2">Back</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
