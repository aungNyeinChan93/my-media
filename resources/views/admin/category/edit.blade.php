@extends('admin.layouts.layout')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Category Update</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="my-1">
                                <input type="text" name="name"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    placeholder="Category Name" value="{{ old('name', $category->name) }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-1">
                                <textarea name="description" cols="30" rows="5"
                                    class="form-control @error('description')
                                is-invalid
                            @enderror"
                                    placeholder="Category Desc ...">{{ old('description', $category->description) }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-1">
                                <input class="btn btn-sm btn-success" type="submit" value="Update ">
                                <a href="{{ route('categories.index') }}" class="btn btn-sm btn-secondary">Back</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
