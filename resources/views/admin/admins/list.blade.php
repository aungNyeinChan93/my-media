@extends('admin.layouts.layout')

@section('content')
    <div class="container-sm my-2 ">
        {{--  delete-user --}}
        <div class="row">
            <div class="col-8 offset-2">
                @if (Session::has('delete-user'))
                    <div class="alert alert-danger">
                        {{ Session::get('delete-user') }}
                    </div>
                @endif
            </div>
        </div>

        {{-- @session('delete-user')
            {{ Session::get('delete-user') }}
        @endsession --}}

        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center text-blue">Admin Lists ||
                            <small class="text-danger">
                                @if (count($users) < 2)
                                    Total User
                                @else
                                    Total Users
                                @endif
                                ({{ count($users) }})
                            </small>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class=" table table-bordered table-hover">
                            <thead>
                                <tr class="table-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->Address }}</td>
                                        @if (Auth::user()->id != $user->id)
                                            <td>
                                                <form action="{{ route('adminList.delete', $user->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
        {{-- Paginate --}}
        <div class="row">
            <div class="col-8 offset-2">
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
