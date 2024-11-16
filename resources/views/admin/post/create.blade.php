@extends('admin.layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card my-2">
                    <div class="card-header bg-secondary">
                        Post Create
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.createAction') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="my-2">
                                <input type="text" name="title" class="form-control" placeholder="title">
                            </div>
                            <div class="my-2">
                                <textarea name="description" cols="30" rows="10" class="form-control" placeholder="description"></textarea>
                            </div>
                            <div class="my-2">
                                <select name="category" class="form-control">
                                    <option value="#">Choose Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-2">
                                <input type="file" name="image" class="form-input">
                            </div>
                            <div class="my-2">
                                <input type="submit" value="Add Post" class="btn btn-sm btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
