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


        {{-- HEADER --}}
        <div class="card-header bg-white border-bottom px-4 py-3">

            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3">

                <div>

                    <h4 class="mb-1 fw-bold">
                        Add New Slider
                    </h4>

                    <p class="text-muted mb-0">
                        Create a new slider for the homepage hero section.
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



        {{-- BODY --}}
        <div class="card-body p-4">

            <form
                action="{{ url('admin/sliders/create') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf


                {{-- TITLE --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Slider Title

                        <span class="text-danger">*</span>

                    </label>


                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        class="form-control @error('title') is-invalid @enderror"
                        placeholder="Example: Timeless Elegance">


                    <small class="form-text text-muted">
                        This title will appear as the main heading on the slider.
                    </small>


                    @error('title')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                {{-- DESCRIPTION --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Slider Description
                    </label>


                    <textarea
                        name="description"
                        rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Write a short description for this slider...">{{ old('description') }}</textarea>


                    <small class="form-text text-muted">
                        Keep the description short and clear for the homepage banner.
                    </small>


                    @error('description')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                {{-- IMAGE --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Slider Image

                        <span class="text-danger">*</span>

                    </label>


                    <div class="slider-upload-card">


                        <div class="slider-upload-icon">

                            <i class="mdi mdi-image-plus"></i>

                        </div>


                        <div class="slider-upload-content">

                            <input
                                type="file"
                                name="image"
                                id="sliderImage"
                                accept="image/*"
                                class="form-control @error('image') is-invalid @enderror">


                            <small class="text-muted d-block mt-2">

                                Upload a high-quality landscape image suitable for the homepage hero slider.

                            </small>


                            @error('image')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror


                            {{-- Image Preview --}}

                            <div
                                id="imagePreviewContainer"
                                class="image-preview-container d-none">

                                <img
                                    src=""
                                    id="imagePreview"
                                    alt="Slider Preview">

                            </div>


                        </div>

                    </div>

                </div>



                {{-- VISIBILITY --}}
                <div class="mb-4">

                    <div
                        id="visibilityCard"
                        class="slider-visibility-card">


                        {{-- LEFT SIDE --}}

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

                                    This slider will be visible on the website.

                                </p>

                            </div>


                        </div>



                        {{-- RIGHT SIDE --}}

                        <div class="visibility-control">


                            {{--
                                Database:

                                0 = Visible
                                1 = Hidden
                            --}}


                            <input
                                type="hidden"
                                name="status"
                                id="statusValue"
                                value="{{ old('status', '0') }}">



                            <div class="form-check form-switch custom-visibility-switch">


                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="visibilitySwitch"

                                    {{ old('status', '0') == '0'
                                        ? 'checked'
                                        : ''
                                    }}>


                                <label
                                    class="form-check-label"
                                    id="statusLabel"
                                    for="visibilitySwitch">

                                    Visible on Website

                                </label>


                            </div>


                        </div>


                    </div>

                </div>



                {{-- ACTIONS --}}
                <div class="slider-form-actions">

                    <a
                        href="{{ url('admin/sliders') }}"
                        class="btn btn-light px-4">

                        Cancel

                    </a>


                    <button
                        type="submit"
                        class="btn btn-primary px-4">

                        <i class="mdi mdi-content-save-outline me-1"></i>

                        Save Slider

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>



<style>

.slider-form-card {
    border-radius: 10px;
    overflow: hidden;
}


/*
|--------------------------------------------------------------------------
| Upload Card
|--------------------------------------------------------------------------
*/

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

    background: #eef3ff;

    color: #4b7bec;

    font-size: 25px;

}


.slider-upload-content {

    flex: 1;

    min-width: 0;

}



/*
|--------------------------------------------------------------------------
| Image Preview
|--------------------------------------------------------------------------
*/

.image-preview-container {

    width: 100%;

    max-width: 500px;

    height: 220px;

    margin-top: 18px;

    border-radius: 10px;

    overflow: hidden;

    border: 1px solid #ddd;

    background: #fff;

}


.image-preview-container img {

    width: 100%;

    height: 100%;

    display: block;

    object-fit: cover;

}



/*
|--------------------------------------------------------------------------
| Visibility Card
|--------------------------------------------------------------------------
*/

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



/*
|--------------------------------------------------------------------------
| Actions
|--------------------------------------------------------------------------
*/

.slider-form-actions {

    display: flex;

    align-items: center;

    justify-content: flex-end;

    gap: 12px;

    padding-top: 24px;

    margin-top: 30px;

    border-top: 1px solid #e1e5eb;

}



/*
|--------------------------------------------------------------------------
| Mobile
|--------------------------------------------------------------------------
*/

@media (max-width: 768px) {

    .slider-upload-card {

        flex-direction: column;

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


            // Visible

            statusValue.value = '0';


            statusLabel.textContent =
                'Visible on Website';


            statusDescription.textContent =
                'This slider will be displayed on the website.';


            visibilityIcon.className =
                'mdi mdi-eye-outline';


        } else {


            // Hidden

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



    /*
    |--------------------------------------------------------------------------
    | Image Preview
    |--------------------------------------------------------------------------
    */


    const imageInput =
        document.getElementById('sliderImage');


    const imagePreview =
        document.getElementById('imagePreview');


    const imagePreviewContainer =
        document.getElementById('imagePreviewContainer');


    imageInput.addEventListener('change', function () {


        const file = this.files[0];


        if (!file) {

            imagePreview.src = '';

            imagePreviewContainer.classList.add('d-none');

            return;

        }


        imagePreview.src =
            URL.createObjectURL(file);


        imagePreviewContainer.classList.remove('d-none');

    });


});

</script>

@endsection