<!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="{{ route('dashboard') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="admin-assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="admin-assets/images/logo-dark.png" alt="" height="22">
                </span>
            </a>
            <a href="{{ route('dashboard') }}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="admin-assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="admin-assets/images/logo-light.png" alt="" height="22">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
            <div class="vertical-menu-btn-wrapper header-item vertical-icon">
                <button type="button" class="btn btn-sm px-0 fs-xl vertical-menu-btn topnav-hamburger shadow hamburger-icon" id="topnav-hamburger-icon">
                    <i class='bx bx-chevrons-right'></i>
                    <i class='bx bx-chevrons-left'></i>
                </button>
            </div>
        </div>
        <div id="scrollbar">
            <div class="container-fluid">
                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">

                    <li class="nav-item">
                        <a href="#sidebarHospital" class="nav-link menu-link  collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarHospital">
                            <i class=" bx bx-buildings"></i> <span data-key="t-hospital">Hospital</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarHospital">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard') }}" class="nav-link" data-key="t-dashboard">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a href="doctor-appointments.html" class="nav-link" data-key="t-appointments">Appointments</a>
                                </li>
                                <li class="nav-item">
                                    <a href="doctor-staff-list.html" class="nav-link" data-key="t-staff-list">Staff List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="doctor-list.html" class="nav-link" data-key="t-doctors">Doctors</a>
                                </li>
                                <li class="nav-item">
                                    <a href="doctor-patients.html" class="nav-link" data-key="t-patients">Patients</a>
                                </li>
                                <li class="nav-item">
                                    <a href="doctor-department.html" class="nav-link" data-key="t-department">Department</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarEcommerce" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEcommerce">
                            <i class="bx bx-cart-alt"></i> <span data-key="t-ecommerce">Ecommerce</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarEcommerce">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="dashboard-ecommerce.html" class="nav-link" data-key="t-dashboard"> Dashboard </a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-ecommerce-products.html" class="nav-link" data-key="t-products"> Products </a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-ecommerce-product-details.html" class="nav-link" data-key="t-product-overview"> Product Overview </a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-ecommerce-add-product.html" class="nav-link" data-key="t-add-product"> Add Product </a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-ecommerce-cart.html" class="nav-link" data-key="t-shopping-cart"> Shopping Cart </a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-ecommerce-checkout.html" class="nav-link" data-key="t-checkout"> Checkout </a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-ecommerce-orders.html" class="nav-link" data-key="t-orders"> Orders </a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-ecommerce-customers.html" class="nav-link" data-key="t-customers"> Customers </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="apps-calendar.html" class="nav-link menu-link"> <i class="bx bx-calendar"></i> <span data-key="t-calendar">Calendar</span> </a>
                    </li>

                    <li class="nav-item">
                        <a href="apps-chat.html" class="nav-link menu-link"> <i class="bx bx-chat"></i> <span data-key="t-chat">Chat</span> </a>
                    </li>

                    <li class="nav-item">
                        <a href="apps-email.html" class="nav-link menu-link"> <i class="bx bx-envelope"></i> <span data-key="t-email">Email</span> </a>
                    </li>

                    <li class="nav-item">
                        <a href="#sidebarInvoices" class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoices">
                            <i class="bx bx-file"></i> <span data-key="t-invoices">Invoices</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarInvoices">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="apps-invoices-list.html" class="nav-link" data-key="t-list-view">List View</a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-invoices-overview.html" class="nav-link" data-key="t-overview">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-invoices-create.html" class="nav-link" data-key="t-create-invoice">Create Invoice</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                            <i class="bx bx-user-circle"></i> <span data-key="t-authentication">Authentication</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAuth">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="auth-signin.html" class="nav-link" role="button" data-key="t-signin"> Sign In </a>
                                </li>
                                <li class="nav-item">
                                    <a href="auth-signup.html" class="nav-link" role="button" data-key="t-signup"> Sign Up </a>
                                </li>

                                <li class="nav-item">
                                    <a href="auth-pass-reset.html" class="nav-link" role="button" data-key="t-password-reset">
                                        Password Reset
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="auth-pass-change.html" class="nav-link" role="button" data-key="t-password-create">
                                        Password Create
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="auth-lockscreen.html" class="nav-link" role="button" data-key="t-lock-screen">
                                        Lock Screen
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="auth-logout.html" class="nav-link" role="button" data-key="t-logout"> Logout </a>
                                </li>
                                <li class="nav-item">
                                    <a href="auth-success-msg.html" class="nav-link" role="button" data-key="t-success-message"> Success Message </a>
                                </li>
                                <li class="nav-item">
                                    <a href="auth-twostep.html" class="nav-link" role="button" data-key="t-two-step-verification"> Two Step Verification </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarErrors" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarErrors" data-key="t-errors"> Errors </a>
                                    <div class="collapse menu-dropdown" id="sidebarErrors">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="auth-404.html" class="nav-link" data-key="t-404-error"> 404 Error </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-500.html" class="nav-link" data-key="t-500"> 500 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-503.html" class="nav-link" data-key="t-503"> 503 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-offline.html" class="nav-link" data-key="t-offline-page"> Offline Page </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                            <i class="bx bxs-contact"></i> <span data-key="t-pages">Pages</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarPages">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="pages-starter.html" class="nav-link" data-key="t-starter"> Starter </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages-profile.html" class="nav-link" data-key="t-profile"> Profile </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages-profile-settings.html" class="nav-link" data-key="t-profile-setting"> Profile Settings </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages-timeline.html" class="nav-link" data-key="t-timeline"> Timeline </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages-faqs.html" class="nav-link" data-key="t-faqs"> FAQs </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages-pricing.html" class="nav-link" data-key="t-pricing"> Pricing </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages-maintenance.html" class="nav-link" data-key="t-maintenance"> Maintenance </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages-coming-soon.html" class="nav-link" data-key="t-coming-soon"> Coming Soon </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages-privacy-policy.html" class="nav-link" data-key="t-privacy-policy"> Privacy Policy </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages-term-conditions.html" class="nav-link" data-key="t-term-conditions"> Term & Conditions </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                            <i class="bx bx-cube"></i> <span data-key="t-bootstrap-ui">Bootstrap UI</span>
                        </a>
                        <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="ui-alerts.html" class="nav-link" data-key="t-alerts">Alerts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-badges.html" class="nav-link" data-key="t-badges">Badges</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-buttons.html" class="nav-link" data-key="t-buttons">Buttons</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-colors.html" class="nav-link" data-key="t-colors">Colors</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-cards.html" class="nav-link" data-key="t-cards">Cards</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-carousel.html" class="nav-link" data-key="t-carousel">Carousel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-dropdowns.html" class="nav-link" data-key="t-dropdowns">Dropdowns</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-grid.html" class="nav-link" data-key="t-grid">Grid</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="ui-images.html" class="nav-link" data-key="t-images">Images</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-tabs.html" class="nav-link" data-key="t-tabs">Tabs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-accordions.html" class="nav-link" data-key="t-accordion-collapse">Accordion & Collapse</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-modals.html" class="nav-link" data-key="t-modals">Modals</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-offcanvas.html" class="nav-link" data-key="t-offcanvas">Offcanvas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-placeholders.html" class="nav-link" data-key="t-placeholders">Placeholders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-progress.html" class="nav-link" data-key="t-progress">Progress</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-notifications.html" class="nav-link" data-key="t-notifications">Notifications</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="ui-media.html" class="nav-link" data-key="t-media-object">Media object</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-embed-video.html" class="nav-link" data-key="t-embed-video">Embed Video</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-typography.html" class="nav-link" data-key="t-typography">Typography</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-lists.html" class="nav-link" data-key="t-lists">Lists</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-links.html" class="nav-link" data-key="t-links">Links</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-general.html" class="nav-link" data-key="t-general">General</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-ribbons.html" class="nav-link" data-key="t-ribbons">Ribbons</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="ui-utilities.html" class="nav-link" data-key="t-utilities">Utilities</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
                            <i class="bx bx-layer"></i> <span data-key="t-advance-ui">Advance UI</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="advance-ui-sweetalerts.html" class="nav-link" data-key="t-sweet-alerts">Sweet Alerts</a>
                                </li>
                                <li class="nav-item">
                                    <a href="advance-ui-nestable.html" class="nav-link" data-key="t-nestable-list">Nestable List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="advance-ui-scrollbar.html" class="nav-link" data-key="t-scrollbar">Scrollbar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="advance-ui-swiper.html" class="nav-link" data-key="t-swiper-slider">Swiper Slider</a>
                                </li>
                                <li class="nav-item">
                                    <a href="advance-ui-ratings.html" class="nav-link" data-key="t-ratings">Ratings</a>
                                </li>
                                <li class="nav-item">
                                    <a href="advance-ui-highlight.html" class="nav-link" data-key="t-highlight">Highlight</a>
                                </li>
                                <li class="nav-item">
                                    <a href="advance-ui-scrollspy.html" class="nav-link" data-key="t-scrollSpy">ScrollSpy</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="widgets.html">
                            <i class="bx bx-pen"></i> <span data-key="t-widgets">Widgets</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarForms" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarForms">
                            <i class="bx bx-copy-alt"></i> <span data-key="t-forms">Forms</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarForms">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="forms-elements.html" class="nav-link" data-key="t-basic-elements">Basic Elements</a>
                                </li>
                                <li class="nav-item">
                                    <a href="forms-select.html" class="nav-link" data-key="t-form-select">Form Select</a>
                                </li>
                                <li class="nav-item">
                                    <a href="forms-checkboxs-radios.html" class="nav-link" data-key="t-checkboxes-radios">Checkboxes & Radios</a>
                                </li>
                                <li class="nav-item">
                                    <a href="forms-pickers.html" class="nav-link" data-key="t-pickers">Pickers</a>
                                </li>
                                <li class="nav-item">
                                    <a href="forms-masks.html" class="nav-link" data-key="t-input-masks">Input Masks</a>
                                </li>
                                <li class="nav-item">
                                    <a href="forms-advanced.html" class="nav-link" data-key="t-advanced">Advanced</a>
                                </li>
                                <li class="nav-item">
                                    <a href="forms-range-sliders.html" class="nav-link" data-key="t-range-slider">Range Slider</a>
                                </li>
                                <li class="nav-item">
                                    <a href="forms-validation.html" class="nav-link" data-key="t-validation">Validation</a>
                                </li>
                                <li class="nav-item">
                                    <a href="forms-wizard.html" class="nav-link" data-key="t-wizard">Wizard</a>
                                </li>
                                <li class="nav-item">
                                    <a href="forms-editors.html" class="nav-link" data-key="t-editors">Editors</a>
                                </li>
                                <li class="nav-item">
                                    <a href="forms-file-uploads.html" class="nav-link" data-key="t-file-uploads">File Uploads</a>
                                </li>
                                <li class="nav-item">
                                    <a href="forms-layouts.html" class="nav-link" data-key="t-form-layouts">Form Layouts</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarTables" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTables">
                            <i class="bx bx-table"></i> <span data-key="t-tables">Tables</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarTables">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="tables-basic.html" class="nav-link" data-key="t-basic-tables">Basic Tables</a>
                                </li>
                                <li class="nav-item">
                                    <a href="tables-gridjs.html" class="nav-link" data-key="t-grid-js">Grid Js</a>
                                </li>
                                <li class="nav-item">
                                    <a href="tables-listjs.html" class="nav-link" data-key="t-list-js">List Js</a>
                                </li>
                                <li class="nav-item">
                                    <a href="tables-datatables.html" class="nav-link" data-key="t-datatables">Datatables</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarCharts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCharts">
                            <i class="bx bx-pie-chart-alt-2"></i> <span data-key="t-apexcharts">Apexcharts</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarCharts">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="charts-apex-line.html" class="nav-link" data-key="t-line">Line</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-area.html" class="nav-link" data-key="t-area">Area</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-column.html" class="nav-link" data-key="t-column">Column</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-bar.html" class="nav-link" data-key="t-bar">Bar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-mixed.html" class="nav-link" data-key="t-mixed">Mixed</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-timeline.html" class="nav-link" data-key="t-timeline">Timeline</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-range-area.html" class="nav-link" data-key="t-range-area">Range Area</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-funnel.html" class="nav-link" data-key="t-funnel">Funnel</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-candlestick.html" class="nav-link" data-key="t-candlstick">Candlstick</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-boxplot.html" class="nav-link" data-key="t-boxplot">Boxplot</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-bubble.html" class="nav-link" data-key="t-bubble">Bubble</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-scatter.html" class="nav-link" data-key="t-scatter">Scatter</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-heatmap.html" class="nav-link" data-key="t-heatmap">Heatmap</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-treemap.html" class="nav-link" data-key="t-treemap">Treemap</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-pie.html" class="nav-link" data-key="t-pie">Pie</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-radialbar.html" class="nav-link" data-key="t-radialbar">Radialbar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-radar.html" class="nav-link" data-key="t-radar">Radar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="charts-apex-polar.html" class="nav-link" data-key="t-polar-area">Polar Area</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarIcons" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                            <i class="bx bx-traffic-cone"></i> <span data-key="t-icons">Icons</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarIcons">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="icons-remix.html" class="nav-link" data-key="t-remix">Remix</a>
                                </li>
                                <li class="nav-item">
                                    <a href="icons-boxicons.html" class="nav-link" data-key="t-boxicons">Boxicons</a>
                                </li>
                                <li class="nav-item">
                                    <a href="icons-materialdesign.html" class="nav-link" data-key="t-material-design">Material Design</a>
                                </li>
                                <li class="nav-item">
                                    <a href="icons-bootstrap.html" class="nav-link" data-key="t-bootstrap">Bootstrap</a>
                                </li>
                                <li class="nav-item">
                                    <a href="icons-phosphor.html" class="nav-link" data-key="t-phosphor">Phosphor</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarMaps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMaps">
                            <i class="bx bx-map-alt"></i> <span data-key="t-maps">Maps</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMaps">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="maps-google.html" class="nav-link" data-key="t-google">Google</a>
                                </li>
                                <li class="nav-item">
                                    <a href="maps-vector.html" class="nav-link" data-key="t-vector">Vector</a>
                                </li>
                                <li class="nav-item">
                                    <a href="maps-leaflet.html" class="nav-link" data-key="t-leaflet">Leaflet</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                            <i class="bx bx-share-alt"></i> <span data-key="t-multi-level">Multi Level</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-key="t-level-1.1"> Level 1.1 </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Level
                                        1.2
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link" data-key="t-level-2.1"> Level 2.1 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm" data-key="t-level-2.2"> Level 2.2
                                                </a>
                                                <div class="collapse menu-dropdown" id="sidebarCrm">
                                                    <ul class="nav nav-sm flex-column">
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link" data-key="t-level-3.1"> Level 3.1
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link" data-key="t-level-3.2"> Level 3.2
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- Sidebar -->
        </div>
        <div class="dropdown sidebar-user mt-4">
            <button type="button" class="btn sidebar-user-button shadow-none w-100" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center overflow-hidden">
                    <img class="rounded-circle header-profile-user" src="admin-assets/images/users/32/avatar-1.jpg" alt="Header Avatar">
                    <span class="text-start ms-xl-2 overflow-hidden flex-grow-1 sideba-user-content">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text text-truncate mb-0" data-key="t-dixie-allen">Dixie Allen</span>
                        <span class="d-none d-xl-block ms-1 fs-sm user-name-sub-text" data-key="t-founder">Founder</span>
                    </span>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <h6 class="dropdown-header">Welcome Dixie!</h6>
                <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Messages</span></a>
                <a class="dropdown-item" href="apps-tickets-overview.html"><i class="mdi mdi-calendar-check-outline text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
                <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Help</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Balance : <b>$8451.36</b></span></a>
                <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                <a class="dropdown-item" href="auth-lockscreen.html"><i class="mdi mdi-lock text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
                <a class="dropdown-item" href="auth-logout.html"><i class="mdi mdi-logout text-muted fs-lg align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
            </div>
        </div>
        <div class="sidebar-background"></div>
    </div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
    <div class="topbar-wrapper shadow">
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="{{ route('dashboard') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="admin-assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="admin-assets/images/logo-dark.png" alt="" height="22">
                                </span>
                            </a>
        
                            <a href="{{ route('dashboard') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="admin-assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="admin-assets/images/logo-light.png" alt="" height="22">
                                </span>
                            </a>
                        </div>
        
                        <div class="header-item flex-shrink-0 me-3 vertical-btn-wrapper">
                            <button type="button" class="btn btn-sm px-0 fs-xl vertical-menu-btn topnav-hamburger border hamburger-icon" id="topnav-hamburger-icon">
                                <i class='bx bx-chevrons-right arrow-right'></i>
                                <i class='bx bx-chevrons-left arrow-left'></i>
                            </button>
                        </div>
        
                        <h4 class="mb-sm-0 header-item page-title lh-base">Doctors Dashboard</h4>
                    </div>
        
                    <div class="d-flex align-items-center">
                        <div class="dropdown d-none d-md-flex topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-search fs-3xl"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
        
                        <div class="dropdown ms-1 topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="header-lang-img" src="admin-assets/images/flags/us.svg" alt="Header Language" height="20" class="rounded">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
        
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language py-2" data-lang="en" title="English">
                                    <img src="admin-assets/images/flags/us.svg" alt="user-image" class="me-2 rounded" height="18">
                                    <span class="align-middle">English</span>
                                </a>
        
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp" title="Spanish">
                                    <img src="admin-assets/images/flags/spain.svg" alt="user-image" class="me-2 rounded" height="18">
                                    <span class="align-middle">Española</span>
                                </a>
        
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr" title="German">
                                    <img src="admin-assets/images/flags/germany.svg" alt="user-image" class="me-2 rounded" height="18"> <span class="align-middle">Deutsche</span>
                                </a>
        
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it" title="Italian">
                                    <img src="admin-assets/images/flags/italy.svg" alt="user-image" class="me-2 rounded" height="18">
                                    <span class="align-middle">Italiana</span>
                                </a>
        
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru" title="Russian">
                                    <img src="admin-assets/images/flags/russia.svg" alt="user-image" class="me-2 rounded" height="18">
                                    <span class="align-middle">русский</span>
                                </a>
        
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ch" title="Chinese">
                                    <img src="admin-assets/images/flags/china.svg" alt="user-image" class="me-2 rounded" height="18">
                                    <span class="align-middle">中国人</span>
                                </a>
        
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="fr" title="French">
                                    <img src="admin-assets/images/flags/french.svg" alt="user-image" class="me-2 rounded" height="18">
                                    <span class="align-middle">français</span>
                                </a>
        
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ar" title="Arabic">
                                    <img src="admin-assets/images/flags/ae.svg" alt="user-image" class="me-2 rounded" height="18">
                                    <span class="align-middle">عربي</span>
                                </a>
                            </div>
                        </div>
        
                        <div class="dropdown topbar-head-dropdown ms-1 header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle" id="page-header-cart-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                <i class='bx bx-shopping-bag fs-3xl'></i>
                                <span class="position-absolute topbar-badge cartitem-badge fs-3xs translate-middle badge rounded-pill bg-info">5</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0 product-list" aria-labelledby="page-header-cart-dropdown">
                                <div class="p-3 border-bottom">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fs-lg fw-semibold"> My Cart <span class="badge bg-secondary fs-sm cartitem-badge ms-1">7</span></h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!">View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 300px;">
                                    <div class="p-3">
                                        <div class="text-center empty-cart" id="empty-cart">
                                            <div class="avatar-md mx-auto my-3">
                                                <div class="avatar-title bg-info-subtle text-info fs-2 rounded-circle">
                                                    <i class='bx bx-cart'></i>
                                                </div>
                                            </div>
                                            <h5 class="mb-3">Your Cart is Empty!</h5>
                                            <a href="#!" class="btn btn-success w-md mb-3">Shop Now</a>
                                        </div>
        
                                        <div class="d-block dropdown-item product text-wrap p-2">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3 flex-shrink-0">
                                                    <div class="avatar-title bg-light rounded">
                                                        <img src="admin-assets/images/products/32/img-1.png" class="avatar-xs" alt="user-pic">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-1 fs-sm text-muted">Fashion</p>
                                                    <h6 class="mt-0 mb-3 fs-md">
                                                        <a href="#!" class="text-reset">Blive Printed Men Round Neck</a>
                                                    </h6>
                                                    <div class="text-muted fw-medium d-none">$<span class="product-price">327.49</span></div>
                                                    <div class="input-step">
                                                        <button type="button" class="minus">–</button>
                                                        <input type="number" class="product-quantity" value="2" min="0" max="100" readonly>
                                                        <button type="button" class="plus">+</button>
                                                    </div>
                                                </div>
                                                <div class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                    <button type="button" class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn" data-bs-toggle="modal" data-bs-target="#removeCartModal"><i class="ri-close-fill fs-lg"></i></button>
                                                    <h5 class="mb-0">$ <span class="product-line-price">654.98</span></h5>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="d-block dropdown-item product text-wrap p-2">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3 flex-shrink-0">
                                                    <div class="avatar-title bg-light rounded">
                                                        <img src="admin-assets/images/products/32/img-5.png" class="avatar-xs" alt="user-pic">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-1 fs-sm text-muted">Sportwear</p>
                                                    <h6 class="mt-0 mb-3 fs-md">
                                                        <a href="#!" class="text-reset">Willage Volleyball Ball</a>
                                                    </h6>
                                                    <div class="text-muted fw-medium d-none">$<span class="product-price">49.06</span></div>
                                                    <div class="input-step">
                                                        <button type="button" class="minus">–</button>
                                                        <input type="number" class="product-quantity" value="3" min="0" max="100" readonly>
                                                        <button type="button" class="plus">+</button>
                                                    </div>
                                                </div>
                                                <div class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                    <button type="button" class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn" data-bs-toggle="modal" data-bs-target="#removeCartModal"><i class="ri-close-fill fs-lg"></i></button>
                                                    <h5 class="mb-0">$ <span class="product-line-price">147.18</span></h5>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="d-block dropdown-item product text-wrap p-2">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3 flex-shrink-0">
                                                    <div class="avatar-title bg-light rounded">
                                                        <img src="admin-assets/images/products/32/img-10.png" class="avatar-xs" alt="user-pic">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-1 fs-sm text-muted">Fashion</p>
                                                    <h6 class="mt-0 mb-3 fs-md">
                                                        <a href="#!" class="text-reset">Cotton collar tshirts for men</a>
                                                    </h6>
                                                    <div class="text-muted fw-medium d-none">$<span class="product-price">53.33</span></div>
                                                    <div class="input-step">
                                                        <button type="button" class="minus">–</button>
                                                        <input type="number" class="product-quantity" value="3" min="0" max="100" readonly>
                                                        <button type="button" class="plus">+</button>
                                                    </div>
                                                </div>
                                                <div class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                    <button type="button" class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn" data-bs-toggle="modal" data-bs-target="#removeCartModal"><i class="ri-close-fill fs-lg"></i></button>
                                                    <h5 class="mb-0">$ <span class="product-line-price">159.99</span></h5>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="d-block dropdown-item product text-wrap p-2">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3 flex-shrink-0">
                                                    <div class="avatar-title bg-light rounded">
                                                        <img src="admin-assets/images/products/32/img-11.png" class="avatar-xs" alt="user-pic">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-1 fs-sm text-muted">Fashion</p>
                                                    <h6 class="mt-0 mb-3 fs-md">
                                                        <a href="#!" class="text-reset">Jeans blue men boxer</a>
                                                    </h6>
                                                    <div class="text-muted fw-medium d-none">$<span class="product-price">164.37</span></div>
                                                    <div class="input-step">
                                                        <button type="button" class="minus">–</button>
                                                        <input type="number" class="product-quantity" value="1" min="0" max="100" readonly>
                                                        <button type="button" class="plus">+</button>
                                                    </div>
                                                </div>
                                                <div class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                    <button type="button" class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn" data-bs-toggle="modal" data-bs-target="#removeCartModal"><i class="ri-close-fill fs-lg"></i></button>
                                                    <h5 class="mb-0">$ <span class="product-line-price">164.37</span></h5>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="d-block dropdown-item product text-wrap p-2">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3 flex-shrink-0">
                                                    <div class="avatar-title bg-light rounded">
                                                        <img src="admin-assets/images/products/32/img-8.png" class="avatar-xs" alt="user-pic">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-1 fs-sm text-muted">Fashion</p>
                                                    <h6 class="mt-0 mb-3 fs-md">
                                                        <a href="#!" class="text-reset">Full Sleeve Solid Men Sweatshirt</a>
                                                    </h6>
                                                    <div class="text-muted fw-medium d-none">$<span class="product-price">180.00</span></div>
                                                    <div class="input-step">
                                                        <button type="button" class="minus">–</button>
                                                        <input type="number" class="product-quantity" value="1" min="0" max="100" readonly>
                                                        <button type="button" class="plus">+</button>
                                                    </div>
                                                </div>
                                                <div class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                    <button type="button" class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn" data-bs-toggle="modal" data-bs-target="#removeCartModal"><i class="ri-close-fill fs-lg"></i></button>
                                                    <h5 class="mb-0">$ <span class="product-line-price">180.00</span></h5>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div id="count-table">
                                            <table class="table table-borderless mb-0  fw-semibold">
                                                <tbody>
                                                    <tr>
                                                        <td>Sub Total :</td>
                                                        <td class="text-end cart-subtotal">$1306.52</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Discount <span class="text-muted">(DOSIX15)</span>:</td>
                                                        <td class="text-end cart-discount">- $195.98</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping Charge :</td>
                                                        <td class="text-end cart-shipping">$65.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Estimated Tax (12.5%) : </td>
                                                        <td class="text-end cart-tax">$163.31</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
        
                                    </div>
                                </div>
                                <div class="p-3 border-bottom-0 border-start-0 border-end-0 border-dashed border" id="checkout-elem">
                                    <div class="d-flex justify-content-between align-items-center pb-3">
                                        <h5 class="m-0 text-muted">Total:</h5>
                                        <div class="px-2">
                                            <h5 class="m-0 cart-total">$1338.86</h5>
                                        </div>
                                    </div>
        
                                    <a href="apps-ecommerce-checkout.html" class="btn btn-info text-center w-100">
                                        Checkout
                                    </a>
                                </div>
                            </div>
                        </div>
        
                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle" data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-3xl'></i>
                            </button>
                        </div>
        
                        <div class="dropdown topbar-head-dropdown ms-1 header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle mode-layout" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-sun align-middle fs-3xl"></i>
                            </button>
                            <div class="dropdown-menu p-2 dropdown-menu-end" id="light-dark-mode">
                                <a href="#!" class="dropdown-item" data-mode="light"><i class="bx bx-sun align-middle me-2"></i> Default (light mode)</a>
                                <a href="#!" class="dropdown-item" data-mode="dark"><i class="bx bx-moon align-middle me-2"></i> Dark</a>
                                <a href="#!" class="dropdown-item" data-mode="auto"><i class="bx bx-desktop align-middle me-2"></i> Auto (system default)</a>
                            </div>
                        </div>
        
                        <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                <i class='bx bx-notification fs-3xl'></i>
                                <span class="position-absolute topbar-badge fs-3xs translate-middle badge rounded-pill bg-danger"><span class="notification-badge">3</span><span class="visually-hidden">unread messages</span></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
        
                                <div class="dropdown-head rounded-top">
                                    <div class="px-3 py-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="mb-0 fs-lg fw-semibold"> Notifications <span class="badge bg-danger-subtle text-danger fs-sm notification-badge"> 3</span></h6>
                                            </div>
                                            <div class="col-auto dropdown">
                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" class="link-secondary fs-md"><i class="bi bi-three-dots-vertical"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">All Clear</a></li>
                                                    <li><a class="dropdown-item" href="#">Mark all as read</a></li>
                                                    <li><a class="dropdown-item" href="#">Archive All</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="pb-2 ps-0" id="notificationItemsTabContent">
                                    <div data-simplebar style="max-height: 300px;" class="pe-0">
                                        <h6 class="text-overflow text-muted fs-sm my-2 notification-title px-3">Today</h6>
        
                                        <div class="text-reset notification-item d-block dropdown-item position-relative border-dashed border-bottom">
                                            <div class="d-flex">
                                                <div class="position-relative me-3 flex-shrink-0">
                                                    <img src="admin-assets/images/users/32/avatar-3.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                                    <span class="active-badge position-absolute start-100 translate-middle p-1 bg-danger rounded-circle">
                                                        <span class="visually-hidden">Un Active</span>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="fs-md text-muted">
                                                        <p class="mb-1 text-muted"><b>Angela Bernier</b> mentioned you in <a href="#!">This Project</a></p>
                                                    </div>
                                                    <p class="mb-0 fs-xs fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 48 min ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-base">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="all-notification-check02">
                                                        <label class="form-check-label" for="all-notification-check02"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="text-reset notification-item d-block dropdown-item position-relative border-dashed border-bottom">
                                            <div class="d-flex">
                                                <div class="position-relative me-3 flex-shrink-0">
                                                    <img src="admin-assets/images/users/32/avatar-2.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                                    <span class="active-badge position-absolute start-100 translate-middle p-1 bg-success rounded-circle">
                                                        <span class="visually-hidden">New alerts</span>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="fs-md text-muted">
                                                        <p class="mb-1">Answered to your comment on the cash flow forecast's graph 🔔.</p>
                                                    </div>
                                                    <p class="mb-0 fs-xs fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 1 hrs ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-base">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="all-notification-check02">
                                                        <label class="form-check-label" for="all-notification-check02"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                        <h6 class="text-overflow text-muted fs-sm my-3 px-3 notification-title">Read Before</h6>
        
                                        <div class="text-reset notification-item d-block dropdown-item position-relative border-dashed border-bottom">
                                            <div class="d-flex">
        
                                                <div class="position-relative me-3 flex-shrink-0">
                                                    <img src="admin-assets/images/users/32/avatar-8.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                                    <span class="active-badge position-absolute start-100 translate-middle p-1 bg-warning rounded-circle">
                                                        <span class="visually-hidden">New alerts</span>
                                                    </span>
                                                </div>
        
                                                <div class="flex-grow-1">
                                                    <div class="fs-md text-muted">
                                                        <p class="mb-1">We talked about a project on linkedin.</p>
                                                    </div>
                                                    <p class="mb-0 fs-xs fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 4 hrs ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-base">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="all-notification-check04">
                                                        <label class="form-check-label" for="all-notification-check04"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification-actions" id="notification-actions">
                                        <div class="d-flex text-muted justify-content-center align-items-center">
                                            Select <div id="select-content" class="text-body fw-semibold px-1">0</div> Result <button type="button" class="btn btn-link link-danger p-0 ms-2" data-bs-toggle="modal" data-bs-target="#removeNotificationModal">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="admin-assets/images/users/32/avatar-1.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Richard Marshall</span>
                                        <span class="d-none d-xl-block ms-1 fs-sm user-name-sub-text">Founder</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome Richard!</h6>
                                <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Messages</span></a>
                                <a class="dropdown-item" href="apps-tickets-overview.html"><i class="mdi mdi-calendar-check-outline text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
                                <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Help</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Balance : <b>$8451.36</b></span></a>
                                <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                                <a class="dropdown-item" href="auth-lockscreen.html"><i class="mdi mdi-lock text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
                                <a class="dropdown-item" href="auth-logout.html"><i class="mdi mdi-logout text-muted fs-lg align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body p-md-5">
                        <div class="text-center">
                            <div class="text-danger">
                                <i class="bi bi-trash display-4"></i>
                            </div>
                            <div class="mt-4 fs-base">
                                <h4 class="mb-1">Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                        </div>
                    </div>
        
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        <!-- removeCartModal -->
        <div id="removeCartModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-cartmodal"></button>
                    </div>
                    <div class="modal-body p-md-5">
                        <div class="text-center">
                            <div class="text-danger">
                                <i class="bi bi-trash display-5"></i>
                            </div>
                            <div class="mt-4">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this product ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="remove-cartproduct">Yes, Delete It!</button>
                        </div>
                    </div>
        
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->            
        <ul class="nav nav-underline menu-tabs flex-nowrap overflow-x-auto" id="menu-tabs">
            <li class="nav-item flex-shrink-0">
                <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item flex-shrink-0">
                <a class="nav-link" href="doctor-appointments.html">Appointments</a>
            </li>
            <li class="nav-item flex-shrink-0">
                <a class="nav-link" href="doctor-staff-list.html">Staff List</a>
            </li>
            <li class="nav-item flex-shrink-0">
                <a class="nav-link" href="doctor-list.html">Doctors</a>
            </li>
            <li class="nav-item flex-shrink-0">
                <a class="nav-link" href="doctor-patients.html">Patients</a>
            </li>
            <li class="nav-item flex-shrink-0">
                <a class="nav-link" href="doctor-department.html">Department</a>
            </li>
        </ul>
    </div>
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
