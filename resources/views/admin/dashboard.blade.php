@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <x-admin-nav>{{ $data['page_title'] }}</x-admin-nav>
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row my-1">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total User</p>
                                    <h5 class="font-weight-bolder mt-2">
                                        {{ $data['total_user'] > 1 ? $data['total_user'] . ' Users' : $data['total_user'] . ' User' }}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-secondary text-sm font-weight-bolder"><a
                                                href="{{ url('admin/user') }}"
                                                class="text-decoration-none text-secondary">View Detail</a></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <i class="bi bi-person-circle text-primary text-3xl" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row my-1">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Item</p>
                                    <h5 class="font-weight-bolder mt-2">
                                        {{ $data['total_item'] > 1 ? $data['total_item'] . ' Items' : $data['total_item'] . ' Item' }}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-secondary text-sm font-weight-bolder"><a
                                                href="{{ url('admin/item') }}"
                                                class="text-decoration-none text-secondary">View Detail</a></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <i class="bi bi-laptop text-success text-3xl" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row my-1">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Rent Status</p>
                                    <h5 class="font-weight-bolder mt-2">
                                        ...
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <i class="bi bi-app-indicator text-danger text-4xl" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row my-1">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Facility</p>
                                    <h5 class="font-weight-bolder mt-2">
                                        {{ $data['total_facility'] > 1 ? $data['total_facility'] . ' Facilities' : $data['total_facility'] . ' Facility' }}
                                    </h5>
                                    <p class="mb-0">
                                            <span class="text-secondary text-sm font-weight-bolder"><a
                                                    href="{{ url('admin/facility') }}"
                                                    class="text-decoration-none text-secondary">View Detail</a></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <i class="bi bi-building text-success text-3xl" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row my-1">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Report</p>
                                    <h5 class="font-weight-bolder mt-2">
                                        {{ $data['total_report'] > 1 ? $data['total_report'] . ' Reports' : $data['total_report'] . ' Report' }}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-secondary text-sm font-weight-bolder"><a
                                                href="{{ url('admin/report') }}"
                                                class="text-decoration-none text-secondary">View Detail</a></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <i class="bi bi-exclamation-octagon text-danger text-3xl" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
