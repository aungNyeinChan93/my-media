@extends('admin.layouts.layout')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3 ">
                <div class="card my-3">
                    <div class="card-header">
                        <h3 class="text-blue text-center">Password Change</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.passwordChangeAction') }}" method="POST">
                            @csrf
                            <div class="form-group my-2">
                                <input type="password" name="oldPassword" placeholder="Old Password"
                                    class="form-control
                            @error('oldPassword')
                                is-invalid
                            @enderror">
                                @error('oldPassword')
                                    <small class="text-red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group my-2">
                                <input type="password" name="password" placeholder="New Password"
                                    class="form-control
                            @error('password')
                                is-invalid
                            @enderror">
                                @error('password')
                                    <small class="text-red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group my-2">
                                <input type="password" name="password_confirmation" placeholder="Confirmation Password"
                                    class="form-control
                            @error('password_confirmation')
                                is-invalid
                            @enderror">
                                @error('password_confirmation')
                                    <small class="text-red">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <input type="submit" value="Change Password" class="btn btn-sm btn-success p-1">
                                <a href="{{ route('profile.view') }}" class="btn btn-sm btn-secondary ms-2">back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
