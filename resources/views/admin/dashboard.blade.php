@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <x-admin-nav>{{ $data['page_title'] }}</x-admin-nav>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-8">
                <div class="row my-4">
                    <div class="col-xl-6 col-sm-12 mb-xl-0 mb-4">
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
                    <div class="col-xl-6 col-sm-12 mb-xl-0 mb-4">
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
                </div>
                <div class="row my-4">
                    <div class="col-xl-6 col-sm-12 mb-xl-0 mb-4">
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
                    <div class="col-xl-6 col-sm-12 mb-xl-0 mb-4">
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
                                        <i class="bi bi-exclamation-octagon text-danger text-3xl"
                                           aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row my-4">
                    <div class="col-xl-10 col-sm-12 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row my-1">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Rent Status</p>
                                            <div class="chart">
                                                <canvas id="pie-chart" class="chart-canvas" height="240" width="240"></canvas>
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", () => {
                                                        const statusLabels = [
                                                            'Pending',
                                                            'Accepted',
                                                            'Rejected',
                                                            'Returned',
                                                            'Done',
                                                            'Reported'
                                                        ];

                                                        const backgroundColors = [
                                                            'rgb(255, 165, 0)', // Pending
                                                            'rgb(50, 205, 50)', // Accepted
                                                            'rgb(255, 69, 58)', // Rejected
                                                            'rgb(255, 215, 0)', // Returned
                                                            'rgb(0, 128, 255)', // Done
                                                            'rgb(128, 0, 128)', // Reported
                                                        ];

                                                        const fetchStatusData = async () => {
                                                            const data = [];
                                                            for (const status of statusLabels) {
                                                                try {
                                                                    const response = await fetch(`http://localhost:8000/api/status/${status.toLowerCase()}`);
                                                                    const result = await response.json();

                                                                    if (result.status === "210") {
                                                                        data.push(result.data);
                                                                    } else {
                                                                        data.push(0);
                                                                    }
                                                                } catch (error) {
                                                                    console.error(`Error fetching data for status: ${status}`, error);
                                                                    data.push(0);
                                                                }
                                                            }
                                                            return data;
                                                        };

                                                        const initializeChart = async () => {
                                                            const statusData = await fetchStatusData();

                                                            new Chart(document.querySelector('#pie-chart'), {
                                                                type: 'pie',
                                                                data: {
                                                                    labels: statusLabels,
                                                                    datasets: [{
                                                                        label: 'Rent Status',
                                                                        data: statusData,
                                                                        backgroundColor: backgroundColors,
                                                                        hoverOffset: 4
                                                                    }]
                                                                }
                                                            });
                                                        };

                                                        initializeChart();
                                                    });
                                                </script>

                                            </div>
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
            </div>
        </div>
    </div>
@endsection
