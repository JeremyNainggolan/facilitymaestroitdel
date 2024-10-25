@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <div class="col-lg-9 col-md-6 p-4">
        <p>Pages / {{ $data['page_header'] }}</p>

        <h3 class="mb-4"><?= $data['page_header'] ?></h3>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-lg-3">
                <div class="card text-start shadow border-light">
                    <div class="card-title mx-3 mt-4 fw-medium">
                        Total Users
                    </div>
                    <div class="card-body">
                        <p class="pb-2 fs-2 fw-bolder"><i class="bi bi-people pe-3"
                                                          style="font-size: 2.4rem"></i>{{ $data['total_user'] > 1 ? $data['total_user'] . ' Users' : $data['total_user'] . ' User' }}
                        </p>
                        <a href="{{ url('admin/user') }}" class="text-decoration-none fst-italic"
                           style="color: #777777">View Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-lg-3">
                <div class="card text-start shadow border-light">
                    <div class="card-title mx-3 mt-4 fw-medium">
                        Total Items
                    </div>
                    <div class="card-body">
                        <p class="pb-2 fs-2 fw-bolder"><i class="bi bi-laptop pe-3" style="font-size: 2.4rem"></i>{{ $data['total_item'] > 1 ? $data['total_item'] . ' Items' : $data['total_item'] . ' Item' }}</p>
                        <a href="{{ url('admin/item') }}" class="text-decoration-none fst-italic"
                           style="color: #777777">View Detail</a>
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
                        <p class="pb-2 fs-2 fw-bolder"><i class="bi bi-building pe-3" style="font-size: 2.4rem"></i>3
                            Facilities</p>
                        <a href="{{ url('admin/facility') }}" class="text-decoration-none fst-italic"
                           style="color: #777777">View Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-lg-3">
                <div class="card text-start shadow border-light">
                    <div class="card-title mx-3 mt-4 fw-medium">
                        Total Report
                    </div>
                    <div class="card-body">
                        <p class="pb-2 fs-2 fw-bolder"><i class="bi bi-exclamation-octagon pe-3"
                                                          style="font-size: 2.4rem"></i>2 Report</p>
                        <a href="{{ url('admin/report') }}" class="text-decoration-none fst-italic"
                           style="color: #777777">View Detail</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
