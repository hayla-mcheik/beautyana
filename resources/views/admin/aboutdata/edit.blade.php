@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white mb-0">Manage About Us Data</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.aboutdata.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label class="form-label fw-bold">Main Title</label>
                            <input type="text" name="title" value="{{ old('title', $about->title) }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold">Years of Experience</label>
                            <input type="number" name="years" value="{{ old('years', $about->years) }}" class="form-control" min="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Main Description</label>
                        <textarea name="description" class="form-control" rows="5">{{ old('description', $about->description) }}</textarea>
                    </div>

                    <hr>

                    <h5 class="mb-3 text-primary">Section Images</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Image One</label>
                            <input type="file" name="imgone" class="form-control mb-2">
                            @if($about->imgone)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $about->imgone) }}" alt="Image One Preview" class="img-thumbnail" style="max-height: 100px;">
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Image Two</label>
                            <input type="file" name="imgtwo" class="form-control mb-2">
                            @if($about->imgtwo)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $about->imgtwo) }}" alt="Image Two Preview" class="img-thumbnail" style="max-height: 100px;">
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Image Three</label>
                            <input type="file" name="imgthree" class="form-control mb-2">
                            @if($about->imgthree)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $about->imgthree) }}" alt="Image Three Preview" class="img-thumbnail" style="max-height: 100px;">
                                </div>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <h5 class="mb-3 text-primary">Sub Features & Highlights</h5>
                    <div class="row">
                        <div class="col-md-4 border-end">
                            <h6 class="fw-bold text-secondary mb-2">Feature One</h6>
                            <div class="mb-2">
                                <label class="small text-muted">Title One</label>
                                <input type="text" name="titleone" value="{{ old('titleone', $about->titleone) }}" class="form-control form-control-sm">
                            </div>
                            <div class="mb-2">
                                <label class="small text-muted">Icon One Class (e.g., fa fa-heart)</label>
                                <input type="text" name="iconone" value="{{ old('iconone', $about->iconone) }}" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="col-md-4 border-end">
                            <h6 class="fw-bold text-secondary mb-2">Feature Two</h6>
                            <div class="mb-2">
                                <label class="small text-muted">Title Two</label>
                                <input type="text" name="titletwo" value="{{ old('titletwo', $about->titletwo) }}" class="form-control form-control-sm">
                            </div>
                            <div class="mb-2">
                                <label class="small text-muted">Icon Two Class</label>
                                <input type="text" name="icontwo" value="{{ old('icontwo', $about->icontwo) }}" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h6 class="fw-bold text-secondary mb-2">Feature Three</h6>
                            <div class="mb-2">
                                <label class="small text-muted">Title Three</label>
                                <input type="text" name="titlethree" value="{{ old('titlethree', $about->titlethree) }}" class="form-control form-control-sm">
                            </div>
                            <div class="mb-2">
                                <label class="small text-muted">Icon Three Class</label>
                                <input type="text" name="iconthree" value="{{ old('iconthree', $about->iconthree) }}" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-primary text-white px-4">Update Content</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection