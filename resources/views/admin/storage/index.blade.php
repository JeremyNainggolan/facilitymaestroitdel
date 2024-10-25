@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <div class="col-lg-10 col-md-8 p-4">
        <p>Pages / {{ $data['page_header'] }}</p>

        <h3 class="mb-4"><?= $data['page_header'] ?></h3>
        <div class="card p-4 shadow border-light d-flex">
            <div class="card-title fs-5 fw-medium mb-3">{{ $data['page_title'] . ' Detail' }}<a
                    href="{{ url('admin/storage/add') }}" class="text-decoration-none text-dark"><i
                        class="bi bi-node-plus-fill ms-2"></i></a></div>
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
            <table class="table">
                <thead>
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Name</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Capacity</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                @if($data['storages'] != null)
                    @foreach($data['storages'] as $storage)
                        <tr class="">
                            <td>{{ $i++ }}</td>
                            <td><img alt="" src="{{ asset('item/' . $storage->filename) }}" height="120rem"></td>
                            <td>{{ $storage->name }}</td>
                            <td>{{ $storage->detail }}</td>
                            <td>{{ $storage->capacity }}</td>
                            <td class="text-center">
                                <a href="{{ url('admin/storage/edit/' . $storage->id) }}" type="button" class="btn"
                                   style="background-color: #8EAEC4"><i
                                        class="bi bi-pencil-square me-2"></i>Edit</a>
                                    <?php $id = $storage->id?>
                                <a type="button"
                                   class="btn bg-danger text-light" data-bs-toggle="modal" data-bs-target="#deleteItem"><i
                                        class="bi bi-trash me-2"></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
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
