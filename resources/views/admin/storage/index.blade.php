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
                @if (session()->has('error'))
                    <div class="text-danger fw-bolder">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="text-success fw-bolder">
                        {{ session('success') }}
                    </div>
                @endif
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
                                         src="{{ asset($storage['filename'] != null ? 'storage/' . $storage['filename'] : 'storage/default.png') }}"
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
                                    <button type="button"
                                            class="btn btn-danger text-white"
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            data-id="{{ $storage['id'] }}">
                                        <i class="bi bi-trash me-2"></i>Delete
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <a type="button" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x text-3xl"></i></a>
                </div>
                <div class="modal-body">
                    Are you sure to delete this storage?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('storage.delete') }}">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var exampleModal = document.getElementById('exampleModal');
            exampleModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget; // Tombol yang diklik untuk membuka modal
                var itemId = button.getAttribute('data-id'); // Ambil nilai item_id dari atribut data-id

                // Masukkan item_id ke dalam input tersembunyi dalam modal
                var inputItemId = exampleModal.querySelector('#id');
                inputItemId.value = itemId;
            });
        });

    </script>
@endsection
