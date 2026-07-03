@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="card">

            <div class="card-header">
                <h4>
                    Blogs List

                    <a href="{{ url('admin/blogs/create') }}"
                       class="btn btn-primary btn-sm float-end">
                        Add Blog
                    </a>
                </h4>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped align-middle">

                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Title</th>
                            <th>By</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th width="120">Cover</th>
                            <th width="120">Gallery</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($blogs as $blog)

                            <tr>

                                <td>{{ $blog->id }}</td>

                                <td>{{ $blog->title }}</td>

                                <td>{{ $blog->by }}</td>

                                <td>{{ $blog->date }}</td>

                                <td>
                                    {{ \Illuminate\Support\Str::limit($blog->description,100) }}
                                </td>

                                <td>

                                    @if($blog->image)

                                        <img
                                            src="{{ asset($blog->image) }}"
                                            class="img-thumbnail"
                                            style="width:90px;height:90px;object-fit:cover;">

                                    @else

                                        <span class="text-muted">
                                            No Image
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    @if($blog->images->count())

                                        <span class="badge bg-success">
                                            {{ $blog->images->count() }} Images
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            0 Images
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a href="{{ url('admin/blogs/'.$blog->id.'/edit') }}"
                                       class="btn btn-success btn-sm">

                                        Edit

                                    </a>

                                    <a href="{{ url('admin/blogs/'.$blog->id.'/delete') }}"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure you want to delete this blog?')">

                                        Delete

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="text-center">
                                    No Blogs Available
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</div>

@endsection