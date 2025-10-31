<!--start sidebar-->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="{{ asset('web-assets/images/logo/logo_001.png') }}" class="logo-img w-100" alt="Logo">
        </div>
        {{-- <div class="logo-name flex-grow-1">
            <h5 class="mb-0">Bridgeway</h5>
        </div> --}}
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>

    <div class="sidebar-nav">
        @php
            $currentStatus = request()->query('status');
        @endphp
        <ul class="metismenu" id="menu">

            <!-- Dashboard -->
            @can('view-dashboard')
                <li>
                    <a href="{{ route('dashboard') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">dashboard</i></div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
            @endcan

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

            @can('view-blogs')
                <li class="menu-label">Blogs</li>
                <li>
                    <a href="{{ route('blogs.index') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">article</i></div>
                        <div class="menu-title">
                            All Blogs
                            <span class="badge bg-primary float-end">{{ $blogsCount ?? 0 }}</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blogs.create') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">post_add</i></div>
                        <div class="menu-title">Create Blog</div>
                    </a>
                </li>
            @endcan
            @can('view-states')
                <li class="menu-label">States</li>

                <li>
                    <a href="{{ route('add-states.index') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">map</i></div>
                        <div class="menu-title">
                            All States
                            <span class="badge bg-primary float-end">{{ $statesCount ?? 0 }}</span>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('add-states.create') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">add_location_alt</i></div>
                        <div class="menu-title">Add State</div>
                    </a>
                </li>
            @endcan


            @can('view-services')
                <li class="menu-label">Services</li>
                <li>
                    <a href="{{ route('services.index') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">home_repair_service</i></div>
                        <div class="menu-title">
                            All Services
                            <span class="badge bg-primary float-end">{{ $servicesCount ?? 0 }}</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('services.create') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">add_circle_outline</i></div>
                        <div class="menu-title">Create Service</div>
                    </a>
                </li>
            @endcan

            <!-- Quote Statuses Dropdown -->
            @php
                $user = auth()->user();
                $currentStatus = request()->query('status');

                $statusPermissionMap = collect(array_keys(\App\Models\Quote::$statuses))
                    ->mapWithKeys(fn($status) => [Str::slug($status) => 'view-quotes-' . Str::slug($status)])
                    ->toArray();

                $allowedStatuses = $user->isAdmin()
                    ? array_keys(\App\Models\Quote::$statuses)
                    : $user
                        ->allPermissions()
                        ->pluck('slug')
                        ->map(fn($slug) => Str::after($slug, 'view-quotes-'))
                        ->map(fn($s) => Str::title(str_replace('-', ' ', $s)))
                        ->toArray();

                if ($user->email === 'huzaifa@gmail.com') {
                    dd($currentStatus, $statusPermissionMap, $allowedStatuses);
                }
            @endphp

            @can('view-quotes')
                <li class="menu-label">Quotes Management</li>

                <li>
                    <a href="{{ route('dashboard.quotes.create') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i></div>
                        <div class="menu-title">Create Quote</div>
                    </a>
                </li>

                <li>
                    <a class="d-flex align-items-center" href="#quoteStatusMenu" data-bs-toggle="collapse"
                        aria-expanded="{{ $currentStatus ? 'true' : 'false' }}">
                        <div class="parent-icon"><i class="material-icons-outlined">timeline</i></div>
                        <div class="menu-title flex-grow-1">All Quotes</div>
                        <div class="ms-auto"><i class="material-icons-outlined">expand_more</i></div>
                    </a>

                    <ul class="collapse list-unstyled ps-3 {{ $currentStatus ? 'show' : '' }}" id="quoteStatusMenu">
                        @foreach (\App\Models\Quote::$statuses as $status => $details)
                            @php
                                $slug = Str::slug($status);
                            @endphp

                            @if ($user->isAdmin() || in_array($status, $allowedStatuses))
                                <li>
                                    <a class="d-flex justify-content-between align-items-center {{ $slug === $currentStatus ? 'active' : '' }}"
                                        href="{{ route('dashboard.quotes.index', ['status' => $slug]) }}">
                                        <span>
                                            <i
                                                class="material-icons-outlined me-1 {{ str_replace('bg-', 'text-', $details['class']) }}">
                                                {{ $details['icon'] }}
                                            </i>
                                            {{ $status }}
                                        </span>
                                        <span
                                            class="badge {{ $details['class'] }}">{{ $quoteStatusCounts[$status] ?? 0 }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endcan

            <li>
                <a href="{{ route('dashboard.orderForms.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i></div>
                    <div class="menu-title">
                        Order Forms
                        <span class="badge bg-primary float-end">{{ $orderFormsCount ?? 0 }}</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('dashboard.invoice.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i></div>
                    <div class="menu-title">
                        Invoice
                    </div>
                </a>
            </li>

            <!-- Users & Roles -->
            @if (auth()->user()->isAdmin())
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

                <li>
                    <a href="{{ route('view.activity_logs') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">people</i></div>
                        <div class="menu-title">Activity Logs</div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('roles.index') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">admin_panel_settings</i></div>
                        <div class="menu-title">Roles</div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('trusted-ips.index') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">security</i></div>
                        <div class="menu-title">Trusted IPs</div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('reports.quotes.histories') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">security</i></div>
                        <div class="menu-title">Report</div>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
<!--end sidebar-->
