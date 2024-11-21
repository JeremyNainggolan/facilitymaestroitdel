@extends('layouts/app')
@section('title', $data['page_title'])

@section('content')
    <x-nav-bar></x-nav-bar>

    <div class="container my-3">
        <div class="card shadow-lg rounded-3 bg-body">
            <div class="card-header bg-transparent text-center">
                <h3 class="fw-bolder mb-0 text-dark text-uppercase">History</h3>
            </div>
            <div class="m-4 text-center">
                <x-history-nav></x-history-nav>
            </div>
            @if (session()->has('error'))
                <div class="m-4 text-white p-2 rounded-2 alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif
            @if (session()->has('success'))
                <div class="m-4 text-white p-2 rounded-2 alert-info text-center">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body px-5">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr class="">
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Picture
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Request
                                Date
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Approve
                                Date
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rent Date
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Return
                                Date
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($data['rents']))
                                <?php $i = 1 ?>
                            @foreach($data['rents'] as $rent)
                                <tr class="align-middle text-xs font-weight-bold mb-0">
                                    <td>
                                        <div class="d-flex ps-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-xs">{{ $i++ }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $rent['rent_user'] }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $rent['facility_name'] }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $rent['item_name'] }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $rent['request_date'] }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $rent['status'] }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $rent['condition'] }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/facility/detail/' . $rent['id']) }}" type="button"
                                           class="btn text-white"
                                           style="background-color: #8EAEC4"><i
                                                class="bi bi-pencil-square me-2"></i>Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="align-middle text-center font-weight-bold mb-0">
                                <td colspan="8">
                                    <h6 class="mb-0 text-xs fst-italic text-opacity-25">No Data Available</h6>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <hr class="horizontal dark">
    @include('components.footer')
@endsection
