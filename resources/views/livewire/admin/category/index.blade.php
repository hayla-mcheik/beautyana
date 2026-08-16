<div>

    {{-- Delete Modal --}}
    <div wire:ignore.self
         class="modal fade"
         id="deleteModal"
         tabindex="-1">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">
                    <h5>Delete Category</h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>
                </div>

                <form wire:submit="destroyCategory">

                    <div class="modal-body">
                        Are you sure you want to delete this category?
                    </div>

                    <div class="modal-footer">

                        <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                            Close
                        </button>

                        <button type="submit"
                                class="btn btn-danger">
                            Delete
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                Categories
            </h4>

            <a href="{{ url('admin/category/create') }}"
               class="btn btn-primary">
                Add Category
            </a>

        </div>

        <div class="card-body">

            @if(session('message'))

                <div class="alert alert-success">
                    {{ session('message') }}
                </div>

            @endif

            {{-- Filter --}}

            <div class="row mb-4">

                <div class="col-md-4">

                    <label class="form-label">
                        Filter by Menu
                    </label>

                    <select wire:model.live="menu"
                            class="form-select">

                        <option value="">
                            All Menus
                        </option>

                        @foreach($menus as $menu)

                            <option value="{{ $menu->id }}">
                                {{ $menu->name }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

            {{-- Table --}}

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Menu</th>
                        <th>Parent</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)

                        <tr>

                            <td>
                                {{ $category->id }}
                            </td>

                            <td>
                                {{ $category->menu->name ?? '-' }}
                            </td>

                            <td>
                                {{ $category->parent->name ?? '-' }}
                            </td>

                            <td>
                                {{ $category->name }}
                            </td>

                            <td>

                                @if($category->status)

                                    <span class="badge bg-danger">
                                        Hidden
                                    </span>

                                @else

                                    <span class="badge bg-success">
                                        Visible
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ url('admin/category/'.$category->id.'/edit') }}"
                                   class="btn btn-success btn-sm">
                                    Edit
                                </a>

                                <button class="btn btn-danger btn-sm"
                                        wire:click="deleteCategory({{ $category->id }})"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">

                                    Delete

                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center">

                                No categories found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            {{ $categories->links() }}

        </div>

    </div>

</div>

@push('script')

<script>

    window.addEventListener(
        'close-modal',
        function () {
            $('#deleteModal').modal('hide');
        }
    );

</script>

@endpush