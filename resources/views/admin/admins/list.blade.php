@extends('admin.layouts.layout')

@section('content')
    <div class="container-sm my-2 ">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center text-blue">Admin Lists</h4>
                    </div>
                    <div class="card-body">
                        <table class=" table table-bordered table-hover">
                            <thead>
                                <tr class="table-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Eamil</th>
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
                                        <td>
                                            <a href="" class=" btn btn-sm btn-danger">Delete</a>
                                        </td>
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
