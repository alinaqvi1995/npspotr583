<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorization Form | Bridgeway Logistics LLC</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('invoice-assets/css/bootstrap.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('invoice-assets/css/style.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .auth-container {
            max-width: 900px;
            margin: 40px auto;
        }
    </style>
</head>

<body>

    <div class="container auth-container">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    {{-- <img src="{{ asset('web-assets/images/logo/1-logo.png') }}" alt="Logo" width="150" class="mb-3"> --}}
                    <h3 class="fw-bold text-primary">Credit Card Authorization Form</h3>
                    <p class="text-muted">Please complete the form below to authorize the transaction.</p>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('authorization.store', $encrypted) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Date</label>
                            <input type="text" name="auth_date" class="form-control bg-light"
                                value="{{ date('Y-m-d') }}" readonly required style="cursor: not-allowed;">
                        </div>

                        <div class="col-md-12">
                            <div class="alert alert-light border">
                                <i class="material-icons-outlined align-middle me-1">info</i>
                                This signed form authorizes <strong>Bridgeway Logistics LLC</strong>
                                to charge your credit card for the amount shown.
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">This form is for the purchase of</label>
                            <input type="text" name="purchase_for" class="form-control"
                                value="{{ $quote->vehicles->map(fn($v) => $v->year . ' ' . $v->make . ' ' . $v->model)->implode(', ') }}"
                                readonly required>
                            <small class="text-muted">Vehicle information from Quote #{{ $quote->id }}</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Company Name</label>
                            <input type="text" name="company_name" class="form-control"
                                value="{{ old('company_name') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Cardholder's Name (As on Card)</label>
                            <input type="text" name="cardholder_name" class="form-control" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Billing Address</label>
                            <input type="text" name="billing_address" class="form-control"
                                value="{{ old('billing_address') }}" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">City</label>
                            <input type="text" name="city" class="form-control" value="{{ old('city') }}"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">State</label>
                            <input type="text" name="state" class="form-control" value="{{ old('state') }}"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Zip Code</label>
                            <input type="text" name="zip" class="form-control" value="{{ old('zip') }}"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone Number</label>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone', $quote->customer_phone) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Card Type</label>
                            <select name="card_type" class="form-select" required>
                                <option value="">Select</option>
                                <option value="Visa" {{ old('card_type') == 'Visa' ? 'selected' : '' }}>Visa</option>
                                <option value="Mastercard" {{ old('card_type') == 'Mastercard' ? 'selected' : '' }}>
                                    Mastercard</option>
                                <option value="American Express"
                                    {{ old('card_type') == 'American Express' ? 'selected' : '' }}>American Express
                                </option>
                                <option value="Discover" {{ old('card_type') == 'Discover' ? 'selected' : '' }}>
                                    Discover</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Card Number</label>
                            <input type="text" name="card_number" class="form-control"
                                value="{{ old('card_number') }}" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Expiration Date</label>
                            <input type="text" name="expiry_date" placeholder="MM/YY" class="form-control"
                                value="{{ old('expiry_date') }}" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Security Code (CVV)</label>
                            <input type="text" name="cvv" class="form-control" value="{{ old('cvv') }}"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Issuing Bank</label>
                            <input type="text" name="issuing_bank" class="form-control"
                                value="{{ old('issuing_bank') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Bank Phone Number</label>
                            <input type="text" name="bank_number" class="form-control"
                                value="{{ old('bank_number') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Invoice Amount ($)</label>
                            <input type="number" step="0.01" name="invoice_amount" class="form-control"
                                value="{{ old('invoice_amount', $quote->amount_to_pay) }}" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Upload Card & Driving License (Front & Back)</label>
                            <input type="file" name="attachments[]" class="form-control" multiple required>
                            <div id="attachmentPreview" class="mt-3"></div>
                            <small class="text-danger">Upload clear pictures of the front & back of your card and
                                driving license.</small>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Cardholder’s Signature (Electronic)</label>

                            <div class="border rounded p-2 bg-white" style="width:100%; max-width:400px;">
                                <canvas id="signaturePad"
                                    style="width:100%; height:200px; border:1px solid #ccc;"></canvas>
                            </div>

                            <button type="button" class="btn btn-sm btn-secondary mt-2"
                                id="clearSignature">Clear</button>

                            <!-- Hidden input to store Base64 signature -->
                            <input type="hidden" name="signature_image" id="signatureImage"
                                value="{{ old('signature_image') }}" required>
                        </div>


                        <div class="col-md-12 mt-4 text-center">
                            <button type="submit" id="submitBtn"
                                class="btn btn-lg btn-primary px-5 rounded-pill shadow">
                                <span id="btnText">Submit Authorization</span>
                                <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="true"></span>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <p class="text-center text-muted mt-3 small">&copy; {{ date('Y') }} Bridgeway Logistics LLC. All rights
            reserved.</p>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // UX: Disable button and show spinner on submit
            const form = document.querySelector('form');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');

            if (form) {
                form.addEventListener('submit', function() {
                    // Check validity first (if using browser validation)
                    if (this.checkValidity()) {
                        submitBtn.disabled = true;
                        btnText.textContent = 'Submitting...';
                        btnSpinner.classList.remove('d-none');
                    }
                });
            }

            // ---------------------------------------
            // IMAGE PREVIEW FOR ATTACHMENTS
            // ---------------------------------------
            const fileInput = document.querySelector('input[name="attachments[]"]');

            if (fileInput) {
                fileInput.addEventListener("change", function() {
                    const previewContainer = document.getElementById("attachmentPreview");
                    previewContainer.innerHTML = "";

                    Array.from(this.files).forEach((file, index) => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const div = document.createElement("div");
                            div.classList.add("d-inline-block", "position-relative", "m-2");
                            div.style.width = "100px";
                            div.style.height = "100px";

                            div.innerHTML = `
                            <img src="${e.target.result}" class="img-thumbnail" style="width:100%;height:100%;object-fit:cover;">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 removePreview" data-index="${index}">&times;</button>
                        `;

                            previewContainer.appendChild(div);
                        };
                        reader.readAsDataURL(file);
                    });
                });

                document.addEventListener("click", function(e) {
                    if (e.target.classList.contains("removePreview")) {
                        const index = e.target.dataset.index;
                        const dt = new DataTransfer();

                        Array.from(fileInput.files).forEach((file, i) => {
                            if (i !== Number(index)) dt.items.add(file);
                        });

                        fileInput.files = dt.files;
                        e.target.parentElement.remove();
                    }
                });
            }


            // ---------------------------------------
            // SIGNATURE PAD
            // ---------------------------------------
            const canvas = document.getElementById("signaturePad");
            const signatureImage = document.getElementById("signatureImage");
            const clearBtn = document.getElementById("clearSignature");

            const ctx = canvas.getContext("2d");

            // Fix canvas resolution
            function resizeCanvas() {
                const ratio = Math.max(window.devicePixelRatio || 1, 1);
                const width = canvas.offsetWidth;
                const height = canvas.offsetHeight;
                canvas.width = width * ratio;
                canvas.height = height * ratio;
                ctx.scale(ratio, ratio);
            }
            resizeCanvas();
            // window.addEventListener("resize", resizeCanvas); // resizing clears canvas, handle better if needed

            let drawing = false;

            function startDrawing(e) {
                drawing = true;
                ctx.beginPath();
                ctx.moveTo(getX(e), getY(e));
                e.preventDefault(); // prevent scrolling on touch
            }

            function draw(e) {
                if (!drawing) return;
                ctx.lineTo(getX(e), getY(e));
                ctx.strokeStyle = "#000";
                ctx.lineWidth = 2;
                ctx.stroke();
                e.preventDefault();
            }

            function stopDrawing() {
                if (drawing) {
                    drawing = false;
                    // Save signature in hidden input
                    signatureImage.value = canvas.toDataURL("image/png");
                }
            }

            function getX(e) {
                let clientX = e.clientX;
                if (e.touches && e.touches.length > 0) {
                    clientX = e.touches[0].clientX;
                }
                return clientX - canvas.getBoundingClientRect().left;
            }

            function getY(e) {
                let clientY = e.clientY;
                if (e.touches && e.touches.length > 0) {
                    clientY = e.touches[0].clientY;
                }
                return clientY - canvas.getBoundingClientRect().top;
            }

            // Mouse events
            canvas.addEventListener("mousedown", startDrawing);
            canvas.addEventListener("mousemove", draw);
            canvas.addEventListener("mouseup", stopDrawing);
            canvas.addEventListener("mouseleave", stopDrawing);

            // Touch events (mobile)
            canvas.addEventListener("touchstart", startDrawing, {
                passive: false
            });
            canvas.addEventListener("touchmove", draw, {
                passive: false
            });
            canvas.addEventListener("touchend", stopDrawing);

            // Clear signature
            clearBtn.addEventListener("click", function() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                signatureImage.value = "";
            });

        });
    </script>
</body>

</html>
