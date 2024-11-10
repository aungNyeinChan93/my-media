@extends('admin.layouts.layout')

@section('content')
    <div class="container">
        <h1 class="text-danger">{{ auth()->user()->name }} -- Dashboard</h1>
        <div class="container">
            @foreach ($users as $user)
                <li><a href="{{ url("/dashboard/?id=$user->id ") }}">{{ $user->name }}</a></li>
            @endforeach
        </div>
    </div>
@endsection
