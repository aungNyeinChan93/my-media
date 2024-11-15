@extends('admin.layouts.layout')


@section('content')
    <div class="container category">
        <h3 class="text-center text-white bg-secondary rounded-sm p-2">Categories</h3>
        {{-- create success session --}}
        <div class="row">
            <div class="col-12">
                @session('category-create')
                    <div class="alert alert-success">
                        <span class="text-white">{{ Session::get('category-create') }}</span>
                    </div>
                @endsession
            </div>
        </div>
        {{-- create success session end --}}

        {{-- delete  session --}}
        <div class="row">
            <div class="col-12">
                @session('category-delete')
                    <div class="alert alert-danger">
                        <span class="text-white">{{ Session::get('category-delete') }}</span>
                    </div>
                @endsession
            </div>
        </div>
        {{-- delete session end --}}

        {{-- update session --}}
        <div class="row">
            <div class="col-12">
                @session('category-update')
                    <div class="alert alert-warning">
                        <span class="text-white">{{ Session::get('category-update') }}</span>
                    </div>
                @endsession
            </div>
        </div>
        {{-- update session end --}}
        <div class="row">
            <div class="col-12">
                <div class="card p-2">
                    <form action="{{ route('categories.create') }}" method="POST">
                        @csrf
                        <div class="my-1">
                            <input type="text" name="name"
                                class="form-control @error('name')
                                is-invalid
                            @enderror"
                                placeholder="Category Name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="my-1">
                            <textarea name="description" cols="30" rows="5"
                                class="form-control @error('description')
                                is-invalid
                            @enderror"
                                placeholder="Category Desc ..."></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="my-1">
                            <input class="btn btn-sm btn-success" type="submit" value="Add Category">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- search bar --}}
        <div class="row">
            <div class="col-4 offset-8 my-2">
                <form action="{{ route('categories.search') }}" method="POST" class="d-flex">
                    @csrf
                    <input type="text" name="searchKey" class="form-control" placeholder="Search"
                        value="{{ request()->searchKey }}">
                    <input type="submit" value="Search" class="btn btn-secondary">
                </form>
            </div>
        </div>
        {{-- search bar end --}}

        {{-- category lists --}}
        <div class="row">
            <div class="col-12">
                <table class=" table table-bordered table-hover table-success p-2 rounded shadow-sm">
                    <thead class="bg-secondary">
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ Str::limit($category->description, 80, '...') }}</td>
                                <td class="">
                                    <div class="d-flex">
                                        <span class="mr-2 ">
                                            <form action="{{ route('categories.delete', $category->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </span>
                                        <span>
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
