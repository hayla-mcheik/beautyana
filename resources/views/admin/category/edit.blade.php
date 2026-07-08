@extends('layouts.admin')

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | Status State
    |--------------------------------------------------------------------------
    |
    | Database:
    |
    | 0 = Visible
    | 1 = Hidden
    |
    | On validation error:
    | use the previously submitted checkbox value.
    |
    */

    $statusChecked = old('form_submitted')
        ? old('status') == '1'
        : $category->status == '0';


    /*
    |--------------------------------------------------------------------------
    | Back URL
    |--------------------------------------------------------------------------
    |
    | Return admin to the categories page
    | filtered by the current category menu.
    |
    */

    $backUrl =
        url('admin/category')
        . '?menu='
        . urlencode($category->menu);

@endphp


<div class="row">

    <div class="col-md-12">

        <div class="card category-edit-card shadow-sm border-0">


            {{-- ============================================================
                 HEADER
            ============================================================ --}}

            <div class="card-header bg-white border-bottom py-3">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">


                    {{-- HEADER TEXT --}}

                    <div>

                        <h4 class="mb-1 fw-semibold">

                            Edit Category

                        </h4>


                        <p class="text-muted mb-0">

                            Update

                            <strong>{{ $category->name }}</strong>

                            from the

                            <strong>{{ $category->menu }}</strong>

                            menu.

                        </p>

                    </div>


                    {{-- BACK BUTTON --}}

                    <a
                        href="{{ $backUrl }}"
                        class="btn btn-outline-danger btn-sm"
                    >

                        <i class="mdi mdi-arrow-left"></i>

                        Back

                    </a>

                </div>

            </div>



            {{-- ============================================================
                 CARD BODY
            ============================================================ --}}

            <div class="card-body p-4">


                <form
                    action="{{ url('admin/category/' . $category->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf

                    @method('PUT')


                    {{--
                        Used to know whether the form was submitted.

                        This is important because an unchecked checkbox
                        is not sent in the HTTP request.
                    --}}

                    <input
                        type="hidden"
                        name="form_submitted"
                        value="1"
                    >



                    <div class="row g-4">


                        {{-- =================================================
                             MENU
                        ================================================= --}}

                        <div class="col-md-12">

                            <label class="form-label fw-semibold">

                                Menu

                            </label>


                            {{--
                                Hidden field is REQUIRED.

                                Disabled inputs are not submitted.

                                This guarantees the menu is sent
                                to the controller.
                            --}}

                            <input
                                type="hidden"
                                name="menu"
                                value="{{ $category->menu }}"
                            >


                            <div class="locked-menu-box">

                                <div class="locked-menu-content">


                                    {{-- ICON --}}

                                    <div class="menu-icon-box">

                                        <i class="mdi mdi-lock-outline"></i>

                                    </div>



                                    {{-- INFORMATION --}}

                                    <div>

                                        <div class="fw-semibold menu-name">

                                            {{ $category->menu }}

                                        </div>


                                        <small class="text-muted">

                                            The menu is locked and cannot be changed from this page.

                                        </small>

                                    </div>

                                </div>

                            </div>


                            @error('menu')

                                <div class="text-danger small mt-1">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        {{-- =================================================
                             CATEGORY NAME
                        ================================================= --}}

                        <div class="col-lg-6">

                            <label
                                for="categoryName"
                                class="form-label fw-semibold"
                            >

                                Category Name

                                <span class="text-danger">*</span>

                            </label>


                            <input
                                type="text"
                                id="categoryName"
                                name="name"
                                value="{{ old('name', $category->name) }}"
                                class="
                                    form-control
                                    @error('name') is-invalid @enderror
                                "
                                placeholder="Example: Diamond Rings"
                            >


                            <small class="text-muted">

                                Changing the name automatically updates the slug.

                            </small>


                            @error('name')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        {{-- =================================================
                             CATEGORY IMAGE
                        ================================================= --}}

                        <div class="col-lg-6">

                            <label
                                for="categoryImage"
                                class="form-label fw-semibold"
                            >

                                Category Image

                            </label>


                            <input
                                type="file"
                                id="categoryImage"
                                name="image"
                                accept="image/*"
                                class="
                                    form-control
                                    @error('image') is-invalid @enderror
                                "
                            >


                            <small class="text-muted">

                                Leave empty to keep the current image.

                            </small>


                            @error('image')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror



                            {{-- CURRENT IMAGE --}}

                            @if($category->image)

                                <div class="current-image-box mt-3">


                                    <div class="current-image-preview">

                                        <img
                                            src="{{ asset($category->image) }}"
                                            alt="{{ $category->name }}"
                                        >

                                    </div>


                                    <div class="current-image-info">

                                        <div class="fw-semibold">

                                            Current Image

                                        </div>


                                        <small class="text-muted">

                                            Upload another image to replace it.

                                        </small>

                                    </div>

                                </div>

                            @endif

                        </div>



                        {{-- =================================================
                             CATEGORY VISIBILITY
                        ================================================= --}}

                        <div class="col-md-12">

                            <div class="status-card">


                                <div class="status-content">


                                    {{-- LEFT SIDE --}}

                                    <div class="status-info">


                                        {{-- ICON --}}

                                        <div class="status-icon">

                                            <i class="mdi mdi-eye-outline"></i>

                                        </div>



                                        {{-- STATUS INFORMATION --}}

                                        <div class="status-text">

                                            <h6 class="mb-1 fw-semibold">

                                                Category Visibility

                                            </h6>


                                            <p
                                                class="text-muted mb-0"
                                                id="statusDescription"
                                            ></p>

                                        </div>

                                    </div>



                                    {{-- RIGHT SIDE --}}

                                    <div class="status-actions">


                                        {{-- STATUS BADGE --}}

                                        <span
                                            id="statusBadge"
                                            class="badge"
                                        ></span>



                                        {{-- STATUS SWITCH --}}

                                        <div class="status-switch-wrapper">


                                            <input
                                                type="checkbox"
                                                name="status"
                                                value="1"
                                                class="
                                                    form-check-input
                                                    category-status-switch
                                                "
                                                id="status"
                                                {{ $statusChecked ? 'checked' : '' }}
                                            >


                                            <label
                                                class="status-switch-label"
                                                for="status"
                                            >

                                                Visible on Website

                                            </label>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        {{-- =================================================
                             ACTION BUTTONS
                        ================================================= --}}

                        <div class="col-md-12">

                            <div class="form-actions">


                                {{-- CANCEL --}}

                                <a
                                    href="{{ $backUrl }}"
                                    class="btn btn-light px-4"
                                >

                                    Cancel

                                </a>



                                {{-- UPDATE --}}

                                <button
                                    type="submit"
                                    class="btn btn-primary px-4"
                                >

                                    <i class="mdi mdi-content-save-edit-outline me-1"></i>

                                    Update Category

                                </button>

                            </div>

                        </div>


                    </div>

                </form>

            </div>

        </div>

    </div>

</div>



{{-- ================================================================
     STYLES
================================================================ --}}

<style>


/*
|--------------------------------------------------------------------------
| MAIN CARD
|--------------------------------------------------------------------------
*/

.category-edit-card {

    overflow: hidden;

}



/*
|--------------------------------------------------------------------------
| FORM LABELS
|--------------------------------------------------------------------------
*/

.form-label {

    margin-bottom: 7px;

}



/*
|--------------------------------------------------------------------------
| LOCKED MENU
|--------------------------------------------------------------------------
*/

.locked-menu-box {

    padding: 15px 17px;

    border: 1px solid #dee2e6;

    border-radius: 9px;

    background: #f8f9fa;

}


.locked-menu-content {

    display: flex;

    align-items: center;

}


.menu-icon-box {

    width: 44px;

    height: 44px;

    min-width: 44px;


    display: flex;

    align-items: center;

    justify-content: center;


    margin-right: 14px;


    border-radius: 8px;


    background: #eef1f4;


    font-size: 22px;

}


.menu-name {

    font-size: 16px;

}



/*
|--------------------------------------------------------------------------
| CURRENT IMAGE
|--------------------------------------------------------------------------
*/

.current-image-box {

    display: flex;

    align-items: center;


    gap: 14px;


    padding: 12px;


    border: 1px solid #dee2e6;

    border-radius: 9px;


    background: #f8f9fa;

}


.current-image-preview {

    width: 75px;

    height: 75px;


    min-width: 75px;


    display: flex;

    align-items: center;

    justify-content: center;


    overflow: hidden;


    border-radius: 7px;


    background: #ffffff;

}


.current-image-preview img {

    width: 100%;

    height: 100%;


    object-fit: contain;

}


.current-image-info {

    min-width: 0;

}



/*
|--------------------------------------------------------------------------
| STATUS CARD
|--------------------------------------------------------------------------
*/

.status-card {

    padding: 18px 20px;


    border: 1px solid #dee2e6;

    border-radius: 10px;


    background: #fafafa;

}



/*
|--------------------------------------------------------------------------
| STATUS MAIN LAYOUT
|--------------------------------------------------------------------------
*/

.status-content {

    display: flex;


    align-items: center;

    justify-content: space-between;


    gap: 30px;

}



/*
|--------------------------------------------------------------------------
| STATUS LEFT SIDE
|--------------------------------------------------------------------------
*/

.status-info {

    display: flex;

    align-items: center;


    min-width: 0;

}


.status-icon {

    width: 44px;

    height: 44px;


    min-width: 44px;


    display: flex;

    align-items: center;

    justify-content: center;


    margin-right: 14px;


    border-radius: 8px;


    background: #eef1f4;


    font-size: 22px;

}


.status-text {

    min-width: 0;

}



/*
|--------------------------------------------------------------------------
| STATUS RIGHT SIDE
|--------------------------------------------------------------------------
*/

.status-actions {

    display: flex;

    align-items: center;


    gap: 25px;


    flex-shrink: 0;

}



/*
|--------------------------------------------------------------------------
| STATUS BADGE
|--------------------------------------------------------------------------
*/

.status-actions .badge {

    min-width: 70px;


    padding: 7px 12px;


    text-align: center;


    font-size: 12px;

}



/*
|--------------------------------------------------------------------------
| STATUS SWITCH WRAPPER
|--------------------------------------------------------------------------
*/

.status-switch-wrapper {

    display: flex;

    align-items: center;


    gap: 12px;


    margin: 0;

}



/*
|--------------------------------------------------------------------------
| STATUS SWITCH
|--------------------------------------------------------------------------
*/

.category-status-switch {

    width: 2.8em !important;

    height: 1.4em;


    margin: 0 !important;


    float: none !important;


    cursor: pointer;

}



/*
|--------------------------------------------------------------------------
| STATUS LABEL
|--------------------------------------------------------------------------
*/

.status-switch-label {

    margin: 0;


    font-weight: 600;


    white-space: nowrap;


    cursor: pointer;

}



/*
|--------------------------------------------------------------------------
| FORM ACTIONS
|--------------------------------------------------------------------------
*/

.form-actions {

    display: flex;

    align-items: center;

    justify-content: flex-end;


    gap: 10px;


    padding-top: 20px;


    border-top: 1px solid #dee2e6;

}



/*
|--------------------------------------------------------------------------
| TABLET
|--------------------------------------------------------------------------
*/

@media (max-width: 768px) {


    .status-content {

        flex-direction: column;


        align-items: flex-start;


        gap: 18px;

    }


    .status-actions {

        width: 100%;


        justify-content: space-between;


        padding-left: 58px;

    }


}



/*
|--------------------------------------------------------------------------
| MOBILE
|--------------------------------------------------------------------------
*/

@media (max-width: 480px) {


    .card-body {

        padding: 18px !important;

    }


    .locked-menu-content {

        align-items: flex-start;

    }


    .status-card {

        padding: 16px;

    }


    .status-info {

        align-items: flex-start;

    }


    .status-actions {

        width: 100%;


        padding-left: 0;


        flex-direction: column;


        align-items: flex-start;


        gap: 15px;

    }


    .status-switch-wrapper {

        width: 100%;

    }


    .form-actions {

        flex-direction: column-reverse;

    }


    .form-actions .btn {

        width: 100%;

    }


    .current-image-preview {

        width: 65px;

        height: 65px;


        min-width: 65px;

    }


}


</style>



{{-- ================================================================
     STATUS JAVASCRIPT
================================================================ --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    /*
    |--------------------------------------------------------------------------
    | ELEMENTS
    |--------------------------------------------------------------------------
    */

    const statusSwitch =
        document.getElementById('status');


    const statusBadge =
        document.getElementById('statusBadge');


    const statusDescription =
        document.getElementById('statusDescription');



    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS UI
    |--------------------------------------------------------------------------
    */

    function updateStatusDisplay() {


        /*
         * CHECKED
         *
         * Database value after submit:
         *
         * 0 = Visible
         */

        if (statusSwitch.checked) {


            statusBadge.textContent =
                'Visible';


            statusBadge.className =
                'badge bg-success';


            statusDescription.textContent =
                'This category is visible to customers.';


        }


        /*
         * UNCHECKED
         *
         * Database value after submit:
         *
         * 1 = Hidden
         */

        else {


            statusBadge.textContent =
                'Hidden';


            statusBadge.className =
                'badge bg-secondary';


            statusDescription.textContent =
                'This category is hidden from customers.';


        }

    }



    /*
    |--------------------------------------------------------------------------
    | LISTEN FOR SWITCH CHANGE
    |--------------------------------------------------------------------------
    */

    statusSwitch.addEventListener(
        'change',
        updateStatusDisplay
    );



    /*
    |--------------------------------------------------------------------------
    | INITIALIZE UI
    |--------------------------------------------------------------------------
    */

    updateStatusDisplay();


});

</script>

@endsection