@extends('admin.includes.partial.base')

@section('title', 'Categories')

@section('content')
    <h6 class="mb-0 text-uppercase">Categories</h6>
    <hr>

    <div class="mb-3 text-end">
        <button class="btn btn-grd-primary" data-bs-toggle="modal" data-bs-target="#categoryModal" id="addCategoryBtn">
            <i class="material-icons-outlined">add</i> Add Category
        </button>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="order-search position-relative my-3">
                <input class="form-control rounded-5 px-5" type="text" placeholder="Search" id="searchCategory">
                <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
            </div>

            <div class="table-responsive">
                <table class="table align-middle" id="categoryTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Modified By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{!! $category->status_label !!}</td>
                                <td>{{ $category->creator?->name ?? '-' }}</td>
                                <td>{{ $category->editor?->name ?? '-' }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info editCategoryBtn" data-id="{{ $category->id }}"
                                        data-name="{{ $category->name }}" data-description="{{ $category->description }}"
                                        data-status="{{ $category->status }}">
                                        <i class="material-icons-outlined">edit</i>
                                    </button>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
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
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form id="categoryForm" method="POST" action="">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Name</label>
                            <input type="text" name="name" id="categoryName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Description</label>
                            <textarea name="description" id="categoryDescription" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="categoryStatus" class="form-label">Status</label>
                            <select name="status" id="categoryStatus" class="form-select">
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
            // Add Category button
            $('#addCategoryBtn').click(function() {
                $('#categoryForm').attr('action', "{{ route('categories.store') }}");
                $('#formMethod').val('POST');
                $('#categoryModalLabel').text('Add Category');
                $('#categoryForm')[0].reset();

                // Show modal using Bootstrap 5
                let modalEl = document.getElementById('categoryModal');
                let modal = new bootstrap.Modal(modalEl);
                modal.show();
            });

            // Edit Category buttons
            $('.editCategoryBtn').click(function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const description = $(this).data('description');
                const status = $(this).data('status');

                $('#categoryForm').attr('action', '/categories/' + id);
                $('#formMethod').val('PUT');
                $('#categoryModalLabel').text('Edit Category');
                $('#categoryName').val(name);
                $('#categoryDescription').val(description);
                $('#categoryStatus').val(status);

                // Show modal using Bootstrap 5
                let modalEl = document.getElementById('categoryModal');
                let modal = new bootstrap.Modal(modalEl);
                modal.show();
            });

            // Simple search filter
            $('#searchCategory').on('keyup', function() {
                const value = $(this).val().toLowerCase();
                $('#categoryTable tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
@endsection
