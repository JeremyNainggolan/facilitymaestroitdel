@extends('layouts/app')
@section('title', 'Dashboard')
@section('content')
    <div class="d-flex">

        <aside class="min-vh-100 align-items-center d-flex">
            <x-side-nav-bar></x-side-nav-bar>
        </aside>
        <div class="col-lg-9 col-md-6 p-4">
            <p>Pages / Dashboard</p>

            <h3 class="mb-4">Dashboard</h3>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-lg-3">
                    <div class="card text-start shadow border-light">
                        <div class="card-title mx-3 mt-4 fw-medium">
                            Total Users
                        </div>
                        <div class="card-body">
                            <p class="pb-2 fs-2 fw-bolder"><i class="bi bi-people pe-3" style="font-size: 2.4rem"></i>48 Users</p>
                            <a href="#" class="text-decoration-none fst-italic" style="color: #777777">View Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-lg-3">
                    <div class="card text-start shadow border-light">
                        <div class="card-title mx-3 mt-4 fw-medium">
                            Total Items
                        </div>
                        <div class="card-body">
                            <p class="pb-2 fs-2 fw-bolder"><i class="bi bi-laptop pe-3" style="font-size: 2.4rem"></i>128 Items</p>
                            <a href="#" class="text-decoration-none fst-italic" style="color: #777777">View Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-lg-3">
                    <div class="card text-start shadow border-light">
                        <div class="card-title mx-3 mt-4 fw-medium">
                            Rent Status
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-lg-4 col-md-6 col-lg-3">
                    <div class="card text-start shadow border-light">
                        <div class="card-title mx-3 mt-4 fw-medium">
                            Facility Available
                        </div>
                        <div class="card-body">
                            <p class="pb-2 fs-2 fw-bolder"><i class="bi bi-building pe-3" style="font-size: 2.4rem"></i>3 Facilities</p>
                            <a href="#" class="text-decoration-none fst-italic" style="color: #777777">View Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-lg-3">
                    <div class="card text-start shadow border-light">
                        <div class="card-title mx-3 mt-4 fw-medium">
                            Total Report
                        </div>
                        <div class="card-body">
                            <p class="pb-2 fs-2 fw-bolder"><i class="bi bi-exclamation-octagon pe-3" style="font-size: 2.4rem"></i>2 Report</p>
                            <a href="#" class="text-decoration-none fst-italic" style="color: #777777">View Detail</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
