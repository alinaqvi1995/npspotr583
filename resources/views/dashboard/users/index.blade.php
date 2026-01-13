@extends('dashboard.includes.partial.base')

@section('title', 'Users')

@section('content')
    <h6 class="mb-0 text-uppercase">All Users</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div>
                    <h5 class="mb-0">Users List</h5>
                </div>
                <a href="{{ route('dashboard.users.create') }}" class="btn btn-grd btn-grd-primary">
                    <i class="material-icons-outlined">add</i> Add New User
                </a>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <select id="columnSearchSelect" class="form-select">
                        <option value="">Search All Columns</option>
                        <option value="0">Name</option>
                        <option value="1">Email</option>
                    </select>
                </div>
                <div class="col-md-8 position-relative">
                    <input class="form-control rounded-5 px-5" type="text" placeholder="Search" id="columnSearchInput">
                    <span
                        class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                </div>
            </div>

            <div id="usersTableContainer">
                @include('dashboard.users.partials.table')
            </div>
        </div>
    </div>
@endsection

@section('extra_js')
    <script>
        $(document).ready(function () {
            let debounceTimer;

            function fetchUsers(page = 1) {
                const search = $('#columnSearchInput').val();
                const column = $('#columnSearchSelect').val();

                $.ajax({
                    url: "{{ route('dashboard.users.index') }}",
                    type: "GET",
                    data: {
                        page: page,
                        search: search,
                        column: column
                    },
                    success: function (response) {
                        $('#usersTableContainer').html(response);
                    },
                    error: function (xhr) {
                        console.error("Error fetching users:", xhr);
                    }
                });
            }

            // Search input keyup with debounce
            $('#columnSearchInput').on('keyup', function () {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(function () {
                    fetchUsers();
                }, 300);
            });

            // Column select change
            $('#columnSearchSelect').on('change', function () {
                fetchUsers();
            });

            // Pagination click interception
            $(document).on('click', '.pagination a', function (e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                fetchUsers(page);
            });
        });
    </script>
@endsection