@extends('admin.layouts.layout')

@section('content')
    <div class="container">

        <h1 class="text-danger">{{ auth()->user()->name }} -- Dashboard</h1>

        {{-- password change session --}}
        <div class="row">
            <div class="col p-2">
                @if (Session::has('password-change'))
                    <div class="alert alert-warning">
                        {{ Session::get('password-change') }}
                    </div>
                @endif
            </div>
        </div>
        {{-- end password cahnge session --}}
        <div class="container">
            @foreach ($users as $user)
                <li><a href="{{ url("/dashboard/?id=$user->id ") }}">{{ $user->name }}</a></li>
            @endforeach
        </div>
    </div>
@endsection
