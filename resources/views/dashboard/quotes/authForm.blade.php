@extends('dashboard.includes.partial.base')
@section('title', 'authorization')

@section('content')

<div class="card">
    <div class="card-body p-4">
        <h4 class="mb-4 text-center">Credit Card Authorization Form</h4>

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" required>
                </div>

                <div class="col-md-12">
                    <p>This signed form authorizes <strong>Bridgeway Logistics LLC</strong> 
                    to charge your credit card for the amount shown.</p>
                </div>

                <div class="col-md-12">
                    <label class="form-label">This form is for the purchase of</label>
                    <input type="text" name="purchase_for" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company_name" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Cardholder's Name (As on Card)</label>
                    <input type="text" name="cardholder_name" class="form-control" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Billing Address</label>
                    <input type="text" name="billing_address" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">State</label>
                    <input type="text" name="state" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Zip Code</label>
                    <input type="text" name="zip" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Card Type</label>
                    <select name="card_type" class="form-select" required>
                        <option value="">Select</option>
                        <option value="Visa">Visa</option>
                        <option value="Mastercard">Mastercard</option>
                        <option value="American Express">American Express</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Card Number</label>
                    <input type="text" name="card_number" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Expiration Date</label>
                    <input type="text" name="expiry_date" placeholder="MM/YY" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Security Code (CVV)</label>
                    <input type="text" name="cvv" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Issuing Bank</label>
                    <input type="text" name="issuing_bank" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Bank Phone Number</label>
                    <input type="text" name="bank_number" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Invoice Amount ($)</label>
                    <input type="number" name="invoice_amount" class="form-control" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Upload Card & Driving License (Front & Back)</label>
                    <input type="file" name="attachments[]" class="form-control" multiple required>
                    <div id="attachmentPreview" class="mt-3"></div>
                    <small class="text-danger">Upload clear pictures of the front & back of your card and driving license.</small>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Cardholder’s Signature (Electronic)</label>

                    <div class="border rounded p-2" style="width:100%; max-width:400px;">
                        <canvas id="signaturePad" style="width:100%; height:200px; border:1px solid #ccc;"></canvas>
                    </div>

                    <button type="button" class="btn btn-sm btn-secondary mt-2" id="clearSignature">Clear</button>

                    <!-- Hidden input to store Base64 signature -->
                    <input type="hidden" name="signature_image" id="signatureImage" required>
                </div>


                <div class="col-md-12 mt-4 text-center">
                    <button type="submit" class="btn btn-primary px-4">Submit Authorization</button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
@section('extra_js')
<script>
    document.addEventListener("DOMContentLoaded", function () {

        // ---------------------------------------
        // IMAGE PREVIEW FOR ATTACHMENTS
        // ---------------------------------------
        const fileInput = document.querySelector('input[name="attachments[]"]');

        if (fileInput) {
            fileInput.addEventListener("change", function () {
                const previewContainer = document.getElementById("attachmentPreview");
                previewContainer.innerHTML = "";

                Array.from(this.files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function (e) {
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

            document.addEventListener("click", function (e) {
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
            const ratio = window.devicePixelRatio || 1;
            const width = canvas.offsetWidth;
            const height = canvas.offsetHeight;
            canvas.width = width * ratio;
            canvas.height = height * ratio;
            ctx.scale(ratio, ratio);
        }
        resizeCanvas();
        window.addEventListener("resize", resizeCanvas);

        let drawing = false;

        function startDrawing(e) {
            drawing = true;
            ctx.beginPath();
            ctx.moveTo(getX(e), getY(e));
        }

        function draw(e) {
            if (!drawing) return;
            ctx.lineTo(getX(e), getY(e));
            ctx.strokeStyle = "#000";
            ctx.lineWidth = 2;
            ctx.stroke();
        }

        function stopDrawing() {
            drawing = false;

            // Save signature in hidden input
            signatureImage.value = canvas.toDataURL("image/png");
        }

        function getX(e) {
            return e.clientX - canvas.getBoundingClientRect().left;
        }
        function getY(e) {
            return e.clientY - canvas.getBoundingClientRect().top;
        }

        // Mouse events
        canvas.addEventListener("mousedown", startDrawing);
        canvas.addEventListener("mousemove", draw);
        canvas.addEventListener("mouseup", stopDrawing);
        canvas.addEventListener("mouseleave", stopDrawing);

        // Touch events (mobile)
        canvas.addEventListener("touchstart", function (e) {
            e.preventDefault();
            startDrawing(e.touches[0]);
        });
        canvas.addEventListener("touchmove", function (e) {
            e.preventDefault();
            draw(e.touches[0]);
        });
        canvas.addEventListener("touchend", stopDrawing);

        // Clear signature
        clearBtn.addEventListener("click", function () {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            signatureImage.value = "";
        });

    });
</script>
@endsection