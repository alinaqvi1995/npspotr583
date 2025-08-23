@extends('dashboard.includes.partial.base')
@section('title', 'Home')
@section('meta_description', 'Explore our SaaS solutions tailored to your business.')
@section('meta_keywords', 'SaaS, services, business software')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dashboard</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Invoice</li>
        </ol>
        </nav>
    </div>
    </div>
    <!--end breadcrumb-->
    <div class="card radius-10">
    <div class="card-header py-3">
        <div class="row align-items-center g-3">
        <div class="col-12 col-lg-6">
            <h5 class="mb-0">Bridgeway Logistics LLC</h5>
        </div>
        <div class="col-12 col-lg-6 text-md-end">
            <a href="javascript:;" class="btn btn-danger btn-sm me-2">
            <i class="bi bi-file-earmark-pdf me-2"></i>Export as PDF
            </a>
            <a href="javascript:;" onclick="window.print()" class="btn btn-dark btn-sm">
            <i class="bi bi-printer-fill me-2"></i>Print
            </a>
        </div>
        </div>
    </div>

    <div class="card-header py-2">
        <div class="row row-cols-1 row-cols-lg-3">
        <div class="col">
            <div class="">
            <small>From</small>
            <address class="m-t-5 m-b-5">
                <strong class="text-inverse">Bridgeway Logistics LLC</strong><br>
                123 Main Street<br>
                Houston, TX 77001<br>
                Phone: +1 (713) 470-6157<br>
                Email: quote@bridgewaylogisticsllc.com
            </address>
            </div>
        </div>
        <div class="col">
            <div class="">
            <small>To</small>
            <address class="m-t-5 m-b-5">
                <strong class="text-inverse">Client Company</strong><br>
                456 Client Road<br>
                Dallas, TX 75201<br>
                Phone: (214) 555-7890<br>
                Email: client@email.com
            </address>
            </div>
        </div>
        <div class="col">
            <div class="">
            <small>Invoice / August Period</small>
            <div class=""><b>August 23, 2025</b></div>
            <div class="invoice-detail">
                #INV-2025-0823<br>
                Auto Transport Services
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-invoice">
            <thead>
            <tr>
                <th>SERVICE DESCRIPTION</th>
                <th class="text-center" style="width: 10%;">RATE</th>
                <th class="text-center" style="width: 10%;">UNITS</th>
                <th class="text-right" style="width: 10%;">LINE TOTAL</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                <span class="text-inverse">Car Transport (Houston to Dallas)</span><br>
                <small>Safe and insured door-to-door vehicle shipping.</small>
                </td>
                <td class="text-center">$650.00</td>
                <td class="text-center">1</td>
                <td class="text-right">$650.00</td>
            </tr>
            <tr>
                <td>
                <span class="text-inverse">Motorcycle Transport</span><br>
                <small>Specialized trailer shipping for motorcycles.</small>
                </td>
                <td class="text-center">$400.00</td>
                <td class="text-center">1</td>
                <td class="text-right">$400.00</td>
            </tr>
            <tr>
                <td>
                <span class="text-inverse">Heavy Equipment Transport</span><br>
                <small>Secure and professional handling of construction equipment.</small>
                </td>
                <td class="text-center">$1,200.00</td>
                <td class="text-center">1</td>
                <td class="text-right">$1,200.00</td>
            </tr>
            </tbody>
        </table>
        </div>

        <div class="row bg-light align-items-center m-0">
        <div class="col col-auto p-4">
            <p class="mb-0">SUBTOTAL</p>
            <h4 class="mb-0">$2,250.00</h4>
        </div>
        <div class="col col-auto p-4">
            <i class="bi bi-plus-lg text-muted"></i>
        </div>
        <div class="col col-auto me-auto p-4">
            <p class="mb-0">Processing Fee (3%)</p>
            <h4 class="mb-0">$67.50</h4>
        </div>
        <div class="col bg-primary col-auto p-4">
            <p class="mb-0 text-white">TOTAL</p>
            <h4 class="mb-0 text-white">$2,317.50</h4>
        </div>
        </div><!--end row-->

        <hr>
        <!-- begin invoice-note -->
        <div class="my-3">
        * Make all payments payable to <strong>Bridgeway Logistics LLC</strong><br>
        * Payment is due within <strong>15 days</strong><br>
        * For any queries regarding this invoice, contact us at <strong>quote@bridgewaylogisticsllc.com</strong>
        </div>
        <!-- end invoice-note -->
    </div>

    <div class="card-footer py-3 bg-transparent">
        <p class="text-center mb-2">
        THANK YOU FOR CHOOSING BRIDGEWAY LOGISTICS
        </p>
        <p class="text-center d-flex align-items-center gap-3 justify-content-center mb-0">
        <span class=""><i class="bi bi-globe"></i> www.bridgewaylogisticsllc.com</span>
        <span class=""><i class="bi bi-telephone-fill"></i> +1 (713) 470-6157</span>
        <span class=""><i class="bi bi-envelope-fill"></i> quote@bridgewaylogisticsllc.com</span>
        </p>
    </div>
    </div>
@endsection