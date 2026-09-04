@extends('layouts.admin')

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | Selected Menu
    |--------------------------------------------------------------------------
    */

    $selectedMenu = request('menu');

    $allowedMenus = [
        'Collections',
        'Accessories',
        'OnSale',
    ];

    if (!in_array($selectedMenu, $allowedMenus, true)) {
        $selectedMenu = null;
    }


    /*
    |--------------------------------------------------------------------------
    | Status State
    |--------------------------------------------------------------------------
    |
    | First page load:
    | Checked = Visible
    |
    | Validation error:
    | Restore submitted checkbox state.
    |
    | Database:
    | 0 = Visible
    | 1 = Hidden
    |
    */

    $statusChecked = old('form_submitted')
        ? old('status') == '1'
        : true;


    /*
    |--------------------------------------------------------------------------
    | Back URL
    |--------------------------------------------------------------------------
    */

    $backUrl = $selectedMenu
        ? url('admin/category') . '?menu=' . urlencode($selectedMenu)
        : url('admin/category');

@endphp


<div class="row">

    <div class="col-md-12">

        <div class="card category-create-card shadow-sm border-0">


            {{-- ============================================================
                 HEADER
            ============================================================ --}}

            <div class="card-header bg-white border-bottom py-3">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">


                    <div>

                        <h4 class="mb-1 fw-semibold">

                            @if($selectedMenu)

                                Add Category

                            @else

                                Add Category

                            @endif

                        </h4>


                        <p class="text-muted mb-0">

                            @if($selectedMenu)

                                Add a new category to the

                                <strong>{{ $selectedMenu }}</strong>

                                menu.

                            @else

                                Create a new category and configure its visibility.

                            @endif

                        </p>

                    </div>


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
                 BODY
            ============================================================ --}}

            <div class="card-body p-4">


                <form
                    action="{{ url('admin/category') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf


                    {{--
                        Allows us to know whether the form
                        has already been submitted.

                        Required because unchecked checkboxes
                        are not included in the HTTP request.
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


                            @if($selectedMenu)


                                {{--
                                    Menu came from sidebar/category page.

                                    Keep it locked.

                                    Hidden input is required because
                                    disabled fields are not submitted.
                                --}}

                                <input
                                    type="hidden"
                                    name="menu"
                                    value="{{ $selectedMenu }}"
                                >


                                <div class="locked-menu-box">

                                    <div class="locked-menu-content">


                                        <div class="menu-icon-box">

                                            <i class="mdi mdi-lock-outline"></i>

                                        </div>


                                        <div>

                                            <div class="fw-semibold menu-name">

                                                {{ $selectedMenu }}

                                            </div>


                                            <small class="text-muted">

                                                The menu is selected automatically and cannot be changed from this page.

                                            </small>

                                        </div>


                                    </div>

                                </div>


                            @else


                                <select
                                    name="menu"
                                    class="
                                        form-select
                                        @error('menu') is-invalid @enderror
                                    "
                                >

                                    <option value="">

                                        Select a Menu

                                    </option>


                                    @foreach($allowedMenus as $menu)

                                        <option
                                            value="{{ $menu }}"
                                            {{ old('menu') == $menu ? 'selected' : '' }}
                                        >

                                            {{ $menu }}

                                        </option>

                                    @endforeach


                                </select>


                                <small class="text-muted">

                                    Choose where this category should appear on the website.

                                </small>


                            @endif


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
                                value="{{ old('name') }}"
                                class="
                                    form-control
                                    @error('name') is-invalid @enderror
                                "
                                placeholder="Example: Diamond Rings"
                                autocomplete="off"
                            >


                            <small class="text-muted">

                                The URL slug will be generated automatically.

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

                                Upload a clear image representing this category.

                            </small>


                            @error('image')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                            {{-- IMAGE PREVIEW --}}

                            <div
                                id="imagePreviewBox"
                                class="image-preview-box mt-3 d-none"
                            >

                                <div class="image-preview">

                                    <img
                                        id="imagePreview"
                                        src=""
                                        alt="Selected category image"
                                    >

                                </div>


                                <div class="image-preview-info">

                                    <div class="fw-semibold">

                                        Selected Image

                                    </div>


                                    <small class="text-muted">

                                        This image will be used for the category.

                                    </small>

                                </div>

                            </div>

                        </div>



                        {{-- =================================================
                             CATEGORY VISIBILITY
                        ================================================= --}}

                        <div class="col-md-12">

                            <div class="status-card">


                                <div class="status-content">


                                    {{-- LEFT SIDE --}}

                                    <div class="status-info">


                                        <div class="status-icon">

                                            <i class="mdi mdi-eye-outline"></i>

                                        </div>


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


                                        <span
                                            id="statusBadge"
                                            class="badge"
                                        ></span>


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


                                <a
                                    href="{{ $backUrl }}"
                                    class="btn btn-light px-4"
                                >

                                    Cancel

                                </a>


                                <button
                                    type="submit"
                                    class="btn btn-primary px-4"
                                >

                                    <i class="mdi mdi-content-save-outline me-1"></i>


                                    @if($selectedMenu)

                                        Add Category

                                    @else

                                        Save Category

                                    @endif


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

.category-create-card {
    overflow: hidden;
}

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
| IMAGE PREVIEW
|--------------------------------------------------------------------------
*/

.image-preview-box {
    display: flex;
    align-items: center;
    gap: 14px;

    padding: 12px;

    border: 1px solid #dee2e6;
    border-radius: 9px;

    background: #f8f9fa;
}

.image-preview {
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

.image-preview img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.image-preview-info {
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
| SWITCH WRAPPER
|--------------------------------------------------------------------------
*/

.status-switch-wrapper {
    display: flex;
    align-items: center;

    gap: 12px;
}


/*
|--------------------------------------------------------------------------
| SWITCH
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
| SWITCH LABEL
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
| ACTIONS
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

    .image-preview {
        width: 65px;
        height: 65px;
        min-width: 65px;
    }

}

</style>



{{-- ================================================================
     JAVASCRIPT
================================================================ --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    /*
    |--------------------------------------------------------------------------
    | STATUS ELEMENTS
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
    | UPDATE STATUS
    |--------------------------------------------------------------------------
    */

    function updateStatusDisplay() {

        if (statusSwitch.checked) {

            statusBadge.textContent =
                'Visible';

            statusBadge.className =
                'badge bg-success';

            statusDescription.textContent =
                'This category will be visible to customers.';

        } else {

            statusBadge.textContent =
                'Hidden';

            statusBadge.className =
                'badge bg-secondary';

            statusDescription.textContent =
                'This category will not appear to customers.';

        }

    }


    statusSwitch.addEventListener(
        'change',
        updateStatusDisplay
    );

    updateStatusDisplay();



    /*
    |--------------------------------------------------------------------------
    | IMAGE PREVIEW
    |--------------------------------------------------------------------------
    */

    const categoryImage =
        document.getElementById('categoryImage');

    const imagePreviewBox =
        document.getElementById('imagePreviewBox');

    const imagePreview =
        document.getElementById('imagePreview');


    categoryImage.addEventListener(
        'change',

        function (event) {

            const file =
                event.target.files[0];

            if (!file) {

                imagePreview.src = '';

                imagePreviewBox.classList.add('d-none');

                return;
            }


            const reader =
                new FileReader();


            reader.onload = function (e) {

                imagePreview.src =
                    e.target.result;

                imagePreviewBox.classList.remove('d-none');

            };


            reader.readAsDataURL(file);

        }
    );


});

</script>

@endsection