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
            <li>
                <a href="{{ route('dashboard') }}" class="">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li class="menu-label">Elements</li>
            <li>
                <a href="{{ route('categories.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">Category</i></div>
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
                <a href="{{ route('admin.quotes.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">request_quote</i></div>
                    <div class="menu-title">Quotes</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="parent-icon"><i class="material-icons-outlined"></i></div>
                    <div class="menu-title">Asking</div>
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
