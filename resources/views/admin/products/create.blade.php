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
            Enter product prices and manage stock by color and size.
        </small>

    </div>


    <div class="card-body">

        <div class="row">

{{-- ================================================= --}}
{{-- ORIGINAL PRICE --}}
{{-- ================================================= --}}

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
            id="originalPrice"
            value="{{ old('original_price') }}"
            class="form-control @error('original_price') is-invalid @enderror"
            placeholder="0.00"
            required
        >

    </div>

    <small class="text-muted">
        Regular price before discount.
    </small>

    @error('original_price')
        <div class="text-danger small mt-1">
            {{ $message }}
        </div>
    @enderror

</div>


{{-- ================================================= --}}
{{-- DISCOUNT --}}
{{-- ================================================= --}}

<div class="col-md-4 mb-3">

    <label class="form-label fw-semibold">
        Sale Percentage
    </label>

    <div class="input-group">

        <input
            type="number"
            step="0.01"
            min="0"
            max="100"
            name="discount_percentage"
            id="discountPercentage"
            value="{{ old('discount_percentage', 0) }}"
            class="form-control @error('discount_percentage') is-invalid @enderror"
            placeholder="0"
        >

        <span class="input-group-text">
            %
        </span>

    </div>

    <small class="text-muted">
        Leave 0 if the product is not on sale.
    </small>

    @error('discount_percentage')
        <div class="text-danger small mt-1">
            {{ $message }}
        </div>
    @enderror

</div>


{{-- ================================================= --}}
{{-- FINAL SELLING PRICE --}}
{{-- ================================================= --}}

<div class="col-md-4 mb-3">

    <label class="form-label fw-semibold">
        Final Selling Price
    </label>

    <div class="input-group">

        <span class="input-group-text">
            $
        </span>

        <input
            type="number"
            step="0.01"
            id="sellingPrice"
            class="form-control"
            placeholder="0.00"
            readonly
        >

    </div>

    <small class="text-muted">
        Automatically calculated.
    </small>

</div>

            {{-- ================================================= --}}
            {{-- TOTAL QUANTITY --}}
            {{-- ================================================= --}}

            <div class="col-md-4 mb-3">

                <label class="form-label fw-semibold">
                    Total Stock Quantity
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="number"
                    min="0"
                    name="quantity"
                    id="totalQuantity"
                    value="{{ old('quantity', 0) }}"
                    class="form-control @error('quantity') is-invalid @enderror"
                    readonly
                >

                <small class="text-muted">
                    Automatically calculated from the color/size quantities.
                </small>

                @error('quantity')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>

        </div>


        {{-- ================================================= --}}
        {{-- PRODUCT VARIANTS --}}
        {{-- ================================================= --}}

        <hr class="my-4">


        <div class="d-flex justify-content-between align-items-center mb-3">

            <div>

                <h6 class="mb-1 fw-semibold">

                    <i class="mdi mdi-tshirt-crew-outline me-1"></i>

                    Colors & Sizes

                </h6>

                <small class="text-muted">

                    Add the available color and size combinations
                    and set the stock quantity for each combination.

                </small>

            </div>


            <button
                type="button"
                id="addVariant"
                class="btn btn-primary btn-sm"
            >

                <i class="mdi mdi-plus"></i>

                Add Variant

            </button>

        </div>


        {{-- ================================================= --}}
        {{-- VARIANTS CONTAINER --}}
        {{-- ================================================= --}}

        <div
            id="variants-container"
            class="variants-container"
        >

            {{-- FIRST VARIANT --}}

            <div
                class="variant-row row align-items-end mb-3"
                data-index="0"
            >

                {{-- COLOR --}}

                <div class="col-md-4 mb-2">

                    <label class="form-label fw-semibold">
                        Color
                    </label>

                    <select
                        name="variants[0][color_id]"
                        class="form-control variant-color"
                    >

                        <option value="">
                            Select Color
                        </option>

                        @foreach($colors as $color)

                            <option
                                value="{{ $color->id }}"
                                {{ old('variants.0.color_id') == $color->id ? 'selected' : '' }}
                            >
                                {{ $color->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- SIZE --}}

                <div class="col-md-4 mb-2">

                    <label class="form-label fw-semibold">
                        Size
                    </label>

                    <select
                        name="variants[0][size_id]"
                        class="form-control variant-size"
                    >

                        <option value="">
                            Select Size
                        </option>

                        @foreach($sizes as $size)

                            <option
                                value="{{ $size->id }}"
                                {{ old('variants.0.size_id') == $size->id ? 'selected' : '' }}
                            >
                                {{ $size->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- QUANTITY --}}

                <div class="col-md-3 mb-2">

                    <label class="form-label fw-semibold">
                        Quantity
                    </label>

                    <input
                        type="number"
                        min="0"
                        value="{{ old('variants.0.quantity', 0) }}"
                        name="variants[0][quantity]"
                        class="form-control variant-quantity"
                    >

                </div>


                {{-- REMOVE --}}

                <div class="col-md-1 mb-2">

                    <button
                        type="button"
                        class="btn btn-outline-danger remove-variant"
                        title="Remove Variant"
                    >

                        <i class="mdi mdi-delete-outline"></i>

                    </button>

                </div>

            </div>

        </div>


        {{-- ================================================= --}}
        {{-- VARIANT HELP --}}
        {{-- ================================================= --}}

        <div class="alert alert-light border mt-3 mb-0">

            <div class="d-flex">

                <i class="mdi mdi-information-outline fs-5 me-2"></i>

                <div>

                    <strong>
                        Example:
                    </strong>

                    <span class="ms-1">
                        Black / S / 5,
                        Black / M / 8,
                        White / S / 4
                    </span>

                    <br>

                    <small class="text-muted">

                        The total stock will automatically become
                        the sum of all variant quantities.

                    </small>

                </div>

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

/*
|--------------------------------------------------------------------------
| Product Price Calculation
|--------------------------------------------------------------------------
*/

const originalPriceInput =
    document.getElementById('originalPrice');

const discountPercentageInput =
    document.getElementById('discountPercentage');

const sellingPriceInput =
    document.getElementById('sellingPrice');


function calculateSellingPrice() {

    const originalPrice =
        parseFloat(originalPriceInput.value) || 0;

    const discountPercentage =
        parseFloat(discountPercentageInput.value) || 0;


    if (originalPrice <= 0) {

        sellingPriceInput.value = '';

        return;
    }


    const sellingPrice =
        originalPrice -
        (
            originalPrice *
            discountPercentage /
            100
        );


    sellingPriceInput.value =
        sellingPrice.toFixed(2);
}


originalPriceInput.addEventListener(
    'input',
    calculateSellingPrice
);


discountPercentageInput.addEventListener(
    'input',
    calculateSellingPrice
);


calculateSellingPrice();

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

/* ============================================================
   PRODUCT VARIANTS
============================================================ */

const variantsContainer =
    document.getElementById('variants-container');

const addVariantButton =
    document.getElementById('addVariant');

const totalQuantityInput =
    document.getElementById('totalQuantity');


let variantIndex = 1;


/* ============================================================
   CALCULATE TOTAL QUANTITY
============================================================ */

function calculateTotalQuantity()
{
    let total = 0;


    document
        .querySelectorAll('.variant-quantity')
        .forEach(function (input) {

            const quantity =
                parseInt(input.value) || 0;

            total += quantity;

        });


    totalQuantityInput.value = total;
}


/* ============================================================
   CREATE VARIANT ROW
============================================================ */

function createVariantRow(index)
{
    const row =
        document.createElement('div');


    row.className =
        'variant-row row align-items-end mb-3';


    row.dataset.index =
        index;


    row.innerHTML = `

        <div class="col-md-4 mb-2">

            <label class="form-label fw-semibold">
                Color
            </label>

            <select
                name="variants[${index}][color_id]"
                class="form-control variant-color"
            >

                <option value="">
                    Select Color
                </option>

                @foreach($colors as $color)

                    <option value="{{ $color->id }}">
                        {{ $color->name }}
                    </option>

                @endforeach

            </select>

        </div>


        <div class="col-md-4 mb-2">

            <label class="form-label fw-semibold">
                Size
            </label>

            <select
                name="variants[${index}][size_id]"
                class="form-control variant-size"
            >

                <option value="">
                    Select Size
                </option>

                @foreach($sizes as $size)

                    <option value="{{ $size->id }}">
                        {{ $size->name }}
                    </option>

                @endforeach

            </select>

        </div>


        <div class="col-md-3 mb-2">

            <label class="form-label fw-semibold">
                Quantity
            </label>

            <input
                type="number"
                min="0"
                value="0"
                name="variants[${index}][quantity]"
                class="form-control variant-quantity"
            >

        </div>


        <div class="col-md-1 mb-2">

            <button
                type="button"
                class="btn btn-outline-danger remove-variant"
                title="Remove Variant"
            >

                <i class="mdi mdi-delete-outline"></i>

            </button>

        </div>

    `;


    return row;
}


/* ============================================================
   ADD VARIANT
============================================================ */

if (addVariantButton) {

    addVariantButton.addEventListener(
        'click',
        function () {

            const row =
                createVariantRow(
                    variantIndex
                );


            variantsContainer.appendChild(
                row
            );


            variantIndex++;

        }
    );

}


/* ============================================================
   REMOVE VARIANT
============================================================ */

if (variantsContainer) {

    variantsContainer.addEventListener(
        'click',
        function (event) {

            const removeButton =
                event.target.closest(
                    '.remove-variant'
                );


            if (!removeButton) {
                return;
            }


            const rows =
                variantsContainer.querySelectorAll(
                    '.variant-row'
                );


            /*
             * Always keep at least one row.
             */

            if (rows.length <= 1) {

                const row =
                    removeButton.closest(
                        '.variant-row'
                    );


                row.querySelector(
                    '.variant-color'
                ).value = '';


                row.querySelector(
                    '.variant-size'
                ).value = '';


                row.querySelector(
                    '.variant-quantity'
                ).value = 0;


                calculateTotalQuantity();

                return;
            }


            const row =
                removeButton.closest(
                    '.variant-row'
                );


            if (row) {

                row.remove();

            }


            calculateTotalQuantity();

        }
    );

}


/* ============================================================
   UPDATE TOTAL WHEN QUANTITY CHANGES
============================================================ */

if (variantsContainer) {

    variantsContainer.addEventListener(
        'input',
        function (event) {

            if (
                event.target.classList.contains(
                    'variant-quantity'
                )
            ) {

                calculateTotalQuantity();

            }

        }
    );

}


/* ============================================================
   INITIAL TOTAL
============================================================ */

calculateTotalQuantity();

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
/* ============================================================
   PRODUCT VARIANTS
============================================================ */

.variants-container {
    width: 100%;
}


.variant-row {

    padding: 15px;

    border: 1px solid #e2e6ea;

    border-radius: 8px;

    background: #fafafa;

    transition:
        border-color .2s ease,
        background .2s ease;
}


.variant-row:hover {

    border-color: #b8c2cc;

    background: #ffffff;
}


.variant-row label {

    font-size: 13px;

    margin-bottom: 6px;
}


.variant-row .form-control {

    min-height: 42px;
}


.remove-variant {

    width: 42px;

    height: 42px;

    display: flex;

    align-items: center;

    justify-content: center;
}


#addVariant {

    white-space: nowrap;
}


#totalQuantity {

    background: #f8f9fa;

    font-weight: 600;

}


/* ============================================================
   MOBILE
============================================================ */

@media (max-width: 767px) {

    .variant-row {

        padding: 12px;

    }


    .remove-variant {

        width: 100%;

        height: 40px;

    }


    #addVariant {

        width: 100%;

        margin-top: 10px;

    }

}
</style>


@endsection