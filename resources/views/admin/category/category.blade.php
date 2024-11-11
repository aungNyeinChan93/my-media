@extends('admin.layouts.layout')


@section('content')
    <div class="container category">
        <h3 class="text-center text-danger pb-2">Categories</h3>
        <table class=" table table-bordered table-hover table-success p-2 rounded shadow-sm">
            <thead class="bg-primary">
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
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
