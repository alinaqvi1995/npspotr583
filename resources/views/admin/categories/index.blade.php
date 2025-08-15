@extends('admin.includes.partial.base')

@section('title', 'Quote')

@section('content')
    <h6 class="mb-0 text-uppercase">Categories</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="order-search position-relative my-3">
                <input class="form-control rounded-5 px-5" type="text" placeholder="Search">
                <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
            </div>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Amount</th>
                            <th>Vendor</th>
                            <th>Status</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <img src="https://placehold.co/110x110/png" class="rounded-circle" width="50"
                                            height="50" alt="">
                                    </div>
                                    <p class="mb-0">Sports Shoes</p>
                                </div>
                            </td>
                            <td>$149</td>
                            <td>Julia Sunota</td>
                            <td>
                                <p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">
                                    Completed</p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <p class="mb-0">5.0</p>
                                    <i class="material-icons-outlined text-warning fs-6">star</i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <img src="https://placehold.co/110x110/png" class="rounded-circle" width="50"
                                            height="50" alt="">
                                    </div>
                                    <p class="mb-0">Goldan Watch</p>
                                </div>
                            </td>
                            <td>$168</td>
                            <td>Julia Sunota</td>
                            <td>
                                <p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">
                                    Completed</p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <p class="mb-0">5.0</p>
                                    <i class="material-icons-outlined text-warning fs-6">star</i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <img src="https://placehold.co/110x110/png" class="rounded-circle" width="50"
                                            height="50" alt="">
                                    </div>
                                    <p class="mb-0">Men Polo Tshirt</p>
                                </div>
                            </td>
                            <td>$124</td>
                            <td>Julia Sunota</td>
                            <td>
                                <p class="dash-lable mb-0 bg-warning bg-opacity-10 text-warning rounded-2">Pending
                                </p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <p class="mb-0">4.0</p>
                                    <i class="material-icons-outlined text-warning fs-6">star</i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <img src="https://placehold.co/110x110/png" class="rounded-circle" width="50"
                                            height="50" alt="">
                                    </div>
                                    <p class="mb-0">Blue Jeans Casual</p>
                                </div>
                            </td>
                            <td>$289</td>
                            <td>Julia Sunota</td>
                            <td>
                                <p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">
                                    Completed</p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <p class="mb-0">3.0</p>
                                    <i class="material-icons-outlined text-warning fs-6">star</i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <img src="https://placehold.co/110x110/png" class="rounded-circle" width="50"
                                            height="50" alt="">
                                    </div>
                                    <p class="mb-0">Fancy Shirts</p>
                                </div>
                            </td>
                            <td>$389</td>
                            <td>Julia Sunota</td>
                            <td>
                                <p class="dash-lable mb-0 bg-danger bg-opacity-10 text-danger rounded-2">Canceled
                                </p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <p class="mb-0">2.0</p>
                                    <i class="material-icons-outlined text-warning fs-6">star</i>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
