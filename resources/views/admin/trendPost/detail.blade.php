@extends('admin.layouts.layout');


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card my-4">
                    <div class="card-header">
                        <h4>{{ $post->title }}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="col-12 p-2">
                            <h5 class=" text-muted"> Category - <small
                                    class="bg-danger p-1 rounded">{{ $post->category->name }}</small>
                            </h5>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                @if ($post->image == null)
                                    <img class=" w-100 img-fluid" src="{{ asset('/postsImage/default.png') }}"
                                        alt="img">
                                @else
                                    <img class=" w-100  img-fluid" src="{{ asset('/postsImage/' . $post->image) }}"
                                        alt="img">
                                @endif
                            </div>
                            <div class="col-8">
                                <p>{{ $post->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('trendPosts.index') }}" class="btn btn-sm btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
