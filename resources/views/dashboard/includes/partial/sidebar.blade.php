<!--start sidebar-->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo-icon">
            {{-- <img src="{{ asset('admin/images/logo-icon.png') }}" class="logo-img" alt="Logo"> --}}
        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mb-0">Bridgeway</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>

    <div class="sidebar-nav">
        @php
            $currentStatus = request()->query('status'); // Detect selected quote status
        @endphp
        <ul class="metismenu" id="menu">

            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">dashboard</i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>

            <!-- Categories -->
            @can('view-categories')
                <li class="menu-label">Categories</li>
                <li>
                    <a href="{{ route('categories.index') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">category</i></div>
                        <div class="menu-title">
                            Categories
                            <span class="badge bg-primary float-end">{{ $categoriesCount ?? 0 }}</span>
                        </div>
                    </a>
                </li>
            @endcan

            @can('view-subcategories')
                <li>
                    <a href="{{ route('subcategories.index') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">subtitles</i></div>
                        <div class="menu-title">
                            Subcategories
                            <span class="badge bg-primary float-end">{{ $subcategoriesCount ?? 0 }}</span>
                        </div>
                    </a>
                </li>
            @endcan

            <!-- Quotes -->
            {{-- @can('view-quotes')
                <li class="menu-label">Quotes</li>
                <li>
                    <a href="{{ route('dashboard.quotes.index') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">request_quote</i></div>
                        <div class="menu-title">
                            All Quotes
                            <span class="badge bg-primary float-end">{{ $quotesCount ?? 0 }}</span>
                        </div>
                    </a>
                </li>
            @endcan --}}

            <!-- Quote Statuses Dropdown -->
            @can('view-quotes')
                <li>
                    <a class="d-flex align-items-center" href="#quoteStatusMenu" data-bs-toggle="collapse"
                        aria-expanded="{{ $currentStatus ? 'true' : 'false' }}">
                        <div class="parent-icon"><i class="material-icons-outlined">timeline</i></div>
                        <div class="menu-title flex-grow-1">All Quotes</div>
                        <div class="ms-auto">
                            <i class="material-icons-outlined">expand_more</i>
                        </div>
                    </a>
                    <ul class="collapse list-unstyled ps-3 {{ $currentStatus ? 'show' : '' }}" id="quoteStatusMenu">
                        @php
                            $statuses = [
                                'New' => 'fiber_new',
                                'In Progress' => 'hourglass_top',
                                'Completed' => 'check_circle',
                                'Cancelled' => 'cancel',
                                'Asking Low' => 'trending_down',
                                'Interested' => 'thumb_up',
                                'Follow Up' => 'schedule',
                                'Not Interested' => 'thumb_down',
                                'No Response' => 'phone_missed',
                                'Booked' => 'event_available',
                                'Payment Missing' => 'payment',
                                'Listed' => 'list',
                                'Dispatch' => 'local_shipping',
                                'Pickup' => 'shopping_bag',
                                'Delivery' => 'done_all',
                                'Deleted' => 'delete',
                            ];
                        @endphp

                        @foreach ($statuses as $status => $icon)
                            <li>
                                <a class="d-flex justify-content-between align-items-center {{ Str::slug($status) === $currentStatus ? 'active' : '' }}"
                                    href="{{ route('dashboard.quotes.index', ['status' => Str::slug($status)]) }}">
                                    <span><i class="material-icons-outlined me-1">{{ $icon }}</i> {{ $status }}</span>
                                    <span class="badge bg-secondary">{{ $quoteStatusCounts[$status] ?? 0 }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endcan

            <!-- Users & Roles -->
            @can('view-users')
                <li class="menu-label">Users & Roles</li>
                <li>
                    <a href="{{ route('dashboard.users.index') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">people</i></div>
                        <div class="menu-title">
                            Users
                            <span class="badge bg-primary float-end">{{ $usersCount ?? 0 }}</span>
                        </div>
                    </a>
                </li>
            @endcan

            {{-- @can('view-activityLogs')
                <li>
                    <a href="{{ route('view.activity_logs') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">people</i></div>
                        <div class="menu-title">Activity Logs</div>
                    </a>
                </li>
            @endcan --}}

            @can('view-roles')
                <li>
                    <a href="{{ route('roles.index') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">admin_panel_settings</i></div>
                        <div class="menu-title">Roles</div>
                    </a>
                </li>
            @endcan

        </ul>
    </div>
</aside>
<!--end sidebar-->
