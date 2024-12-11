@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <x-admin-nav>{{ $data['page_title'] }}</x-admin-nav>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 pt-3 ">
                <h6 class="text-capitalize">{{ $data['page_header'] }}</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr class="">
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Reason</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Request Date
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rent Date</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Return Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Status
                        </th>
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
                                    <p class="text-xs font-weight-bold mb-0">{{ $history['reason'] }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $history['req_date'] }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $history['rent_date'] }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $history['rturn_date'] }}</p>
                                </td>
                                <td class="text-center">
                                    <button
                                        class="fw-bolder btn text-uppercase text-xs text-light {{ ($history['rent_status'] == 'pending' ? 'btn-secondary' : ($history['rent_status'] == 'accepted' ? 'btn-primary' : ($history['rent_status'] == 'returned' ? 'btn-success' : ($history['rent_status'] == 'done' ? 'btn-success' : 'btn-danger')))) }}">
                                        {{ $history['rent_status'] }}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="align-middle text-xs font-weight-bold mb-0">
                            <td>
                                <div class="d-flex ps-3 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs fst-italic text-opacity-25">No Data Available</h6>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
