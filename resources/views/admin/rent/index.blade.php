@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <div class="col-lg-10 col-md-8 p-4">
        <p>Pages / {{ $data['page_header'] }}</p>

        <h3 class="mb-4"><?= $data['page_header'] ?></h3>
        <div class="card p-4 shadow border-light d-flex">
            <div class="card-title fs-5 fw-medium mb-3">{{ $data['page_title'] . ' Detail' }}</div>
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
            <x-nav-tabs></x-nav-tabs>
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
