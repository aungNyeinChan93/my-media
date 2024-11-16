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
        {{--  delete-user end --}}

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

                    {{-- Search Bar --}}
                    <div class="row mt-2 pr-4">
                        <div class="col-4 offset-8">
                            <div class="">
                                <form action="{{ route('adminList.list') }}" method="GET">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="searchKey" value="{{ request()->searchKey }}"
                                            class="form-control" placeholder="Search">
                                        <button type="submit" class=" btn btn-sm btn-info">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Search Bar End --}}

                    {{-- Gender Option --}}
                    <div class="row pr-4 mt-1">
                        <div class="col-4 offset-8 ">
                            <form action="{{ route('adminList.genderFilter') }}" method="POST">
                                @csrf
                                <select name="gender" class="form-control">
                                    <option value="male" @if (request()->gender == 'male') selected @endif>Male</option>
                                    <option value="female" @if (request()->gender == 'female') selected @endif>Female</option>
                                </select>
                                <button class=" btn btn-sm btn-info mt-1">Confrim</button>
                            </form>
                        </div>
                    </div>
                    {{-- Gender Option End --}}

                    {{-- users list  --}}
                    <div class="card-body">
                        <table class=   " table table-bordered table-hover">
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
                                        <td>{{ $user->address }}</td>
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
