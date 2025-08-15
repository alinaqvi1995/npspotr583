@extends('admin.includes.partial.base')

@section('title', 'Subcategories')

@section('content')
    <h6 class="mb-0 text-uppercase">Subcategories</h6>
    <hr>

    <div class="mb-3 text-end">
        <button class="btn btn-grd-primary" id="addSubcategoryBtn">
            <i class="material-icons-outlined">add</i> Add Subcategory
        </button>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="order-search position-relative my-3">
                <input class="form-control rounded-5 px-5" type="text" placeholder="Search" id="searchSubcategory">
                <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
            </div>

            <div class="table-responsive">
                <table class="table align-middle" id="subcategoryTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Modified By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                            <tr>
                                <td>{{ $subcategory->name }}</td>
                                <td>{{ $subcategory->category?->name ?? '-' }}</td>
                                <td>{{ $subcategory->description }}</td>
                                <td>{!! $category->status_label !!}</td>
                                <td>{{ $subcategory->creator?->name ?? '-' }}</td>
                                <td>{{ $subcategory->editor?->name ?? '-' }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info editSubcategoryBtn" data-id="{{ $subcategory->id }}"
                                        data-category_id="{{ $subcategory->category_id }}"
                                        data-name="{{ $subcategory->name }}"
                                        data-description="{{ $subcategory->description }}"
                                        data-status="{{ $subcategory->status }}">
                                        <i class="material-icons-outlined">edit</i>
                                    </button>

                                    <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="material-icons-outlined">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add/Edit Modal -->
    <div class="modal fade" id="subcategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form id="subcategoryForm" method="POST" action="">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="subcategoryModalLabel">Add Subcategory</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="subcategoryCategory" class="form-label">Category</label>
                            <select name="category_id" id="subcategoryCategory" class="form-select" required>
                                <option value="">Select Category</option>
                                @foreach (\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="subcategoryName" class="form-label">Name</label>
                            <input type="text" name="name" id="subcategoryName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="subcategoryDescription" class="form-label">Description</label>
                            <textarea name="description" id="subcategoryDescription" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="subcategoryStatus" class="form-label">Status</label>
                            <select name="status" id="subcategoryStatus" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-grd-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {
            // Add Subcategory button
            $('#addSubcategoryBtn').click(function() {
                $('#subcategoryForm').attr('action', "{{ route('subcategories.store') }}");
                $('#formMethod').val('POST');
                $('#subcategoryModalLabel').text('Add Subcategory');
                $('#subcategoryForm')[0].reset();

                var modalEl = document.getElementById('subcategoryModal');
                var modal = new bootstrap.Modal(modalEl);
                modal.show();
            });

            // Edit Subcategory buttons
            $('.editSubcategoryBtn').click(function() {
                const id = $(this).data('id');
                const category_id = $(this).data('category_id');
                const name = $(this).data('name');
                const description = $(this).data('description');
                const status = $(this).data('status');

                $('#subcategoryForm').attr('action', '/subcategories/' + id);
                $('#formMethod').val('PUT');
                $('#subcategoryModalLabel').text('Edit Subcategory');
                $('#subcategoryCategory').val(category_id);
                $('#subcategoryName').val(name);
                $('#subcategoryDescription').val(description);
                $('#subcategoryStatus').val(status);

                var modalEl = document.getElementById('subcategoryModal');
                var modal = new bootstrap.Modal(modalEl);
                modal.show();
            });

            // Search filter
            $('#searchSubcategory').on('keyup', function() {
                const value = $(this).val().toLowerCase();
                $('#subcategoryTable tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
@endsection
