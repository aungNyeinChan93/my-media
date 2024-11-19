@extends('admin.layouts.layout')

@section('content')
    <div class="container post">
        <div class="row">
            <div class="col-12">
                <div class="bg-secondary p-1 rounded d-flex justify-content-lg-around">
                    <span class="h3 text-white">Posts</span>
                    <span class="text-white bg-danger rounded  my-2 px-1 "> Total Posts
                        {{ count($posts) }}
                    </span>
                </div>
            </div>
        </div>

        {{-- create-post session --}}
        <div class="row">
            <div class="col-12">
                @if (session('create-post'))
                    <div class="alert alert-success p-1 rounded my-1">
                        {{ session('create-post') }}
                    </div>
                @endif
            </div>
        </div>
        {{-- create-post session end --}}

        {{-- posts delete session --}}
        <div class="row">
            <div class="col-12">
                @session('delete-post')
                    <div class="alert alert-danger p-1 rounded my-1">
                        {{ session('delete-post') }}
                    </div>
                @endsession
            </div>
        </div>

        {{-- posts delete session end --}}


        {{-- create post --}}
        <div class="row">
            <div class="col-12 ">
                <div>
                    <a href="{{ route('posts.create') }}" class="btn btn-success p-1 my-2">Add Post</a>
                </div>
            </div>
        </div>
        {{-- create post end --}}

        {{-- posts list --}}
        <div class="row mt-2">
            @if (count($posts) < 1)
                <div class="col-12">
                    <div class="card bg-secondary p-3 rounded-sm shadow-sm">
                        <h3 class="text-warning text-center">Empty Post!</h3>
                    </div>
                </div>
            @else
                <div class="col-12">
                    @foreach ($posts as $post)
                        <div class="card rounded-sm shadow">
                            <div class="card-header">
                                <div class="row">
                                    <span class="col-9">{{ $post->id }} . {{ $post->title }}</span>
                                    <span>
                                        {{ $post->user->name }} - created at
                                        <span class="col-2 text-danger ">{{ $post->created_at->diffForHumans() }}
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <p class='text-muted'> Category ~ <span class="text-danger">
                                                {{ $post->category->name }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        {{ $post->description }}
                                    </div>
                                    <div class="col-6 text-center">
                                        <img @if ($post->image == null) src="{{ asset('/postsImage/default.png') }}"
                                            @else
                                                src="{{ asset("/postsImage/$post->image") }}" @endif
                                            class=' img-thumbnail w-50' alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <form action="{{ route('post.delete', $post->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        {{-- posts list end --}}

        {{-- pagiante  --}}
        <div class="row">
            <div class="col-2 offset-10 ">

                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
        {{-- pagiante end --}}
    </div>
@endsection
