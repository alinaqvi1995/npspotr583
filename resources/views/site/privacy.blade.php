@extends('layouts.guest')

@section('title', 'Privacy Policy')

@section('content')

        <!--========== breadcrumb Start ==============-->
        <section class="breadcrumb-wrapper" data-bg-image="{{ asset('web-assets/images/banner/cta-bg.webp') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <h1 class="breadcrumb-title text-center">Privacy Policy</h1>
                            <div class="breadcrumb-link">
                                <span>
                                    <a href="index.html">
                                        <span>Home</span>
                                    </a>
                                </span>
                                >
                                <span>
                                    <span> Privacy Policy</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--========== breadcrumb End ==============-->

<!--========== Privacy Policy Content ==============-->
<section class="py-5 bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="bg-white rounded-3xl shadow-lg p-5">
                    
                    <h2 class="text-xl font-bold text-gray mb-5">Privacy Policy</h2>
                    <p class="text-gray mb-10">Effective Date: <strong>January 2025</strong></p>

                    <div class="space-y-10 text-gray-700 leading-relaxed">
                        <div>
                            <h3 class="text-xl font-semibold mb-2">1. Information We Collect</h3>
                            <p>We may collect the following types of information:</p>
                            <ul class="list-disc pl-6 mt-2 space-y-1">
                                <li><strong>Personal Details:</strong> Name, email, phone number, pickup/drop-off addresses, and vehicle details.</li>
                                <li><strong>Payment Details:</strong> We do not store card/banking data; all payments are processed securely via third parties.</li>
                                <li><strong>Service &amp; Usage Info:</strong> Data required to provide and improve our services. We do not track IPs or online behavior.</li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold mb-2">2. What We Do With Your Information</h3>
                            <ul class="list-disc pl-6 space-y-1">
                                <li>Conduct and manage vehicle transport services.</li>
                                <li>Send quotes, confirmations, pickup/delivery updates, and reminders.</li>
                                <li>Verify transactions with safe payment processing.</li>
                                <li>Improve customer service and support.</li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold mb-2">3. Sharing Information</h3>
                            <p>We do not sell or rent personal data. We share limited details only with carriers or payment providers required to fulfill services.</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold mb-2">4. SMS &amp; Communication Policy</h3>
                            <p>By opting in, you may receive SMS updates regarding:</p>
                            <ul class="list-disc pl-6 space-y-1">
                                <li>Pickup &amp; delivery schedules</li>
                                <li>Transport status updates</li>
                                <li>Service reminders</li>
                            </ul>
                            <p class="mt-2 text-sm text-gray-500">Message frequency varies. Standard rates apply. Reply <strong>STOP</strong> to unsubscribe, <strong>HELP</strong> for assistance.</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold mb-2">5. Cookies &amp; Tracking</h3>
                            <p>Bridgeway does not use cookies or tracking tools for advertising or behavior monitoring.</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold mb-2">6. Data Security</h3>
                            <p>We apply industry-standard security measures to prevent unauthorized access or misuse of your information.</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold mb-2">7. Changes to This Policy</h3>
                            <p>This policy may be updated periodically. Continued use of our site or services implies acceptance of any changes.</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold mb-2">8. Contact Us</h3>
                            <p>If you have questions, reach us at:</p>
                            <ul class="mt-2 space-y-1">
                                <li>Email: <a href="mailto:info@bridgewaylogistics.com" class="text-blue-600 hover:underline">info@bridgewaylogistics.com</a></li>
                                <li>Phone: <a href="tel:+17134706157" class="text-blue-600 hover:underline">+1 (713) 470-6157</a></li>
                            </ul>
                        </div>
                    </div>

                    <p class="mt-10 text-gray-500 text-sm">✅ By using our services, you agree to this Privacy Policy.</p>
                </div>
            </div>
        </div>
    </div>
</section>>


@endsection