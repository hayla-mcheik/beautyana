@extends('layouts.admin')

@section('content')

<div class="row">
            <div class="col-md-12">

@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Blog
                            <a href="{{ url('admin/blogs/') }}" class="btn btn-danger text-white btn-sm float-end">
                                Back</a></h4>
</div>

<div class="card-body">
<form action="{{ url('admin/blogs/'.$blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" value="{{ $blog->title }}" class="form-control">
</div>

<div class="mb-3">
    <label>By</label>
    <input type="text" name="by" value="{{ $blog->by }}" class="form-control">
</div>
<div class="mb-3">
    <label>Date</label>
    <input type="date" name="date" value="{{ $blog->date }}" class="form-control">
</div>

<div class="mb-3">
        <label>Description</label>
        <textarea type="text" name="description" class="form-control" rows="3">{{ $blog->description }}</textarea>
</div>

<div class="mb-3">

    <label>Cover Image</label>

    <input
        type="file"
        name="image"
        class="form-control">

    @if($blog->image)

        <img
            src="{{ asset($blog->image) }}"
            width="180"
            class="img-thumbnail mt-3">

    @endif

</div>

<div class="mb-3">

    <label>Add Gallery Images</label>

    <input
        type="file"
        name="gallery[]"
        class="form-control"
        multiple
        accept=".jpg,.jpeg,.png,.webp">

    <small class="text-muted">
        Select one or multiple images.
    </small>

</div>
@if($blog->images->count())

<hr>

<h5 class="mb-3">Gallery Images</h5>

<div class="row">

    @foreach($blog->images as $gallery)

        <div class="col-md-3 mb-4">

            <div class="card">

                <img
                    src="{{ asset($gallery->image) }}"
                    class="card-img-top"
                    style="height:180px;object-fit:cover;">

                <div class="card-body text-center">

                    <a
                        href="{{ url('admin/blogs/gallery/delete/'.$gallery->id) }}"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Delete this image?')">

                        Delete

                    </a>

                </div>

            </div>

        </div>

    @endforeach

</div>

@endif

<div class="mb-3">
    <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
</div>
</div>
</div>
</div>


@endsection
