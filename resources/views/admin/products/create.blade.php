@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        {{-- PAGE HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="mb-1">
                    <i class="mdi mdi-package-variant-closed"></i>
                    Add New Product
                </h3>

                <p class="text-muted mb-0">
                    Complete the product information, pricing, stock, visibility and images.
                </p>
            </div>

            <a href="{{ url('admin/products') }}"
               class="btn btn-outline-secondary">

                <i class="mdi mdi-arrow-left"></i>
                Back to Products

            </a>

        </div>


        {{-- VALIDATION ERRORS --}}

        @if($errors->any())

            <div class="alert alert-danger">

                <h6 class="mb-2">
                    <i class="mdi mdi-alert-circle-outline"></i>
                    Please correct the following errors:
                </h6>

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        @if(session('error'))

            <div class="alert alert-danger">

                {{ session('error') }}

            </div>

        @endif



        <form
            action="{{ url('admin/products') }}"
            method="POST"
            enctype="multipart/form-data"
            id="productForm"
        >

            @csrf


            {{-- ========================================================= --}}
            {{-- PRODUCT INFORMATION --}}
            {{-- ========================================================= --}}

            <div class="card shadow-sm mb-4">

                <div class="card-header bg-white">

                    <h5 class="mb-1">

                        <i class="mdi mdi-information-outline"></i>

                        Product Information

                    </h5>

                    <small class="text-muted">

                        Select where the product appears and enter its main information.

                    </small>

                </div>


                <div class="card-body">

                    <div class="row">


                        {{-- CATEGORY --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">

                                Category

                                <span class="text-danger">*</span>

                            </label>


                            <select
                                name="category_id"
                                class="form-control @error('category_id') is-invalid @enderror"
                                required
                            >

                                <option value="">

                                    Select Product Category

                                </option>


                                @foreach ($categories as $category)

                                    <option
                                        value="{{ $category->id }}"

                                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                                    >

                                        {{ $category->menu }}
                                        →
                                        {{ $category->name }}

                                    </option>

                                @endforeach

                            </select>


                            <small class="text-muted">

                                The first name is the website menu and the second is the category.

                            </small>


                            @error('category_id')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        {{-- PRODUCT NAME --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">

                                Product Name

                                <span class="text-danger">*</span>

                            </label>


                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Example: Diamond Tennis Bracelet"
                                required
                            >


                            <small class="text-muted">

                                The product URL slug will be generated automatically.

                            </small>


                            @error('name')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        {{-- DESCRIPTION --}}

                        <div class="col-md-12 mb-3">

                            <label class="form-label fw-semibold">

                                Product Description

                                <span class="text-danger">*</span>

                            </label>


                            <textarea
                                name="description"
                                rows="6"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Enter product material, design, size, collection information and other useful details..."
                            >{{ old('description') }}</textarea>


                            @error('description')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                    </div>

                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- PRICING AND INVENTORY --}}
            {{-- ========================================================= --}}

            <div class="card shadow-sm mb-4">

                <div class="card-header bg-white">

                    <h5 class="mb-1">

                        <i class="mdi mdi-cash-multiple"></i>

                        Pricing & Inventory

                    </h5>

                    <small class="text-muted">

                        Enter product prices and available stock quantity.

                    </small>

                </div>


                <div class="card-body">

                    <div class="row">


                        {{-- ORIGINAL PRICE --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label fw-semibold">

                                Original Price

                                <span class="text-danger">*</span>

                            </label>


                            <div class="input-group">

                                <span class="input-group-text">

                                    $

                                </span>


                                <input
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    name="original_price"
                                    value="{{ old('original_price') }}"
                                    class="form-control @error('original_price') is-invalid @enderror"
                                    placeholder="0.00"
                                >

                            </div>


                            <small class="text-muted">

                                Price before discount.

                            </small>


                            @error('original_price')

                                <div class="text-danger small mt-1">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        {{-- SELLING PRICE --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label fw-semibold">

                                Selling Price

                                <span class="text-danger">*</span>

                            </label>


                            <div class="input-group">

                                <span class="input-group-text">

                                    $

                                </span>


                                <input
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    name="selling_price"
                                    value="{{ old('selling_price') }}"
                                    class="form-control @error('selling_price') is-invalid @enderror"
                                    placeholder="0.00"
                                >

                            </div>


                            <small class="text-muted">

                                Current price displayed to customers.

                            </small>


                            @error('selling_price')

                                <div class="text-danger small mt-1">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        {{-- QUANTITY --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label fw-semibold">

                                Stock Quantity

                                <span class="text-danger">*</span>

                            </label>


                            <input
                                type="number"
                                min="0"
                                name="quantity"
                                value="{{ old('quantity', 0) }}"
                                class="form-control @error('quantity') is-invalid @enderror"
                            >


                            <small class="text-muted">

                                Total available product quantity.

                            </small>


                            @error('quantity')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                    </div>

                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- PRODUCT VISIBILITY --}}
            {{-- ========================================================= --}}

            <div class="card shadow-sm mb-4">

                <div class="card-header bg-white">

                    <h5 class="mb-1">

                        <i class="mdi mdi-eye-outline"></i>

                        Product Visibility

                    </h5>

                    <small class="text-muted">

                        Control where the product appears on the website.

                    </small>

                </div>


                <div class="card-body">


                    <div class="row">


                        {{-- TRENDING --}}

                        {{-- <div class="col-md-4 mb-3">

                            <div class="setting-option">

                                <div>

                                    <h6 class="mb-1">

                                        Trending Product

                                    </h6>

                                    <small class="text-muted">

                                        Show this product in the Trending section.

                                    </small>

                                </div>


                                <div class="form-check form-switch">

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="trending"
                                        value="1"
                                        id="trending"

                                        {{ old('trending') ? 'checked' : '' }}
                                    >

                                </div>

                            </div>

                        </div> --}}



                        {{-- FEATURED --}}

                        <div class="col-md-4 mb-3">

                            <div class="setting-option">

                                <div>

                                    <h6 class="mb-1">

                                        Featured Product

                                    </h6>

                                    <small class="text-muted">

                                        Highlight this product as a featured item.

                                    </small>

                                </div>


                                <div class="form-check form-switch">

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="featured"
                                        value="1"
                                        id="featured"

                                        {{ old('featured') ? 'checked' : '' }}
                                    >

                                </div>

                            </div>

                        </div>



                        {{-- STATUS --}}

                        <div class="col-md-4 mb-3">

                            <div class="setting-option">

                                <div>

                                    <h6 class="mb-1">

                                        Product Visible

                                    </h6>

                                    <small class="text-muted">

                                        Enable to display the product to customers.

                                    </small>

                                </div>


                                <div class="form-check form-switch">

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="status"
                                        value="1"
                                        id="status"

                                        {{ old('status', true) ? 'checked' : '' }}
                                    >

                                </div>

                            </div>

                        </div>


                    </div>


                    <div class="alert alert-light border mb-0">

                        <strong>Visibility explanation:</strong>

                        Trending adds the product to your Trending section.

                        Featured highlights the product in featured areas.

                        Product Visible controls whether customers can see the product.

                    </div>


                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- PRODUCT IMAGES --}}
            {{-- ========================================================= --}}

            <div class="card shadow-sm mb-4">

                <div class="card-header bg-white">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="mb-1">

                                <i class="mdi mdi-image-multiple-outline"></i>

                                Product Images

                            </h5>

                            <small class="text-muted">

                             Upload one or more product images.

                            </small>

                        </div>


                        <span
                            id="imageCountBadge"
                            class="badge bg-secondary"
                        >

                            0 images selected

                        </span>

                    </div>

                </div>


                <div class="card-body">


                    <div class="alert alert-info">

                        <strong>

                            Image Requirements

                        </strong>

                        <div class="mt-1">

                    Upload at least one image.
The first selected image will be used as the primary product image.
You can upload additional images if you wish.

                        </div>

                    </div>



                    {{-- UPLOAD AREA --}}

                    <div
                        class="product-upload-area"
                        onclick="document.getElementById('productImages').click()"
                    >

                        <i class="mdi mdi-cloud-upload-outline upload-icon"></i>


                        <h5>

                            Select Product Images

                        </h5>


                        <p class="text-muted mb-2">

                            Click here to browse your device.

                        </p>


                        <button
                            type="button"
                            class="btn btn-outline-primary"
                        >

                            <i class="mdi mdi-folder-open-outline"></i>

                            Browse Images

                        </button>


                        <input
                            type="file"
                            name="image[]"
                            multiple
                            id="productImages"
                            accept="image/*"
                            class="d-none"
                        >

                    </div>



                    @error('image')

                        <div class="text-danger mt-2">

                            {{ $message }}

                        </div>

                    @enderror


                    @error('image.*')

                        <div class="text-danger mt-2">

                            {{ $message }}

                        </div>

                    @enderror



                    {{-- PROGRESS --}}

                    <div class="mt-4">

                        <div class="d-flex justify-content-between">

                            <small>

                                Minimum image requirement

                            </small>


                            <small id="imageRequirementText">

                                0 / 1

                            </small>

                        </div>


                        <div
                            class="progress mt-2"
                            style="height: 8px;"
                        >

                            <div
                                id="imageProgressBar"
                                class="progress-bar"
                                style="width: 0%;"
                            ></div>

                        </div>

                    </div>



                    {{-- IMAGE MESSAGE --}}

                    <div
                        id="imageRequirements"
                        class="alert alert-warning mt-3"
                    >

                        <i class="mdi mdi-alert-outline"></i>

                        <span id="requirementMessage">

                            Please select at least 2 images.

                        </span>

                    </div>



                    {{-- IMAGE PREVIEW --}}

                    <div
                        id="imagePreview"
                        class="row mt-4"
                    ></div>


                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- ACTION BUTTONS --}}
            {{-- ========================================================= --}}

            <div class="card shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">


                        <a
                            href="{{ url('admin/products') }}"
                            class="btn btn-outline-secondary"
                        >

                            Cancel

                        </a>



                        <div>


                            <button
                                type="reset"
                                class="btn btn-light me-2"
                            >

                                <i class="mdi mdi-refresh"></i>

                                Reset Form

                            </button>


                            <button
                                type="submit"
                                class="btn btn-primary"
                                id="submitBtn"
                                disabled
                            >

                                <i class="mdi mdi-content-save-outline"></i>

                                Save Product

                            </button>


                        </div>


                    </div>

                </div>

            </div>


        </form>

    </div>
</div>


@endsection



@section('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {


    const productImages =
        document.getElementById('productImages');


    const imagePreview =
        document.getElementById('imagePreview');


    const imageCountBadge =
        document.getElementById('imageCountBadge');


    const imageProgressBar =
        document.getElementById('imageProgressBar');


    const imageRequirements =
        document.getElementById('imageRequirements');


    const requirementMessage =
        document.getElementById('requirementMessage');


    const imageRequirementText =
        document.getElementById('imageRequirementText');


    const submitBtn =
        document.getElementById('submitBtn');


    const form =
        document.getElementById('productForm');



    let allSelectedFiles = [];



    /*
    |--------------------------------------------------------------------------
    | Update Actual File Input
    |--------------------------------------------------------------------------
    */

    function updateFileInput()
    {
        const dataTransfer =
            new DataTransfer();


        allSelectedFiles.forEach(function (file) {

            dataTransfer.items.add(file);

        });


        productImages.files =
            dataTransfer.files;
    }



    /*
    |--------------------------------------------------------------------------
    | Update Image Requirement UI
    |--------------------------------------------------------------------------
    */

    function updateImageCount()
    {
        const count =
            allSelectedFiles.length;


        imageCountBadge.textContent =
            count
            + ' image'
            + (count !== 1 ? 's' : '')
            + ' selected';


        imageRequirementText.textContent =
      Math.min(count, 1) + ' / 1';


        const progress =
            Math.min(
               (count / 1) * 100,
                100
            );


        imageProgressBar.style.width =
            progress + '%';



        if (count < 1)
        {
            imageCountBadge.className =
                'badge bg-danger';


            imageProgressBar.className =
                'progress-bar bg-danger';


            imageRequirements.classList.remove(
                'd-none'
            );


            requirementMessage.textContent =
             'Please select at least one image.'
                + ((2 - count) !== 1 ? 's' : '')
                + '.';


            submitBtn.disabled =
                true;
        }
        else
        {
            imageCountBadge.className =
                'badge bg-success';


            imageProgressBar.className =
                'progress-bar bg-success';


            imageRequirements.classList.add(
                'd-none'
            );


            submitBtn.disabled =
                false;
        }
    }



    /*
    |--------------------------------------------------------------------------
    | Render Image Previews
    |--------------------------------------------------------------------------
    */

    function refreshImagePreview()
    {
        imagePreview.innerHTML = '';


        allSelectedFiles.forEach(

            function (file, index)
            {

                const reader =
                    new FileReader();


                reader.onload =
                    function (event)
                    {

                        const column =
                            document.createElement('div');


                        column.className =
                            'col-xl-3 col-lg-4 col-md-6 mb-3';



                        column.innerHTML = `

                            <div class="card product-image-card h-100">

                                <div class="position-relative">

                                    <img
                                        src="${event.target.result}"
                                        class="card-img-top"
                                        alt="Product Preview"
                                    >


                                    <span
                                        class="badge bg-primary position-absolute top-0 start-0 m-2"
                                    >

                                        ${
                                            index === 0
                                            ? 'Primary Image'
                                            : 'Image ' + (index + 1)
                                        }

                                    </span>


                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 remove-image-btn"
                                        data-index="${index}"
                                    >

                                        <i class="mdi mdi-close"></i>

                                    </button>

                                </div>


                                <div class="card-body p-2">

                                    <div class="small text-truncate">

                                        ${file.name}

                                    </div>


                                    <small class="text-muted">

                                        ${Math.round(file.size / 1024)} KB

                                    </small>

                                </div>

                            </div>

                        `;


                        imagePreview.appendChild(
                            column
                        );

                    };


                reader.readAsDataURL(file);

            }

        );
    }



    /*
    |--------------------------------------------------------------------------
    | Select Images
    |--------------------------------------------------------------------------
    */

    productImages.addEventListener(
        'change',

        function ()
        {

            const newFiles =
                Array.from(
                    this.files
                );


            /*
             * Prevent selecting the same file twice.
             */

            newFiles.forEach(
                function (newFile)
                {

                    const alreadyExists =
                        allSelectedFiles.some(
                            function (existingFile)
                            {

                                return (
                                    existingFile.name
                                    ===
                                    newFile.name

                                    &&

                                    existingFile.size
                                    ===
                                    newFile.size
                                );

                            }
                        );


                    if (!alreadyExists)
                    {
                        allSelectedFiles.push(
                            newFile
                        );
                    }

                }
            );


            updateFileInput();

            updateImageCount();

            refreshImagePreview();

        }
    );



    /*
    |--------------------------------------------------------------------------
    | Remove Image
    |--------------------------------------------------------------------------
    */

    imagePreview.addEventListener(
        'click',

        function (event)
        {

            const button =
                event.target.closest(
                    '.remove-image-btn'
                );


            if (!button)
            {
                return;
            }


            const index =
                parseInt(
                    button.dataset.index
                );


            allSelectedFiles.splice(
                index,
                1
            );


            updateFileInput();

            updateImageCount();

            refreshImagePreview();

        }
    );



    /*
    |--------------------------------------------------------------------------
    | Validate Before Submit
    |--------------------------------------------------------------------------
    */

    form.addEventListener(
        'submit',

        function (event)
        {

            if (
                allSelectedFiles.length
                <
                1
            )
            {
                event.preventDefault();


                Swal.fire({

                    icon: 'error',

                    title: 'Product Images Required',

                    text:
                        'Please upload at least one product image before saving the product.',

                    confirmButtonText:
                        'OK'

                });


                document
                    .querySelector(
                        '.product-upload-area'
                    )
                    .scrollIntoView({

                        behavior:
                            'smooth',

                        block:
                            'center'

                    });


                return;
            }


            /*
             * Prevent double submission.
             */

            submitBtn.disabled =
                true;


            submitBtn.innerHTML =
                '<span class="spinner-border spinner-border-sm me-1"></span> Saving Product...';

        }
    );



    /*
    |--------------------------------------------------------------------------
    | Reset Form
    |--------------------------------------------------------------------------
    */

    form.addEventListener(
        'reset',

        function ()
        {

            setTimeout(
                function ()
                {

                    allSelectedFiles = [];


                    productImages.value =
                        '';


                    updateFileInput();

                    updateImageCount();

                    refreshImagePreview();

                },

                0
            );

        }
    );



    updateImageCount();

});

</script>



@if(!isset($swal))

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endif



<style>

.product-upload-area
{
    border: 2px dashed #ced4da;

    border-radius: 10px;

    padding: 35px 20px;

    text-align: center;

    cursor: pointer;

    background: #fafafa;

    transition:
        border-color .2s ease,
        background .2s ease;
}


.product-upload-area:hover
{
    border-color: #0d6efd;

    background: #f8fbff;
}


.upload-icon
{
    font-size: 48px;

    color: #6c757d;
}


.setting-option
{
    border: 1px solid #dee2e6;

    border-radius: 8px;

    padding: 18px;

    min-height: 115px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;
}


.setting-option .form-check-input
{
    width: 42px;

    height: 22px;

    cursor: pointer;
}


.product-image-card
{
    overflow: hidden;
}


.product-image-card img
{
    width: 100%;

    height: 190px;

    object-fit: cover;
}


.remove-image-btn
{
    z-index: 5;
}


@media (max-width: 767px)
{
    .setting-option
    {
        min-height: auto;
    }


    .product-upload-area
    {
        padding: 25px 15px;
    }
}

</style>


@endsection