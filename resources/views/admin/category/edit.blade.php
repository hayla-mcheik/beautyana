@extends('layouts.admin')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Status State
    |--------------------------------------------------------------------------
    */
    $statusChecked = old('form_submitted')
        ? old('status') == '1'
        : $category->status == '0';

    /*
    |--------------------------------------------------------------------------
    | Back URL
    |--------------------------------------------------------------------------
    */
    $backUrl = url('admin/category?menu=' . $category->menu_id);
@endphp

<div class="row">
    <div class="col-md-12">
        <div class="card category-edit-card shadow-sm border-0">

            {{-- HEADER --}}
            <div class="card-header bg-white border-bottom py-3">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div>
                        <h4 class="mb-1 fw-semibold">Edit Category</h4>
                        <p class="text-muted mb-0">
                            Update <strong>{{ $category->name }}</strong> from the
                            <strong>{{ $category->menu->name ?? '' }}</strong> menu.
                        </p>
                    </div>

                    <a href="{{ $backUrl }}" class="btn btn-outline-danger btn-sm">
                        <i class="mdi mdi-arrow-left"></i> Back
                    </a>
                </div>
            </div>

            {{-- BODY --}}
            <div class="card-body p-4">
                <form action="{{ url('admin/category/' . $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="form_submitted" value="1">

                    <div class="row g-4">

                        {{-- MENU SELECT --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Menu <span class="text-danger">*</span>
                            </label>
                            <select name="menu_id" class="form-select @error('menu_id') is-invalid @enderror">
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}"
                                        {{ old('menu_id', $category->menu_id) == $menu->id ? 'selected' : '' }}>
                                        {{ $menu->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('menu_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- PARENT CATEGORY SELECT --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Parent Category</label>
                            <select name="parent_id" class="form-select @error('parent_id') is-invalid @enderror">
                                <option value="">-- Main Category (Root) --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ old('parent_id', $category->parent_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted">Leave empty to set as a primary category.</small>
                            @error('parent_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- CATEGORY NAME --}}
                        <div class="col-lg-6">
                            <label for="categoryName" class="form-label fw-semibold">
                                Category Name <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="categoryName" 
                                name="name" 
                                value="{{ old('name', $category->name) }}" 
                                class="form-control @error('name') is-invalid @enderror" 
                                placeholder="Example: Diamond Rings"
                            >
                            <small class="text-muted">Changing the name automatically updates the slug.</small>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- CATEGORY IMAGE --}}
                        <div class="col-lg-6">
                            <label for="categoryImage" class="form-label fw-semibold">Category Image</label>
                            <input 
                                type="file" 
                                id="categoryImage" 
                                name="image" 
                                accept="image/*" 
                                class="form-control @error('image') is-invalid @enderror"
                            >
                            <small class="text-muted">Leave empty to keep the current image.</small>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- NEW IMAGE PREVIEW --}}
                            <div id="imagePreviewBox" class="image-preview-box mt-3 d-none">
                                <div class="image-preview">
                                    <img id="imagePreview" src="" alt="New image preview">
                                </div>
                                <div class="image-preview-info">
                                    <div class="fw-semibold text-primary">New Selected Image</div>
                                    <small class="text-muted">This will replace the current image on save.</small>
                                </div>
                            </div>

                            {{-- CURRENT IMAGE --}}
                            @if($category->image)
                                <div class="current-image-box mt-3" id="currentImageBox">
                                    <div class="current-image-preview">
                                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                                    </div>
                                    <div class="current-image-info">
                                        <div class="fw-semibold">Current Image</div>
                                        <small class="text-muted">Upload another image to replace it.</small>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- CATEGORY VISIBILITY --}}
                        <div class="col-md-12">
                            <div class="status-card">
                                <div class="status-content">
                                    <div class="status-info">
                                        <div class="status-icon">
                                            <i class="mdi mdi-eye-outline"></i>
                                        </div>
                                        <div class="status-text">
                                            <h6 class="mb-1 fw-semibold">Category Visibility</h6>
                                            <p class="text-muted mb-0" id="statusDescription"></p>
                                        </div>
                                    </div>

                                    <div class="status-actions">
                                        <span id="statusBadge" class="badge"></span>
                                        <div class="status-switch-wrapper">
                                            <input 
                                                type="checkbox" 
                                                name="status" 
                                                value="1" 
                                                class="form-check-input category-status-switch" 
                                                id="status" 
                                                {{ $statusChecked ? 'checked' : '' }}
                                            >
                                            <label class="status-switch-label" for="status">Visible on Website</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ACTION BUTTONS --}}
                        <div class="col-md-12">
                            <div class="form-actions">
                                <a href="{{ $backUrl }}" class="btn btn-light px-4">Cancel</a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="mdi mdi-content-save-edit-outline me-1"></i> Update Category
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.category-edit-card { overflow: hidden; }
.form-label { margin-bottom: 7px; }
.current-image-box, .image-preview-box { display: flex; align-items: center; gap: 14px; padding: 12px; border: 1px solid #dee2e6; border-radius: 9px; background: #f8f9fa; }
.current-image-preview, .image-preview { width: 75px; height: 75px; min-width: 75px; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 7px; background: #ffffff; }
.current-image-preview img, .image-preview img { width: 100%; height: 100%; object-fit: contain; }
.status-card { padding: 18px 20px; border: 1px solid #dee2e6; border-radius: 10px; background: #fafafa; }
.status-content { display: flex; align-items: center; justify-content: space-between; gap: 30px; }
.status-info { display: flex; align-items: center; min-width: 0; }
.status-icon { width: 44px; height: 44px; min-width: 44px; display: flex; align-items: center; justify-content: center; margin-right: 14px; border-radius: 8px; background: #eef1f4; font-size: 22px; }
.status-actions { display: flex; align-items: center; gap: 25px; flex-shrink: 0; }
.status-actions .badge { min-width: 70px; padding: 7px 12px; text-align: center; font-size: 12px; }
.status-switch-wrapper { display: flex; align-items: center; gap: 12px; margin: 0; }
.category-status-switch { width: 2.8em !important; height: 1.4em; margin: 0 !important; cursor: pointer; }
.status-switch-label { margin: 0; font-weight: 600; white-space: nowrap; cursor: pointer; }
.form-actions { display: flex; align-items: center; justify-content: flex-end; gap: 10px; padding-top: 20px; border-top: 1px solid #dee2e6; }

@media (max-width: 768px) {
    .status-content { flex-direction: column; align-items: flex-start; gap: 18px; }
    .status-actions { width: 100%; justify-content: space-between; padding-left: 58px; }
}
@media (max-width: 480px) {
    .card-body { padding: 18px !important; }
    .status-card { padding: 16px; }
    .status-actions { width: 100%; padding-left: 0; flex-direction: column; align-items: flex-start; gap: 15px; }
    .status-switch-wrapper { width: 100%; }
    .form-actions { flex-direction: column-reverse; }
    .form-actions .btn { width: 100%; }
    .current-image-preview, .image-preview { width: 65px; height: 65px; min-width: 65px; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // STATUS SWITCH UI
    const statusSwitch = document.getElementById('status');
    const statusBadge = document.getElementById('statusBadge');
    const statusDescription = document.getElementById('statusDescription');

    function updateStatusDisplay() {
        if (statusSwitch.checked) {
            statusBadge.textContent = 'Visible';
            statusBadge.className = 'badge bg-success';
            statusDescription.textContent = 'This category is visible to customers.';
        } else {
            statusBadge.textContent = 'Hidden';
            statusBadge.className = 'badge bg-secondary';
            statusDescription.textContent = 'This category is hidden from customers.';
        }
    }

    statusSwitch.addEventListener('change', updateStatusDisplay);
    updateStatusDisplay();

    // LIVE IMAGE PREVIEW
    const categoryImage = document.getElementById('categoryImage');
    const imagePreviewBox = document.getElementById('imagePreviewBox');
    const imagePreview = document.getElementById('imagePreview');

    categoryImage.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (!file) {
            imagePreview.src = '';
            imagePreviewBox.classList.add('d-none');
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.src = e.target.result;
            imagePreviewBox.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    });

    // DYNAMIC PARENT CATEGORY FETCHING ON MENU CHANGE
    const menuSelect = document.querySelector('[name="menu_id"]');
    const parentSelect = document.querySelector('[name="parent_id"]');

    if (menuSelect && parentSelect) {
        menuSelect.addEventListener('change', function () {
            let menuId = this.value;
            if (!menuId) return;

            fetch(`/admin/get-categories-by-menu/${menuId}`)
                .then(res => res.json())
                .then(data => {
                    parentSelect.innerHTML = '<option value="">-- Main Category (Root) --</option>';
                    data.forEach(cat => {
                        // Prevent category from choosing itself as parent
                        if (cat.id != {{ $category->id }}) {
                            parentSelect.innerHTML += `<option value="${cat.id}">${cat.name}</option>`;
                        }
                    });
                })
                .catch(err => console.error('Error fetching parent categories:', err));
        });
    }
});
</script>

@endsection