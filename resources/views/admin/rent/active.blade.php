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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Approve Date
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
                                    <p class="text-xs font-weight-bold mb-0">{{ $rent['app_date'] }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $rent['rent_status'] }}</p>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('post.return') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $rent['rent_id'] }}" id="rent_id" name="rent_id">
                                        @if($rent['item_id'])
                                            <button class="btn btn-success" type="submit" id="status" name="status"
                                                    value="returned">
                                                <i class="bi bi-arrow-down-circle me-2"></i>Return
                                            </button>
                                        @else
                                            <button class="btn btn-success" type="submit" id="status" name="status"
                                                    value="done">
                                                <i class="bi bi-check-circle me-2"></i>Done
                                            </button>
                                        @endif
                                        <button
                                            class="btn btn-danger"
                                            type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#report"
                                            data-rent-id="{{ $rent['rent_id'] }}"
                                            data-user-name="{{ $rent['user_name'] }}">
                                            <i class="bi bi-exclamation-circle me-2"></i>Report
                                        </button>

                                    </form>
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
    </div>

    <div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-danger text-uppercase text-gradient">Report</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('report.add') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label>Reason</label>
                                <input type="hidden" name="rent_id" id="rent_id" value="">
                                <div class="input-group mb-3">
                                    <textarea name="reason" id="reason" rows="3"
                                              class="form-control rounded-2" required></textarea>
                                </div>
                                <label>Rent User</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                                <label>Picture</label>
                                <div class="input-group mb-3">
                                    <input required class="form-control" type="file" id="report_img" name="report_img"
                                           accept=".png, .jpg, .jpeg">
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                            class="btn btn-round bg-gradient-danger btn-lg w-100 mt-4 mb-0">Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const reportButtons = document.querySelectorAll('button[data-bs-target="#report"]');

            reportButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const rentId = this.getAttribute('data-rent-id');
                    const userName = this.getAttribute('data-user-name');

                    const modal = document.querySelector('#report');
                    modal.querySelector('#reason').value = '';
                    modal.querySelector('#reason').focus();
                    modal.querySelector('input[type="text"]').value = userName;
                    modal.querySelector('#rent_id').value = rentId;
                });
            });
        });
    </script>

@endsection
