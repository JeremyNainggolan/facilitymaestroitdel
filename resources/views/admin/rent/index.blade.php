@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <x-admin-nav>{{ $data['page_title'] }}</x-admin-nav>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 pt-3 ">
                <h6 class="text-capitalize">{{ $data['page_header'] }}</h6>
            </div>
            <div class="m-4">
                <x-nav-tabs></x-nav-tabs>
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
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr class="">
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rent User
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Facility Name
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reason</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Request Date
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Action
                        </th>
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
                                    <p class="text-xs font-weight-bold mb-0">{{ $rent['user_name'] }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $rent['fa_name'] != null ? $rent['fa_name'] : '-' }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $rent['reason'] != null ? $rent['reason'] : '-' }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $rent['i_name'] != null ? $rent['i_name'] : '-' }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $rent['req_date'] }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $rent['rent_status'] }}</p>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('post.request') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $rent['rent_id'] }}" id="rent_id" name="rent_id">
                                        <input type="hidden" value="{{ $rent['facility_id'] }}" id="facility_id"
                                               name="facility_id">
                                        <input type="hidden" value="{{ $rent['item_id'] }}" id="item_id" name="item_id">
                                        <button class="btn btn-success" type="submit" id="status" name="status"
                                                value="accepted">
                                            <i class="bi bi-arrow-up-circle me-2"></i>Approve
                                        </button>
                                        <button class="btn btn-danger" type="submit" id="status" name="status"
                                                value="rejected">
                                            <i class="bi bi-slash-circle me-2"></i>Reject
                                        </button>
                                    </form>
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
@endsection
