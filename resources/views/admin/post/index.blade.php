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

        {{-- posts list --}}
        <div class="row">
            <div class="col-12">
                @foreach ($posts as $post)
                    <div class="card rounded-sm shadow">
                        <div class="card-header">
                            <span>{{ $post->id }} </span> . {{ $post->title }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    {{ $post->description }}
                                </div>
                                <div class="col-6 text-center">
                                    <img src="{{ asset("$post->image") }}" class=' img-thumbnail w-50' alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
