@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <div class="col-lg-10 col-md-8 p-4">
        <p>Pages / {{ $data['page_header'] }}</p>

        <h3 class="mb-4"><?= $data['page_header'] ?></h3>
        <div class="card p-4 shadow border-light d-flex">
            <div class="card-title fs-5 fw-medium mb-3">{{ $data['page_title'] . ' Detail' }}</div>
            <x-nav-tabs></x-nav-tabs>
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
                <table class="table">
                    <thead>
                    <tr class="">
                        <th scope="col">#</th>
                        <th scope="col">Rent User</th>
                        <th scope="col">Facility Name</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Approve Date</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    @if(!empty($data['rents']))
                        @foreach($data['rents'] as $rent)
                            <tr class="">
                                <td>{{ $i++ }}</td>
                                <td><img alt="" src="{{ asset('item/' . $rent['filename']) }}" height="120rem"></td>
                                <td>{{ $rent['name'] }}</td>
                                <td>{{ $rent['detail'] }}</td>
                                <td>{{ $rent['capacity'] }}</td>
                                <td class="text-center">
                                    <a href="{{ url('admin/storage/edit/' . $rent['id']) }}" type="button" class="btn"
                                       style="background-color: #8EAEC4"><i
                                            class="bi bi-pencil-square me-2"></i>Edit</a>
                                        <?php $id = $rent['id'] ?>
                                    <a type="button"
                                       class="btn bg-danger text-light" data-bs-toggle="modal"
                                       data-bs-target="#deleteItem"><i
                                            class="bi bi-trash me-2"></i>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="fst-italic">
                                No Active Rent Available
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--    <!-- Modal -->--}}
    {{--    <div class="modal fade" id="deleteItem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"--}}
    {{--         aria-labelledby="deleteItem" aria-hidden="true">--}}
    {{--        <div class="modal-dialog modal-dialog-centered">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h1 class="modal-title fs-5" id="deleteItem">Delete</h1>--}}
    {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
    {{--                </div>--}}
    {{--                <div class="modal-body">--}}
    {{--                    Are you sure to delete this Item?--}}
    {{--                </div>--}}
    {{--                <div class="modal-footer">--}}
    {{--                    <form method="POST" action="{{ url('admin/item/delete' . $data['items']  != null ?  : '') }}" role="form">--}}
    {{--                        @csrf--}}
    {{--                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>--}}
    {{--                        @method('DELETE')--}}
    {{--                        <button type="submit" class="btn btn-primary">Yes</button>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
