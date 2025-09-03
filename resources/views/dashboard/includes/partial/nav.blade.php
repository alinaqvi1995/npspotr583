<!--================= Header Section Start Here =================-->
<!--start header-->
<header class="top-header">
    <nav class="navbar navbar-expand align-items-center gap-4">
        <div class="btn-toggle">
            <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
        </div>
        <div class="search-bar flex-grow-1">
            <div class="position-relative">
                <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text"
                    placeholder="Search">
                <span
                    class="material-icons-outlined position-absolute d-lg-block d-none ms-3 translate-middle-y start-0 top-50">search</span>
                <span
                    class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 search-close">close</span>
                <div class="search-popup p-3">
                    <div class="card rounded-4 overflow-hidden">
                        <div class="card-header d-lg-none">
                            <div class="position-relative">
                                <input class="form-control rounded-5 px-5 mobile-search-control" type="text"
                                    placeholder="Search">
                                <span
                                    class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                                <span
                                    class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 mobile-search-close">close</span>
                            </div>
                        </div>
                        <div class="card-body search-content">
                            <p class="search-title">Quick Links</p>
                            <div class="d-flex align-items-start flex-wrap gap-2 kewords-wrapper">
                                <a href="{{ route('dashboard') }}" class="kewords">
                                    <span>Dashboard</span>
                                    <i class="material-icons-outlined fs-6">dashboard</i>
                                </a>

                                @can('view-categories')
                                    <a href="{{ route('categories.index') }}" class="kewords">
                                        <span>Categories ({{ $categoriesCount ?? 0 }})</span>
                                        <i class="material-icons-outlined fs-6">category</i>
                                    </a>
                                @endcan

                                @can('view-subcategories')
                                    <a href="{{ route('subcategories.index') }}" class="kewords">
                                        <span>Subcategories ({{ $subcategoriesCount ?? 0 }})</span>
                                        <i class="material-icons-outlined fs-6">subtitles</i>
                                    </a>
                                @endcan

                                @can('view-blogs')
                                    <a href="{{ route('blogs.index') }}" class="kewords">
                                        <span>Blogs ({{ $blogsCount ?? 0 }})</span>
                                        <i class="material-icons-outlined fs-6">article</i>
                                    </a>
                                    <a href="{{ route('blogs.create') }}" class="kewords">
                                        <span>Create Blog</span>
                                        <i class="material-icons-outlined fs-6">post_add</i>
                                    </a>
                                @endcan

                                @can('view-services')
                                    <a href="{{ route('services.index') }}" class="kewords">
                                        <span>Services ({{ $servicesCount ?? 0 }})</span>
                                        <i class="material-icons-outlined fs-6">home_repair_service</i>
                                    </a>
                                    <a href="{{ route('services.create') }}" class="kewords">
                                        <span>Create Service</span>
                                        <i class="material-icons-outlined fs-6">add_circle_outline</i>
                                    </a>
                                @endcan

                                @can('view-quotes')
                                    <a href="{{ route('dashboard.quotes.create') }}" class="kewords">
                                        <span>Create Quote</span>
                                        <i class="material-icons-outlined fs-6">inventory_2</i>
                                    </a>
                                    <a href="{{ route('dashboard.invoice.index') }}" class="kewords">
                                        <span>Invoices</span>
                                        <i class="material-icons-outlined fs-6">receipt_long</i>
                                    </a>
                                @endcan

                                @can('view-users')
                                    <a href="{{ route('dashboard.users.index') }}" class="kewords">
                                        <span>Users ({{ $usersCount ?? 0 }})</span>
                                        <i class="material-icons-outlined fs-6">people</i>
                                    </a>
                                @endcan

                                @can('view-roles')
                                    <a href="{{ route('roles.index') }}" class="kewords">
                                        <span>Roles</span>
                                        <i class="material-icons-outlined fs-6">admin_panel_settings</i>
                                    </a>
                                @endcan
                            </div>

                            <hr>
                            <p class="search-title">Quotes Status</p>
                            <div class="search-list d-flex flex-column gap-2">
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
                                    <a href="{{ route('dashboard.quotes.index', ['status' => Str::slug($status)]) }}"
                                        class="search-list-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="material-icons-outlined me-1">{{ $icon }}</i>
                                            {{ $status }}
                                        </span>
                                        <span class="badge bg-secondary">{{ $quoteStatusCounts[$status] ?? 0 }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="card-footer text-center bg-transparent">
                            <a href="javascript:;" class="btn w-100">See All Search Results</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="navbar-nav gap-1 nav-right-links align-items-center">
            <li class="nav-item d-lg-none mobile-search-btn">
                <a class="nav-link" href="javascript:;"><i class="material-icons-outlined">search</i></a>
            </li>
            {{-- <li class="nav-item">
                <form action="">
                    @csrf
                    <select name="panel_type_id" class="form-select" onchange="this.form.submit()">
                        @foreach (auth()->user()->panelTypes as $panel)
                            <option value="{{ $panel->id }}"
                                {{ session('active_panel_type') == $panel->id ? 'selected' : '' }}>
                                {{ $panel->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;"
                    data-bs-toggle="dropdown"><img src="{{ asset('admin/images/county/02.png') }}" width="22"
                        alt="">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                src="{{ asset('admin/images/county/01.png') }}" width="20" alt=""><span
                                class="ms-2">English</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                src="{{ asset('admin/images/county/02.png') }}" width="20" alt=""><span
                                class="ms-2">Catalan</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                src="{{ asset('admin/images/county/03.png') }}" width="20" alt=""><span
                                class="ms-2">French</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                src="{{ asset('admin/images/county/04.png') }}" width="20" alt=""><span
                                class="ms-2">Belize</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                src="{{ asset('admin/images/county/05.png') }}" width="20" alt=""><span
                                class="ms-2">Colombia</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                src="{{ asset('admin/images/county/06.png') }}" width="20" alt=""><span
                                class="ms-2">Spanish</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                src="{{ asset('admin/images/county/07.png') }}" width="20" alt=""><span
                                class="ms-2">Georgian</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                src="{{ asset('admin/images/county/08.png') }}" width="20" alt=""><span
                                class="ms-2">Hindi</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                    data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:;"><i
                        class="material-icons-outlined">notifications</i>
                    <span class="badge-notify">5</span>
                </a>
                <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
                    <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
                        <h5 class="notiy-title mb-0">Notifications</h5>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret option"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="material-icons-outlined">
                                    more_vert
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-option dropdown-menu-end shadow">
                                <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                        href="javascript:;"><i
                                            class="material-icons-outlined fs-6">inventory_2</i>Archive All</a></div>
                                <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                        href="javascript:;"><i class="material-icons-outlined fs-6">done_all</i>Mark
                                        all as read</a></div>
                                <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                        href="javascript:;"><i class="material-icons-outlined fs-6">mic_off</i>Disable
                                        Notifications</a></div>
                                <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                        href="javascript:;"><i class="material-icons-outlined fs-6">grade</i>What's
                                        new ?</a></div>
                                <div>
                                    <hr class="dropdown-divider">
                                </div>
                                <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                        href="javascript:;"><i
                                            class="material-icons-outlined fs-6">leaderboard</i>Reports</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="notify-list">
                        <div>
                            <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <img src="https://placehold.co/110x110/png" class="rounded-circle"
                                            width="45" height="45" alt="">
                                    </div>
                                    <div class="">
                                        <h5 class="notify-title">Congratulations Jhon</h5>
                                        <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.</p>
                                        <p class="mb-0 notify-time">Today</p>
                                    </div>
                                    <div class="notify-close position-absolute end-0 me-3">
                                        <i class="material-icons-outlined fs-6">close</i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="user-wrapper bg-primary text-primary bg-opacity-10">
                                        <span>RS</span>
                                    </div>
                                    <div class="">
                                        <h5 class="notify-title">New Account Created</h5>
                                        <p class="mb-0 notify-desc">From USA an user has registered.</p>
                                        <p class="mb-0 notify-time">Yesterday</p>
                                    </div>
                                    <div class="notify-close position-absolute end-0 me-3">
                                        <i class="material-icons-outlined fs-6">close</i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <img src="{{ asset('admin/images/apps/13.png') }}" class="rounded-circle"
                                            width="45" height="45" alt="">
                                    </div>
                                    <div class="">
                                        <h5 class="notify-title">Payment Recived</h5>
                                        <p class="mb-0 notify-desc">New payment recived successfully</p>
                                        <p class="mb-0 notify-time">1d ago</p>
                                    </div>
                                    <div class="notify-close position-absolute end-0 me-3">
                                        <i class="material-icons-outlined fs-6">close</i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <img src="{{ asset('admin/images/apps/14.png') }}" class="rounded-circle"
                                            width="45" height="45" alt="">
                                    </div>
                                    <div class="">
                                        <h5 class="notify-title">New Order Recived</h5>
                                        <p class="mb-0 notify-desc">Recived new order from michle</p>
                                        <p class="mb-0 notify-time">2:15 AM</p>
                                    </div>
                                    <div class="notify-close position-absolute end-0 me-3">
                                        <i class="material-icons-outlined fs-6">close</i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <img src="https://placehold.co/110x110/png" class="rounded-circle"
                                            width="45" height="45" alt="">
                                    </div>
                                    <div class="">
                                        <h5 class="notify-title">Congratulations Jhon</h5>
                                        <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.</p>
                                        <p class="mb-0 notify-time">Today</p>
                                    </div>
                                    <div class="notify-close position-absolute end-0 me-3">
                                        <i class="material-icons-outlined fs-6">close</i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a class="dropdown-item py-2" href="javascript:;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="user-wrapper bg-danger text-danger bg-opacity-10">
                                        <span>PK</span>
                                    </div>
                                    <div class="">
                                        <h5 class="notify-title">New Account Created</h5>
                                        <p class="mb-0 notify-desc">From USA an user has registered.</p>
                                        <p class="mb-0 notify-time">Yesterday</p>
                                    </div>
                                    <div class="notify-close position-absolute end-0 me-3">
                                        <i class="material-icons-outlined fs-6">close</i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                    <img src="https://placehold.co/110x110/png" class="rounded-circle p-1 border" width="45"
                        height="45" alt="">
                </a>
                <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                    <hr class="dropdown-divider">
                    @can('edit-profile')
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                            href="{{ route('profile.edit') }}"><i
                                class="material-icons-outlined">person_outline</i>Profile</a>
                    @endcan
                    <hr class="dropdown-divider">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2">
                            <i class="material-icons-outlined">power_settings_new</i>
                            Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>

    </nav>
</header>
<!--end top header-->
<!--================= Header Section End Here =================-->
