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
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="my-2">
                                <input type="text" name="title" class="form-control" placeholder="title"
                                    value="{{ old('title', $post->title) }}">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-2">
                                <textarea name="description" cols="30" rows="10" class="form-control" placeholder="description">{{ old('description', $post->description) }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-2">
                                <select name="category" class="form-control">
                                    <option value="">Choose Category</option>
                                    @foreach ($categories as $category)
                                        <option
                                            value="{{ $category->id }}"@if ($category->id == $post->category_id) selected @endif>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-2">
                                <img class=" img-thumbnail w-100 my-2"
                                    @if ($post->image != null) src="{{ asset("/postsImage/$post->image") }}"
                                    @else
                                    src="{{ asset('/postsImage/default.png') }}" @endif
                                    alt="img">
                            </div>
                            <div class="my-2">
                                <input type="file" name="image" class="form-input">
                                @error('image')
                                    <small class="d-block text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="submit" value="Update Post" class="btn btn-sm btn-success">
                                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-secondary">Back</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
