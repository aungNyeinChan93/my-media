@extends('admin.layouts.layout')

@section('content')
    <div class="container my-4">
        {{-- alert message --}}
        <div class="row">
            <div class="col-6 offset-3">
                @if (session('profile.update'))
                    <div class="alert alert-success">
                        {{ session('profile.update') }}
                    </div>
                @endif
            </div>
        </div>
        {{-- form --}}

        {{-- errors section --}}
        <div class="row">
            <div class="col-6 offset-3">
                @if ($errors->all())
                    <div class="card bg-orange p-3">
                        @foreach ($errors->all() as $error)
                            <li class="text-white p-1">{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        {{-- end errors section --}}
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card p-3">
                    <h3>Profile </h3>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <input type="text" name="name" placeholder="name"
                            class="form-control my-2 @error('name')
                            is-invalid
                        @enderror"
                            value="{{ old('name', $user->name) }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <input type="text" name="email" placeholder="email"
                            class="form-control my-2 @error('email')
                            is-invalid
                        @enderror"
                            value="{{ old('email', $user->email) }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <div class="d-flex">
                            <input type="radio" name="gender" @if ($user->gender == 'male') checked @endif
                                value="male" class="mx-1 form-check"> male
                            <input type="radio" name="gender" @if ($user->gender == 'female') checked @endif
                                value="female" class="mx-1 form-check"> female
                        </div>
                        <div class="my-2">
                            <textarea name="address" cols="30" rows="5"
                                class="form-control @error('address')
                                is-invalid
                            @enderror"
                                placeholder="address ... ">{{ old('address', $user->address) }}
                            </textarea>
                        </div>
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="d-flex justify-content-between p-2 ">
                            <input type="submit" value="Submit" class="btn btn-sm btn-primary">
                            <small><a class="text-danger" href="">Forget Password</a></small>
                        </div>
                    </form>
                    <a href="{{ route('profile.view') }}" class="btn btn-sm btn-secondary ml-2">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
