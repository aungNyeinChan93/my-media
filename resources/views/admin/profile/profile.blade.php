@extends('admin.layouts.layout')

@section('content')
    <div class="container">
        <div class="card p-3">
            <h3>Profile </h3>
            <form action="" method="POST">
                @csrf
                <input type="text" name="name" placeholder="name" class="form-control my-2">
                <input type="text" name="email" placeholder="email" class="form-control my-2">
                <input type="text" name="password" placeholder="password" class="form-control my-2">
                <input type="text" name="password_confirmation" placeholder="Confirm password" class="form-control my-2">
                <input type="submit" value="Submit" class="btn btn-sm btn-primary">
            </form>
        </div>
    </div>
@endsection
