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
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reject
                                Date
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rent Date
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Return
                                Date
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Report Date
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($data['history']))
                                <?php $i = 1 ?>
                            @foreach($data['history'] as $history)
                                <tr class="align-middle text-xs font-weight-bold mb-0">
                                    <td>
                                        <div class="d-flex ps-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-xs">{{ $i++ }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <img
                                            src="{{ $history['i_filename'] != null ? asset('item/' . $history['i_filename']) : asset('item/default.png') }}"
                                            height="120rem" alt="{{ $history['i_name'] }}">
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $history['i_name'] }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $history['req_date'] == null ? '-' : $history['req_date'] }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $history['app_date'] == null ? '-' : $history['app_date'] }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $history['rej_date'] == null ? '-' : $history['rej_date'] }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $history['rent_date'] == null ? '-' : $history['rent_date'] }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $history['rturn_date'] == null ? '-' : $history['rturn_date'] }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $history['report_date'] == null ? '-' : $history['report_date'] }}</p>
                                    </td>
                                    <td>
                                        <button
                                            class="w-100 btn text-uppercase text-xs text-light {{ ($history['rent_status'] == 'pending' ? 'btn-secondary' : ($history['rent_status'] == 'accepted' ? 'btn-primary' : ($history['rent_status'] == 'returned' ? 'btn-success' : ($history['rent_status'] == 'done' ? 'btn-success' : 'btn-danger')))) }}">
                                            {{ $history['rent_status'] }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="align-middle text-center font-weight-bold mb-0">
                                <td colspan="10">
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
