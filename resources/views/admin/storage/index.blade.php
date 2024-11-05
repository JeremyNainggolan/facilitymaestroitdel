@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <x-admin-nav>{{ $data['page_title'] }}</x-admin-nav>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 pt-3 ">
                <h6 class="text-capitalize">{{ $data['page_header'] }}<a
                        href="{{ url('admin/storage/add') }}" class="text-decoration-none text-dark"><i
                            class="bi bi-node-plus-fill ms-2"></i></a></h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr class="">
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Picture
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Detail</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Capacity</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($data['storages']))
                            <?php $i = 1 ?>
                        @foreach($data['storages'] as $storage)
                            <tr class="align-middle text-xs font-weight-bold mb-0">
                                <td>
                                    <div class="d-flex ps-3 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">{{ $i++ }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <img alt=""
                                         src="{{ asset($storage['filename'] != null ? 'item/' . $storage['filename'] : 'item/default.png') }}"
                                         height="120rem">
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $storage['name'] }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $storage['detail'] }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $storage['capacity'] }}</p>
                                </td>

                                <td class="text-center">
                                    <a href="{{ url('admin/storage/edit/' . $storage['id']) }}" type="button"
                                       class="btn text-white"
                                       style="background-color: #8EAEC4"><i
                                            class="bi bi-pencil-square me-2"></i>Edit</a>
                                    <a href="" type="button"
                                       class="btn text-dark" style="background-color: #D9D9D9"><i
                                            class="bi bi-clock-history me-2"></i>History</a>

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
