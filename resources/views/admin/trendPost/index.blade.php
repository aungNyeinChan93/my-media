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
                                <tr class="text-center">
                                    <th>Post ID</th>
                                    <th>Post Name</th>
                                    <th>View Counts</th>
                                    <th>Post Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($actionLogs as $actionLog)
                                    <tr>
                                        <td>{{ $actionLog->post->id }}</td>
                                        <td>{{ $actionLog->post->title }}</td>
                                        <td>
                                            {{ $actionLog->count }}
                                        </td>
                                        <td class="text-center">
                                            @if ($actionLog->post->image == null)
                                                <img src="{{ asset('/postsImage/default.png') }}" alt="img"
                                                    class=" img-fluid w-25">
                                            @else
                                                <img src="{{ asset('/postsImage/' . $actionLog->post->image) }}"
                                                    alt="" class=" img-fluid w-25">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('trendPosts.detail', $actionLog->post->id) }}"
                                                class="btn btn-sm btn-secondary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="paginate mt-4">
                            {{ $actionLogs->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
