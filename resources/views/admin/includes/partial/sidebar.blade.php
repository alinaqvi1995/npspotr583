<!--start sidebar-->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="{{ asset('admin/images/logo-icon.png') }}" class="logo-img" alt="Logo">
        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mb-0">Maxton</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>

    <div class="sidebar-nav">
        <ul class="metismenu" id="sidenav">

            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}" class="">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li class="menu-label">Elements</li>
            <li>
                <a href="{{ route('categories.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">view_list</i></div>
                    <div class="menu-title">Categories</div>
                </a>
            </li>
            <li>
                <a href="{{ route('subcategories.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">view_list</i></div>
                    <div class="menu-title">Subcategories</div>
                </a>
            </li>
            <li>
                <a href="{{ route('services.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">build_circle</i></div>
                    <div class="menu-title">Services</div>
                </a>
            </li>
            <li>
                <a href="{{ route('blog.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">article</i></div>
                    <div class="menu-title">Blogs</div>
                </a>
            </li>

            <!-- Quotes Management -->
            <li class="menu-label">Quotes</li>
            <li>
                <a href="{{ route('admin.quotes.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">request_quote</i></div>
                    <div class="menu-title">All Quotes</div>
                </a>
            </li>
            <li>
                <a href="">
                    <div class="parent-icon"><i class="material-icons-outlined">fiber_new</i></div>
                    <div class="menu-title">New Quotes</div>
                </a>
            </li>
            <li>
                <a href="}}">
                    <div class="parent-icon"><i class="material-icons-outlined">autorenew</i></div>
                    <div class="menu-title">In Progress</div>
                </a>
            </li>
            <li>
                <a href="">
                    <div class="parent-icon"><i class="material-icons-outlined">check_circle</i></div>
                    <div class="menu-title">Completed</div>
                </a>
            </li>
            <li>
                <a href="">
                    <div class="parent-icon"><i class="material-icons-outlined">cancel</i></div>
                    <div class="menu-title">Cancelled</div>
                </a>
            </li>

            <!-- Site Settings -->
            <li class="menu-label">Site Settings</li>
            <li>
                <a href="">
                    <div class="parent-icon"><i class="material-icons-outlined">settings</i></div>
                    <div class="menu-title">General Settings</div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">people</i></div>
                    <div class="menu-title">User Management</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Asking Low</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Interested</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Follow Up</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Not Interested</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">No Respons</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Booked</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Payment Missing</div>
                </a>
            </li>
                        <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Listed</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Dispatch</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Pickup</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Delivery</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Completed</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Deleted</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Canceled</div>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!--end sidebar-->
