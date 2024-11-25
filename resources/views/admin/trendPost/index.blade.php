@extends('admin.layouts.layout')

@section('content')
    <div class="container trendPost">
        <div class="row">
            <div class="col-12">
                <div class="card my-3">
                    <div class="card-header">
                        <h3 class="text-secondary p-1">Trend Posts</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover p-2">
                            <thead class="bg-secondary">
                                <tr>
                                    <th>ID</th>
                                    <th>Post Name</th>
                                    <th>View Counts</th>
                                    <th>Post Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            view Counts
                                        </td>
                                        <td>
                                            @if ($post->image == null)
                                                <img src="{{ asset('/postsImage/default.png') }}" alt="img"
                                                    class=" img-fluid w-25">
                                            @else
                                                <img src="{{ asset('/postsImage/' . $post->image) }}" alt=""
                                                    class=" img-fluid w-25">
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary">Detail</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="paginate mt-4">
                            {{ $posts->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
