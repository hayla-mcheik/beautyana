@extends('layouts.admin')

@section('content')

<div class="container-fluid px-3 px-md-4">

    {{-- Success Message --}}
    @if(session('message'))

        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">

            <i class="mdi mdi-check-circle-outline me-1"></i>

            {{ session('message') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close">
            </button>

        </div>

    @endif


    <div class="card slider-form-card border-0 shadow-sm">

        {{-- ============================================================
             HEADER
        ============================================================ --}}

        <div class="card-header bg-white border-bottom px-4 py-3">

            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3">

                <div>

                    <h4 class="mb-1 fw-bold">
                        Edit Slider
                    </h4>

                    <p class="text-muted mb-0">
                        Update the slider content, desktop image, mobile image and website visibility.
                    </p>

                </div>

                <a
                    href="{{ url('admin/sliders') }}"
                    class="btn btn-outline-danger">

                    <i class="mdi mdi-arrow-left me-1"></i>
                    Back

                </a>

            </div>

        </div>


        {{-- ============================================================
             BODY
        ============================================================ --}}

        <div class="card-body p-4">

            <form
                action="{{ url('admin/sliders/'.$slider->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @method('PUT')


                {{-- ====================================================
                     TITLE
                ==================================================== --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Slider Title

                        <span class="text-danger">*</span>

                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $slider->title) }}"
                        class="form-control @error('title') is-invalid @enderror"
                        placeholder="Example: Timeless Elegance">

                    <small class="form-text text-muted">
                        This title appears as the main heading on the slider.
                    </small>

                    @error('title')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- ====================================================
                     DESCRIPTION
                ==================================================== --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Slider Description
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Write a short description for this slider...">{{ old('description', $slider->description) }}</textarea>

                    <small class="form-text text-muted">
                        Keep the description short and clear for the homepage banner.
                    </small>

                    @error('description')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- ====================================================
                     DESKTOP IMAGE UPLOAD
                ==================================================== --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Desktop Slider Image
                    </label>

                    <div class="slider-upload-card">

                        <div class="slider-upload-icon desktop-upload-icon">

                            <i class="mdi mdi-monitor"></i>

                        </div>

                        <div class="slider-upload-content">

                            <input
                                type="file"
                                name="desktop_image"
                                id="desktopImage"
                                accept="image/*"
                                class="form-control @error('desktop_image') is-invalid @enderror">

                            <small class="form-text text-muted d-block mt-2">

                                Upload the desktop version of this slider.

                                <strong>
                                    Recommended: 1920 × 700 px
                                </strong>

                            </small>

                            @error('desktop_image')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror


                            {{-- New Desktop Preview --}}

                            <div
                                id="desktopPreviewContainer"
                                class="new-image-preview mt-3 d-none">

                                <div class="preview-label">
                                    New Desktop Image Preview
                                </div>

                                <img
                                    id="desktopPreview"
                                    src=""
                                    alt="New Desktop Image Preview">

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ====================================================
                     CURRENT DESKTOP IMAGE
                ==================================================== --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Current Desktop Image
                    </label>

                    <div class="current-slider-image-card">

                        <div class="current-slider-image-wrapper">

                            @if($slider->desktop_image || $slider->image)

                                <img
                                    src="{{ asset($slider->desktop_image ?? $slider->image) }}"
                                    alt="Current Desktop Slider Image">

                            @else

                                <div class="no-slider-image">

                                    <i class="mdi mdi-image-off-outline"></i>

                                    <span>
                                        No desktop image
                                    </span>

                                </div>

                            @endif

                        </div>

                        <div class="current-image-information">

                            <h6 class="mb-1 fw-semibold">
                                Desktop Version
                            </h6>

                            <p class="text-muted mb-0">

                                This image is displayed on desktop and tablet
                                screens.

                            </p>

                        </div>

                    </div>

                </div>


                {{-- ====================================================
                     MOBILE IMAGE UPLOAD
                ==================================================== --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Mobile Slider Image
                    </label>

                    <div class="slider-upload-card">

                        <div class="slider-upload-icon mobile-upload-icon">

                            <i class="mdi mdi-cellphone"></i>

                        </div>

                        <div class="slider-upload-content">

                            <input
                                type="file"
                                name="mobile_image"
                                id="mobileImage"
                                accept="image/*"
                                class="form-control @error('mobile_image') is-invalid @enderror">

                            <small class="form-text text-muted d-block mt-2">

                                Upload a separate image specifically designed
                                for mobile phones.

                                <strong>
                                    Recommended: 750 × 1000 px
                                </strong>

                            </small>

                            @error('mobile_image')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror


                            {{-- New Mobile Preview --}}

                            <div
                                id="mobilePreviewContainer"
                                class="new-image-preview mobile-preview mt-3 d-none">

                                <div class="preview-label">
                                    New Mobile Image Preview
                                </div>

                                <img
                                    id="mobilePreview"
                                    src=""
                                    alt="New Mobile Image Preview">

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ====================================================
                     CURRENT MOBILE IMAGE
                ==================================================== --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Current Mobile Image
                    </label>

                    <div class="current-slider-image-card">

                        <div class="current-slider-image-wrapper mobile-current-image">

                            @if($slider->mobile_image)

                                <img
                                    src="{{ asset($slider->mobile_image) }}"
                                    alt="Current Mobile Slider Image">

                            @else

                                <div class="no-slider-image">

                                    <i class="mdi mdi-image-off-outline"></i>

                                    <span>
                                        No mobile image uploaded
                                    </span>

                                </div>

                            @endif

                        </div>

                        <div class="current-image-information">

                            <h6 class="mb-1 fw-semibold">
                                Mobile Version
                            </h6>

                            <p class="text-muted mb-0">

                                This image is displayed on mobile phones.
                                It can have a completely different composition
                                from the desktop image.

                            </p>

                        </div>

                    </div>

                </div>


                {{-- ====================================================
                     VISIBILITY
                ==================================================== --}}

                <div class="mb-4">

                    <div class="slider-visibility-card">

                        <div class="visibility-information">

                            <div class="visibility-icon">

                                <i
                                    id="visibilityIcon"
                                    class="mdi mdi-eye-outline">
                                </i>

                            </div>

                            <div>

                                <h6 class="mb-1 fw-semibold">
                                    Slider Visibility
                                </h6>

                                <p
                                    id="statusDescription"
                                    class="text-muted mb-0">
                                </p>

                            </div>

                        </div>


                        <div class="visibility-control">

                            <input
                                type="hidden"
                                name="status"
                                id="statusValue"
                                value="{{ old('status', $slider->status) }}">


                            <div class="form-check form-switch custom-visibility-switch">

                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="visibilitySwitch"

                                    {{ old('status', $slider->status) == '0'
                                        ? 'checked'
                                        : ''
                                    }}>

                                <label
                                    class="form-check-label"
                                    id="statusLabel"
                                    for="visibilitySwitch">
                                </label>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ====================================================
                     ACTIONS
                ==================================================== --}}

                <div class="slider-form-actions">

                    <a
                        href="{{ url('admin/sliders') }}"
                        class="btn btn-light px-4">

                        Cancel

                    </a>


                    <button
                        type="submit"
                        class="btn btn-primary px-4">

                        <i class="mdi mdi-content-save-edit-outline me-1"></i>

                        Update Slider

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>



<style>

/* ============================================================
   MAIN CARD
============================================================ */

.slider-form-card {
    border-radius: 10px;
    overflow: hidden;
}


/* ============================================================
   UPLOAD CARD
============================================================ */

.slider-upload-card {

    display: flex;
    align-items: flex-start;
    gap: 18px;

    padding: 20px;

    background: #fafbfc;

    border: 1px solid #e1e5eb;

    border-radius: 10px;
}


.slider-upload-icon {

    width: 52px;
    height: 52px;

    flex: 0 0 52px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 9px;

    font-size: 25px;
}


.desktop-upload-icon {

    background: #eef3ff;
    color: #4b7bec;

}


.mobile-upload-icon {

    background: #f6eef7;
    color: #805b83;

}


.slider-upload-content {

    flex: 1;
    min-width: 0;

}


/* ============================================================
   CURRENT IMAGE
============================================================ */

.current-slider-image-card {

    display: flex;
    align-items: center;
    gap: 20px;

    padding: 20px;

    background: #fafbfc;

    border: 1px solid #e1e5eb;

    border-radius: 10px;
}


.current-slider-image-wrapper {

    width: 220px;
    height: 125px;

    flex: 0 0 220px;

    overflow: hidden;

    border-radius: 9px;

    border: 1px solid #ddd;

    background: #fff;

}


.current-slider-image-wrapper img {

    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

}


.mobile-current-image {

    width: 140px;
    height: 180px;
}


.mobile-current-image img {

    object-fit: cover;

}


.current-image-information {

    flex: 1;
    min-width: 0;

}


.current-image-information h6 {

    color: #222;

}


.current-image-information p {

    font-size: 13px;
    line-height: 1.6;

}


/* ============================================================
   NO IMAGE
============================================================ */

.no-slider-image {

    width: 100%;
    height: 100%;

    display: flex;

    flex-direction: column;

    align-items: center;
    justify-content: center;

    gap: 7px;

    color: #aaa;

    font-size: 12px;

}


.no-slider-image i {

    font-size: 30px;

    color: #c8c8c8;

}


/* ============================================================
   NEW IMAGE PREVIEW
============================================================ */

.new-image-preview {

    padding: 12px;

    border: 1px solid #e1e5eb;

    border-radius: 9px;

    background: #fff;

}


.new-image-preview img {

    display: block;

    width: 100%;

    max-height: 260px;

    object-fit: contain;

    border-radius: 6px;

    background: #f8f8f8;

}


.mobile-preview img {

    max-height: 320px;

}


.preview-label {

    margin-bottom: 8px;

    font-size: 11px;

    font-weight: 600;

    text-transform: uppercase;

    letter-spacing: .7px;

    color: #777;

}


/* ============================================================
   VISIBILITY
============================================================ */

.slider-visibility-card {

    width: 100%;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 30px;

    padding: 22px;

    border: 1px solid #e1e5eb;

    border-radius: 10px;

    background: #fafbfc;

}


.visibility-information {

    min-width: 0;

    display: flex;

    align-items: center;

    gap: 16px;

}


.visibility-icon {

    width: 52px;
    height: 52px;

    flex: 0 0 52px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: #eef3ff;

    font-size: 25px;

}


.visibility-control {

    flex: 0 0 auto;

    min-width: 210px;

    display: flex;

    justify-content: flex-end;

}


.custom-visibility-switch {

    display: flex;

    align-items: center;

    gap: 14px;

    margin: 0;

    padding-left: 0;

}


.custom-visibility-switch .form-check-input {

    float: none;

    margin: 0;

    width: 52px;

    height: 28px;

    flex: 0 0 52px;

    cursor: pointer;

}


.custom-visibility-switch .form-check-label {

    margin: 0;

    min-width: 135px;

    white-space: nowrap;

    cursor: pointer;

    font-weight: 500;

}


/* ============================================================
   ACTIONS
============================================================ */

.slider-form-actions {

    display: flex;

    justify-content: flex-end;

    align-items: center;

    gap: 12px;

    padding-top: 24px;

    margin-top: 30px;

    border-top: 1px solid #e1e5eb;

}


/* ============================================================
   MOBILE
============================================================ */

@media (max-width: 768px) {

    .slider-upload-card {

        flex-direction: column;

    }


    .current-slider-image-card {

        flex-direction: column;

        align-items: flex-start;

    }


    .current-slider-image-wrapper {

        width: 100%;

        height: 220px;

        flex-basis: auto;

    }


    .mobile-current-image {

        width: 180px;

        height: 240px;

    }


    .current-image-information {

        width: 100%;

    }


    .slider-visibility-card {

        flex-direction: column;

        align-items: stretch;

        gap: 20px;

    }


    .visibility-control {

        min-width: 0;

        justify-content: flex-start;

        padding-left: 68px;

    }


    .slider-form-actions {

        flex-direction: column-reverse;

        align-items: stretch;

    }


    .slider-form-actions .btn {

        width: 100%;

    }

}


@media (max-width: 480px) {

    .visibility-control {

        padding-left: 0;

    }


    .custom-visibility-switch .form-check-label {

        min-width: 0;

        white-space: normal;

    }

}

</style>



<script>

document.addEventListener('DOMContentLoaded', function () {


    /* ============================================================
       VISIBILITY
    ============================================================ */

    const visibilitySwitch =
        document.getElementById('visibilitySwitch');

    const statusValue =
        document.getElementById('statusValue');

    const statusLabel =
        document.getElementById('statusLabel');

    const statusDescription =
        document.getElementById('statusDescription');

    const visibilityIcon =
        document.getElementById('visibilityIcon');


    function updateVisibility()
    {

        if (visibilitySwitch.checked) {

            statusValue.value = '0';

            statusLabel.textContent =
                'Visible on Website';

            statusDescription.textContent =
                'This slider is currently displayed on the website.';

            visibilityIcon.className =
                'mdi mdi-eye-outline';

        } else {

            statusValue.value = '1';

            statusLabel.textContent =
                'Hidden from Website';

            statusDescription.textContent =
                'This slider will not be displayed on the website.';

            visibilityIcon.className =
                'mdi mdi-eye-off-outline';

        }

    }


    visibilitySwitch.addEventListener(
        'change',
        updateVisibility
    );

    updateVisibility();


    /* ============================================================
       DESKTOP IMAGE PREVIEW
    ============================================================ */

    const desktopImage =
        document.getElementById('desktopImage');

    const desktopPreview =
        document.getElementById('desktopPreview');

    const desktopPreviewContainer =
        document.getElementById('desktopPreviewContainer');


    if (desktopImage) {

        desktopImage.addEventListener('change', function () {

            const file = this.files[0];


            if (!file) {

                desktopPreviewContainer.classList.add('d-none');

                desktopPreview.src = '';

                return;

            }


            desktopPreview.src =
                URL.createObjectURL(file);

            desktopPreviewContainer.classList.remove('d-none');

        });

    }


    /* ============================================================
       MOBILE IMAGE PREVIEW
    ============================================================ */

    const mobileImage =
        document.getElementById('mobileImage');

    const mobilePreview =
        document.getElementById('mobilePreview');

    const mobilePreviewContainer =
        document.getElementById('mobilePreviewContainer');


    if (mobileImage) {

        mobileImage.addEventListener('change', function () {

            const file = this.files[0];


            if (!file) {

                mobilePreviewContainer.classList.add('d-none');

                mobilePreview.src = '';

                return;

            }


            mobilePreview.src =
                URL.createObjectURL(file);

            mobilePreviewContainer.classList.remove('d-none');

        });

    }


});

</script>

@endsection