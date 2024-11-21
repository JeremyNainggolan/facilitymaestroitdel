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
                <div class="text-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session()->has('success'))
                <div class="text-success">
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
                                    <p class="text-xs font-weight-bold mb-0">{{ $rent['i_name'] != null ? $rent['i_name'] : '-' }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $rent['req_date'] }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $rent['rent_status'] }}</p>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('admin/rent/detail/' . $rent['rent_id']) }}" type="button"
                                       class="btn text-white"
                                       style="background-color: #8EAEC4"><i
                                            class="bi bi-info-circle me-2"></i>Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="align-middle text-center font-weight-bold mb-0">
                            <td colspan="7">
                                <h6 class="mb-0 text-xs fst-italic text-opacity-25">No Data Available</h6>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
@endsection