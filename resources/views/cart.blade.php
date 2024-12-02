@extends('layouts/app')
@section('title', $data['page_title'])

@section('content')
    <x-nav-bar></x-nav-bar>

    <div class="container my-3">
        <div class="card shadow-lg rounded-3 bg-body">
            <div class="card-header bg-transparent text-center">
                <h3 class="fw-bolder mb-0 text-dark text-uppercase">Cart</h3>
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
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($data['items']->count() > 0)
                                <?php $i = 1 ?>
                            @foreach($data['items'] as $item)
                                <tr class="align-middle text-xs font-weight-bold mb-0">
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $i++ }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><img
                                                src="{{ asset('item/' . $item->options->filename) }}"
                                                height="120rem">
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('cart.remove') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="rowId" id="rowId" value="{{ $item->rowId }}">
                                            <button type="submit" class="btn btn-danger text-xs"><i
                                                    class="bi bi-cart-dash me-3"></i>Remove
                                                Item
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="align-middle text-center font-weight-bold mb-0">
                                <td colspan="4">
                                    <h6 class="mb-0 text-xs fst-italic text-opacity-25">No Data Available</h6>
                                </td>
                            </tr>
                        @endif
                        <tr class="text-center">
                            <td colspan="4" class="">
                                <a class="btn btn-success text-xs" href="{{ url('rent') }}"><i
                                        class="bi bi-cart-plus me-2"></i>Add More</a>
                                <a class="btn btn-danger text-xs" href="{{ route('cart.destroy') }}"><i
                                        class="bi bi-cart-dash me-2"></i>Empty
                                    Cart</a>
                                <button data-bs-toggle="modal" data-bs-target="#modal-form"
                                        class="btn btn-primary text-xs" href="#"><i class="bi bi-cart-check me-2"></i>Confirm
                                    Order
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient">Confirm Order</h3>
                            <p class="mb-0">Please complete the form below</p>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('rent.add') }}">
                                @csrf
                                <?php
                                $list_item = array();
                                foreach ($data['items'] as $item) {
                                    $list_item[] = $item->id;
                                }
                                $encode = json_encode($list_item);
                                ?>
                                <input type="hidden" name="list_item" id="list_item" value="{{ $encode }}">
                                <label>Reason</label>
                                <div class="input-group mb-3">
                                    <textarea name="reason" id="reason" rows="3"
                                              class="form-control fw-light rounded-2" required></textarea>
                                </div>
                                <label>Rent Date</label>
                                <div class="input-group mb-3">
                                    <input type="date" name="rent_date" id="rent_date" class="form-control fw-light rounded-2" required></input>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-round bg-gradient-info btn-md w-50 mt-4 mb-0">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <hr class="horizontal dark">
    @include('components.footer')
@endsection
