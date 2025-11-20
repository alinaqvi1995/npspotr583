@extends('layouts.guest')
@section('title', 'Track Order')
@section('content')
<!--========== Breadcrumb Start ==============-->
<section class="breadcrumb-wrapper" data-bg-image="{{ asset('web-assets/images/banner/cta-bg.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-title text-center">Track Your Order</h1>
                    <div class="breadcrumb-link">
                        <span>
                            <a href="{{ url('/') }}">
                                <span>Home</span>
                            </a>
                        </span>
                        >
                        <span><span>Track Order</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--========== Breadcrumb End ==============-->

<!--========== Track Order Page Start ==============-->
<section class="tj-contact-page">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
                <div class="tj-section-heading text-center">
                    <span class="sub-title active-shape">Check Your Delivery</span>
                    <h3 class="title">Track Your Order</h3>
                    <p class="mt-2">Enter your order number, name, email, or phone to check the status.</p>
                </div>
                <div class="tj-animate-form d-flex align-items-center justify-content-center">
                    <form id="trackForm" class="animate-form w-100">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-10">
                                <div class="form__div">
                                    <input type="text" class="form__input" id="orderNumber" name="orderNumber" placeholder=" " required />
                                    <label class="form__label">Enter Order ID, Name, Email, or Phone</label>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="tj-theme-button">
                                    <button class="tj-primary-btn contact-btn" type="submit">
                                        Track Order <i class="flaticon-right-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Error message -->
                <div id="errorMsg" class="alert alert-danger mt-4 text-center d-none"></div>
            </div>

            <div class="col-lg-5">
                <div class="google-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11041.520444338936!2d-95.4889277!3d29.7131701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c03c8a12a8bb%3A0x6d1e23e05a553d97!2sBridgeway%20Logistics%20LLC!5e0!3m2!1sen!2sus!4v1694800000000!5m2!1sen!2sus"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!--========== Track Order Page End ==============-->

<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" id="orderDetails">

                <div id="loadingSpinner" class="text-center d-none">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2 mb-0">Fetching your order details...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--========== AJAX Script ==============-->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const trackForm = document.getElementById('trackForm');
        const errorMsg = document.getElementById('errorMsg');
        const orderDetails = document.getElementById('orderDetails');
        const loadingSpinner = document.getElementById('loadingSpinner');
        const modalElement = document.getElementById('orderModal');
        let orderModal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);

        if (!trackForm) {
            console.warn("⚠️ trackForm not found in DOM — make sure this script runs after the form.");
            return;
        }

        // Remove any previous listeners (prevent duplicates)
        trackForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Reset UI
            if (errorMsg) errorMsg.classList.add('d-none');
            if (orderDetails) orderDetails.innerHTML = '';
            if (loadingSpinner) loadingSpinner.classList.remove('d-none');

            // Show modal immediately (with spinner)
            orderModal.show();

            const formData = new FormData(trackForm);

            fetch("{{ route('track.order.fetch') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (loadingSpinner) loadingSpinner.classList.add('d-none');

                if (data.success) {
                    const order = data.data;

                    orderDetails.innerHTML = `
                        <div class="text-center">
                            <h5 class="mb-3">Order #${order.order_id}</h5>
                            <p><strong>Status:</strong> 
                                <span class="badge bg-${order.status === 'New' ? 'primary' : 'success'}">${order.status}</span>
                            </p>
                            ${order.pickup_date ? `<p><strong>Pickup Date:</strong> ${order.pickup_date}</p>` : ''}
                            ${order.delivery_date ? `<p><strong>Delivery Date:</strong> ${order.delivery_date}</p>` : ''}
                            <p><strong>Order Created:</strong> ${order.created_at}</p>
                        </div>
                    `;
                } else {
                    orderDetails.innerHTML = `
                        <div class="alert alert-warning text-center mb-0">${data.message}</div>
                    `;
                }
            })
            .catch(err => {
                if (loadingSpinner) loadingSpinner.classList.add('d-none');
                orderDetails.innerHTML = `
                    <div class="alert alert-danger text-center mb-0">An error occurred. Please try again later.</div>
                `;
                console.error("Fetch error:", err);
            });
        });
    });
</script>

@endsection