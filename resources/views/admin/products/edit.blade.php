@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        {{-- PAGE HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="mb-1">
                    <i class="mdi mdi-package-variant-closed"></i>
                    Edit Product
                </h3>

                <p class="text-muted mb-0">
                    Update product information, pricing, stock, visibility and product images.
                </p>
            </div>

            <a href="{{ url('admin/products') }}"
               class="btn btn-outline-secondary">

                <i class="mdi mdi-arrow-left"></i>
                Back to Products

            </a>

        </div>


        {{-- SUCCESS MESSAGE --}}
        @if(session('message'))

            <div class="alert alert-success">

                <i class="mdi mdi-check-circle-outline"></i>

                {{ session('message') }}

            </div>

        @endif


        {{-- VALIDATION ERRORS --}}
        @if($errors->any())

            <div class="alert alert-danger">

                <h6 class="mb-2">

                    <i class="mdi mdi-alert-circle-outline"></i>

                    Please correct the following errors:

                </h6>

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif



        <form
            action="{{ url('admin/products/'.$product->id) }}"
            method="POST"
            enctype="multipart/form-data"
            id="productForm"
        >

            @csrf

            @method('PUT')



            {{-- ======================================================== --}}
            {{-- PRODUCT INFORMATION --}}
            {{-- ======================================================== --}}

            <div class="card shadow-sm mb-4">

                <div class="card-header bg-white">

                    <h5 class="mb-1">

                        <i class="mdi mdi-information-outline"></i>

                        Product Information

                    </h5>

                    <small class="text-muted">

                        Update the category and general product information.

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


                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"

                                        {{
                                            old(
                                                'category_id',
                                                $product->category_id
                                            )
                                            == $category->id

                                            ? 'selected'

                                            : ''
                                        }}
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
                                value="{{ old('name', $product->name) }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Example: Diamond Tennis Bracelet"
                                required
                            >


                            <small class="text-muted">

                                Changing the product name will automatically update the slug if your controller generates the slug from the name.

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
                            >{{ old('description', $product->description) }}</textarea>


                            @error('description')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                    </div>

                </div>

            </div>



            {{-- ======================================================== --}}
            {{-- PRICING & INVENTORY --}}
            {{-- ======================================================== --}}

            <div class="card shadow-sm mb-4">

                <div class="card-header bg-white">

                    <h5 class="mb-1">

                        <i class="mdi mdi-cash-multiple"></i>

                        Pricing & Inventory

                    </h5>

                    <small class="text-muted">

                        Update the prices and available stock quantity.

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
            value="{{ old('original_price', $product->original_price) }}"
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
            value="{{ old('discount_percentage', $product->discount_percentage ?? 0) }}"
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
            value="{{ old('selling_price', $product->selling_price) }}"
            class="form-control"
            placeholder="0.00"
            readonly
        >

    </div>

    <small class="text-muted">
        Automatically calculated.
    </small>

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
    id="totalQuantity"
    value="{{ old('quantity', $product->quantity) }}"
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

                </div>

            </div>
{{-- ======================================================== --}}
{{-- PRODUCT VARIANTS --}}
{{-- ======================================================== --}}

<div class="card shadow-sm mb-4">

    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    <i class="mdi mdi-tshirt-crew-outline me-1"></i>
                    Colors & Sizes
                </h5>

                <small class="text-muted">
                    Manage available color and size combinations
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

    </div>


    <div class="card-body">

        <div id="variants-container">

            @php

                /*
                |--------------------------------------------------------------------------
                | Existing Variants
                |--------------------------------------------------------------------------
                */

                $oldVariants = old('variants');

                if ($oldVariants !== null) {

                    $variantsToDisplay = $oldVariants;

                } else {

                    $variantsToDisplay =
                        $product->productVariants->map(function ($variant) {

                            return [
                                'color_id' => $variant->color_id,
                                'size_id' => $variant->size_id,
                                'quantity' => $variant->quantity,
                            ];

                        })->toArray();

                }

            @endphp


            @if(count($variantsToDisplay) > 0)

                @foreach($variantsToDisplay as $index => $variant)

                    <div
                        class="variant-row row align-items-end mb-3"
                        data-index="{{ $index }}"
                    >

                        {{-- COLOR --}}

                        <div class="col-md-4 mb-2">

                            <label class="form-label fw-semibold">
                                Color
                            </label>

                            <select
                                name="variants[{{ $index }}][color_id]"
                                class="form-control variant-color"
                            >

                                <option value="">
                                    Select Color
                                </option>

                                @foreach($colors as $color)

                                    <option
                                        value="{{ $color->id }}"
                                        {{ (string)($variant['color_id'] ?? '') === (string)$color->id ? 'selected' : '' }}
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
                                name="variants[{{ $index }}][size_id]"
                                class="form-control variant-size"
                            >

                                <option value="">
                                    Select Size
                                </option>

                                @foreach($sizes as $size)

                                    <option
                                        value="{{ $size->id }}"
                                        {{ (string)($variant['size_id'] ?? '') === (string)$size->id ? 'selected' : '' }}
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
                                name="variants[{{ $index }}][quantity]"
                                value="{{ $variant['quantity'] ?? 0 }}"
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

                @endforeach

            @else

                {{-- EMPTY VARIANT ROW --}}

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

                                <option value="{{ $color->id }}">
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

                                <option value="{{ $size->id }}">
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
                            name="variants[0][quantity]"
                            value="0"
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

            @endif

        </div>


        {{-- HELP --}}

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
                        The total stock is automatically calculated
                        from all variant quantities.
                    </small>

                </div>

            </div>

        </div>

    </div>

</div>


            {{-- ======================================================== --}}
            {{-- PRODUCT VISIBILITY --}}
            {{-- ======================================================== --}}

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
                                        type="checkbox"
                                        class="form-check-input"
                                        name="trending"
                                        value="1"

                                        {{
                                            old(
                                                'trending',
                                                $product->trending == '1'
                                            )
                                            ? 'checked'
                                            : ''
                                        }}
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
                                        type="checkbox"
                                        class="form-check-input"
                                        name="featured"
                                        value="1"

                                        {{
                                            old(
                                                'featured',
                                                $product->featured == '1'
                                            )
                                            ? 'checked'
                                            : ''
                                        }}
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
                                        type="checkbox"
                                        class="form-check-input"
                                        name="status"
                                        value="1"

                                        {{
                                            old(
                                                'status',
                                                $product->status == '0'
                                            )
                                            ? 'checked'
                                            : ''
                                        }}
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



            {{-- ======================================================== --}}
            {{-- EXISTING PRODUCT IMAGES --}}
            {{-- ======================================================== --}}

            <div class="card shadow-sm mb-4">

                <div class="card-header bg-white">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="mb-1">

                                <i class="mdi mdi-image-multiple-outline"></i>

                                Current Product Images

                            </h5>


                            <small class="text-muted">

                                Images currently saved for this product.

                            </small>

                        </div>


                        <span class="badge bg-primary">

                            {{ $product->productImages->count() }}

                            {{ $product->productImages->count() == 1 ? 'Image' : 'Images' }}

                        </span>

                    </div>

                </div>


                <div class="card-body">


                    @if(
                        $product->productImages
                        &&
                        $product->productImages->count() > 0
                    )


                        <div class="alert alert-info">

                            <strong>

                                Image Management

                            </strong>

                            <div class="mt-1">

                       The first image is used as the primary product image.
You may keep a single image or upload additional images if needed.

                            </div>

                        </div>



                        <div class="row">


                            @foreach(
                                $product->productImages
                                as $index => $image
                            )


                                <div class="col-xl-3 col-lg-4 col-md-6 mb-3">


                                    <div class="card product-image-card h-100">


                                        <div class="position-relative">


                                            <img
                                                src="{{ asset($image->image) }}"
                                                class="card-img-top"
                                                alt="{{ $product->name }}"
                                            >



                                            <span
                                                class="position-absolute top-0 start-0 m-2 badge {{ $index === 0 ? 'bg-primary' : 'bg-secondary' }}"
                                            >

                                                {{
                                                    $index === 0

                                                    ? 'Primary Image'

                                                    : 'Image '.($index + 1)
                                                }}

                                            </span>


                                        </div>



                                        <div class="card-body p-2">


                                            <div class="small text-muted mb-2">

                                                Existing Product Image

                                            </div>



                                            <a
                                                href="{{ url('admin/product-image/'.$image->id.'/delete') }}"
                                                class="btn btn-outline-danger btn-sm w-100 delete-existing-image"
                                            >

                                                <i class="mdi mdi-delete-outline"></i>

                                                Remove Image

                                            </a>


                                        </div>


                                    </div>


                                </div>


                            @endforeach


                        </div>


                    @else


                        <div class="alert alert-warning mb-0">

                            <i class="mdi mdi-alert-outline"></i>

                            This product does not have any images yet.

                        </div>


                    @endif


                </div>

            </div>



            {{-- ======================================================== --}}
            {{-- ADD NEW PRODUCT IMAGES --}}
            {{-- ======================================================== --}}

            <div class="card shadow-sm mb-4">

                <div class="card-header bg-white">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                 <h5 class="mb-1">
    <i class="mdi mdi-cloud-upload-outline"></i>
    Add Product Images
</h5>


                            <small class="text-muted">

                            Upload one or more images for this product.

                            </small>

                        </div>


                        <span
                            id="newImageCountBadge"
                            class="badge bg-secondary"
                        >

                            0 new images

                        </span>

                    </div>

                </div>


                <div class="card-body">


                    <div class="alert alert-light border">

                   If you upload new images, they will be added to the existing ones.
You can also keep only the current image if you don't want to upload more.

                    </div>



                    <div
                        class="product-upload-area"
                        onclick="document.getElementById('productImages').click()"
                    >


                        <i class="mdi mdi-cloud-upload-outline upload-icon"></i>


                        <h5>

                           Select Images

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



                    <div
                        id="newImagePreview"
                        class="row mt-4"
                    ></div>


                </div>

            </div>



            {{-- ======================================================== --}}
            {{-- ACTION BUTTONS --}}
            {{-- ======================================================== --}}

            <div class="card shadow-sm">

                <div class="card-body">


                    <div class="d-flex justify-content-between align-items-center">


                        <a
                            href="{{ url('admin/products') }}"
                            class="btn btn-outline-secondary"
                        >

                            Cancel

                        </a>



                        <button
                            type="submit"
                            class="btn btn-primary"
                            id="submitBtn"
                        >

                            <i class="mdi mdi-content-save-outline"></i>

                            Update Product

                        </button>


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


    const newImagePreview =
        document.getElementById('newImagePreview');


    const newImageCountBadge =
        document.getElementById('newImageCountBadge');


    const form =
        document.getElementById('productForm');


    const submitBtn =
        document.getElementById('submitBtn');


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
    let allNewFiles = [];



    /*
    |--------------------------------------------------------------------------
    | UPDATE FILE INPUT
    |--------------------------------------------------------------------------
    */

    function updateFileInput()
    {
        const dataTransfer =
            new DataTransfer();


        allNewFiles.forEach(
            function (file)
            {
                dataTransfer.items.add(file);
            }
        );


        productImages.files =
            dataTransfer.files;
    }



    /*
    |--------------------------------------------------------------------------
    | UPDATE IMAGE COUNTER
    |--------------------------------------------------------------------------
    */

    function updateNewImageCount()
    {
        const count =
            allNewFiles.length;


     newImageCountBadge.textContent =
    count + ' image' + (count !== 1 ? 's' : '') + ' selected';


        newImageCountBadge.className =
            count > 0

            ? 'badge bg-success'

            : 'badge bg-secondary';
    }



    /*
    |--------------------------------------------------------------------------
    | RENDER NEW IMAGE PREVIEWS
    |--------------------------------------------------------------------------
    */

    function refreshNewImagePreview()
    {
        newImagePreview.innerHTML = '';


        allNewFiles.forEach(

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
                                        alt="New Product Image"
                                    >


                                    <span
                                        class="position-absolute top-0 start-0 m-2 badge bg-success"
                                    >

                                    Image ${index + 1}

                                    </span>


                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 remove-new-image"
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


                        newImagePreview.appendChild(
                            column
                        );

                    };


                reader.readAsDataURL(file);

            }

        );
    }



    /*
    |--------------------------------------------------------------------------
    | SELECT NEW IMAGES
    |--------------------------------------------------------------------------
    */

    productImages.addEventListener(

        'change',

        function ()
        {

            const newFiles =
                Array.from(this.files);



            newFiles.forEach(

                function (newFile)
                {

                    const alreadyExists =
                        allNewFiles.some(

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
                        allNewFiles.push(
                            newFile
                        );
                    }

                }

            );


            updateFileInput();

            updateNewImageCount();

            refreshNewImagePreview();

        }

    );



    /*
    |--------------------------------------------------------------------------
    | REMOVE NEW IMAGE
    |--------------------------------------------------------------------------
    */

    newImagePreview.addEventListener(

        'click',

        function (event)
        {

            const button =
                event.target.closest(
                    '.remove-new-image'
                );


            if (!button)
            {
                return;
            }


            const index =
                parseInt(
                    button.dataset.index
                );


            allNewFiles.splice(
                index,
                1
            );


            updateFileInput();

            updateNewImageCount();

            refreshNewImagePreview();

        }

    );



    /*
    |--------------------------------------------------------------------------
    | CONFIRM EXISTING IMAGE DELETE
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll(
            '.delete-existing-image'
        )
        .forEach(

            function (button)
            {

                button.addEventListener(

                    'click',

                    function (event)
                    {

                        event.preventDefault();


                        const deleteUrl =
                            this.href;


                        Swal.fire({

                            icon:
                                'warning',

                            title:
                                'Remove Product Image?',

                            text:
                                'This image will be permanently deleted from the product.',

                            showCancelButton:
                                true,

                            confirmButtonText:
                                'Yes, Remove Image',

                            cancelButtonText:
                                'Cancel',

                            confirmButtonColor:
                                '#dc3545'

                        })
                        .then(

                            function (result)
                            {

                                if (result.isConfirmed)
                                {
                                    window.location.href =
                                        deleteUrl;
                                }

                            }

                        );

                    }

                );

            }

        );



    /*
    |--------------------------------------------------------------------------
    | SUBMIT FORM
    |--------------------------------------------------------------------------
    */

    form.addEventListener(

        'submit',

        function ()
        {

            submitBtn.disabled =
                true;


            submitBtn.innerHTML =
                '<span class="spinner-border spinner-border-sm me-1"></span> Updating Product...';

        }

    );

/*
|--------------------------------------------------------------------------
| PRODUCT VARIANTS
|--------------------------------------------------------------------------
*/

const variantsContainer =
    document.getElementById('variants-container');

const addVariantButton =
    document.getElementById('addVariant');

const totalQuantityInput =
    document.getElementById('totalQuantity');

let variantIndex =
    document.querySelectorAll('.variant-row').length;


/*
|--------------------------------------------------------------------------
| CALCULATE TOTAL QUANTITY
|--------------------------------------------------------------------------
*/

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

    if (totalQuantityInput) {

        totalQuantityInput.value = total;

    }
}


/*
|--------------------------------------------------------------------------
| CREATE VARIANT ROW
|--------------------------------------------------------------------------
*/

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
                name="variants[${index}][quantity]"
                value="0"
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


/*
|--------------------------------------------------------------------------
| ADD VARIANT
|--------------------------------------------------------------------------
*/

if (addVariantButton) {

    addVariantButton.addEventListener(
        'click',
        function () {

            const row =
                createVariantRow(variantIndex);

            variantsContainer.appendChild(row);

            variantIndex++;

            calculateTotalQuantity();

        }
    );

}


/*
|--------------------------------------------------------------------------
| REMOVE VARIANT
|--------------------------------------------------------------------------
*/

if (variantsContainer) {

    variantsContainer.addEventListener(
        'click',
        function (event) {

            const button =
                event.target.closest('.remove-variant');

            if (!button) {
                return;
            }


            const rows =
                variantsContainer.querySelectorAll(
                    '.variant-row'
                );


            /*
            |--------------------------------------------------------------------------
            | Keep at least one row
            |--------------------------------------------------------------------------
            */

            if (rows.length <= 1) {

                Swal.fire({
                    icon: 'warning',
                    title: 'Cannot Remove',
                    text: 'At least one variant row must remain.'
                });

                return;
            }


            const row =
                button.closest('.variant-row');

            row.remove();

            calculateTotalQuantity();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Quantity Change
    |--------------------------------------------------------------------------
    */

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


/*
|--------------------------------------------------------------------------
| INITIAL TOTAL
|--------------------------------------------------------------------------
*/

calculateTotalQuantity();

    updateNewImageCount();

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

    transition:
        transform .2s ease,
        box-shadow .2s ease;
}


.product-image-card:hover
{
    transform: translateY(-2px);

    box-shadow:
        0 4px 12px
        rgba(0, 0, 0, .10);
}


.product-image-card img
{
    width: 100%;

    height: 190px;

    object-fit: cover;
}


.remove-new-image
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


    .d-flex.justify-content-between.align-items-center
    {
        flex-wrap: wrap;

        gap: 10px;
    }
}

</style>


@endsection