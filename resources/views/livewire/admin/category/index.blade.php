<div>

    {{-- =========================================================
         DELETE MODAL
    ========================================================== --}}

    <div
        wire:ignore.self
        class="modal fade"
        id="deleteModal"
        tabindex="-1"
        aria-labelledby="deleteModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h5
                        class="modal-title"
                        id="deleteModalLabel"
                    >
                        Delete Category
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>

                </div>


                <form wire:submit.prevent="destroyCategory">

                    <div class="modal-body">

                        <p class="mb-0">
                            Are you sure you want to delete this category?
                        </p>

                    </div>


                    <div class="modal-footer">

                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Cancel
                        </button>


                        <button
                            type="submit"
                            class="btn btn-danger"
                        >
                            Yes, Delete
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>



    {{-- =========================================================
         PAGE CONTENT
    ========================================================== --}}

    <div class="row">

        <div class="col-md-12">


            {{-- SUCCESS MESSAGE --}}

            @if(session('message'))

                <div class="alert alert-success">

                    {{ session('message') }}

                </div>

            @endif



            <div class="card">


                {{-- =================================================
                     CARD HEADER
                ================================================== --}}

                <div class="card-header">

                    <div
                        class="d-flex
                               justify-content-between
                               align-items-center"
                    >

                        <div>

                            <h4 class="mb-1">

                                @if($menu)

                                    {{ $menu }} Categories

                                @else

                                    All Categories

                                @endif

                            </h4>


                            <small class="text-muted">

                                @if($menu)

                                    Showing categories assigned to the

                                    <strong>{{ $menu }}</strong>

                                    website menu.

                                @else

                                    Showing categories from all website menus.

                                @endif

                            </small>

                        </div>



                        {{-- IMPORTANT:
                             Keep the full href expression on ONE Blade expression.
                             This prevents spaces/newlines from becoming %20.
                        --}}

                        <a
                            href="{{ url('admin/category/create') . ($menu ? '?menu=' . urlencode($menu) : '') }}"
                            class="btn btn-primary btn-sm"
                        >
                            Add Category
                        </a>

                    </div>

                </div>



                {{-- =================================================
                     CARD BODY
                ================================================== --}}

                <div class="card-body">


                    {{-- =================================================
                         CURRENT MENU INDICATOR
                    ================================================== --}}

                    @if($menu)

                        <div
                            class="alert alert-info
                                   d-flex
                                   justify-content-between
                                   align-items-center"
                        >

                            <div>

                                <strong>Current Menu:</strong>

                                {{ $menu }}

                            </div>


                            <a
                                href="{{ url('admin/category') }}"
                                class="btn btn-sm btn-outline-dark"
                            >
                                View All Categories
                            </a>

                        </div>

                    @endif



                    {{-- =================================================
                         TABLE
                    ================================================== --}}

                    <div class="table-responsive">

                        <table
                            class="table
                                   table-bordered
                                   table-striped
                                   table-hover
                                   align-middle"
                        >

                            <thead>

                                <tr>

                                    <th style="width: 80px;">
                                        ID
                                    </th>


                                    @if(!$menu)

                                        <th>
                                            Menu
                                        </th>

                                    @endif


                                    <th>
                                        Category Name
                                    </th>


                                    <th style="width: 130px;">
                                        Status
                                    </th>


                                    <th style="width: 200px;">
                                        Action
                                    </th>

                                </tr>

                            </thead>



                            <tbody>

                                @forelse($categories as $category)

                                    <tr wire:key="category-{{ $category->id }}">


                                        {{-- ID --}}

                                        <td>

                                            {{ $category->id }}

                                        </td>



                                        {{-- MENU --}}

                                        @if(!$menu)

                                            <td>

                                                <span class="badge bg-primary">

                                                    {{ $category->menu }}

                                                </span>

                                            </td>

                                        @endif



                                        {{-- CATEGORY NAME --}}

                                        <td>

                                            <strong>

                                                {{ $category->name }}

                                            </strong>

                                        </td>



                                        {{-- STATUS --}}

                                        <td>

                                            @if($category->status == '1')

                                                <span class="badge bg-secondary">

                                                    Hidden

                                                </span>

                                            @else

                                                <span class="badge bg-success">

                                                    Visible

                                                </span>

                                            @endif

                                        </td>



                                        {{-- ACTIONS --}}

                                        <td>

                                            <a
                                                href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                                class="btn btn-success btn-sm"
                                            >
                                                Edit
                                            </a>


                                            <button
                                                type="button"
                                                wire:click="deleteCategory({{ $category->id }})"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                class="btn btn-danger btn-sm"
                                            >
                                                Delete
                                            </button>

                                        </td>

                                    </tr>


                                @empty

                                    <tr>

                                        <td
                                            colspan="{{ $menu ? 4 : 5 }}"
                                            class="text-center py-4"
                                        >

                                            <p class="text-muted mb-3">

                                                No categories found

                                                @if($menu)

                                                    for {{ $menu }}

                                                @endif

                                                .

                                            </p>


                                            {{-- FIXED SECOND ADD CATEGORY URL --}}

                                            <a
                                                href="{{ url('admin/category/create') . ($menu ? '?menu=' . urlencode($menu) : '') }}"
                                                class="btn btn-primary btn-sm"
                                            >
                                                Add Category
                                            </a>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>



                    {{-- =================================================
                         PAGINATION
                    ================================================== --}}

                    <div class="mt-3">

                        {{ $categories->links() }}

                    </div>


                </div>

            </div>

        </div>

    </div>



    {{-- =========================================================
         MODAL SCRIPT
    ========================================================== --}}

    @push('script')

        <script>

            window.addEventListener('close-modal', event => {

                const modalElement =
                    document.getElementById('deleteModal');

                if (!modalElement) {
                    return;
                }


                const modalInstance =
                    bootstrap.Modal.getInstance(modalElement);


                if (modalInstance) {

                    modalInstance.hide();

                }

            });

        </script>

    @endpush


</div>