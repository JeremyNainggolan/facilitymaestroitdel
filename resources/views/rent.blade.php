@extends('layouts.app')
@section('title', 'Facility Maestro')

@section('content')
    <x-nav-bar></x-nav-bar>

    <!-- Main Container -->
    <div class="container my-3">
        <!-- Search Bar, Cart Button, and Filter Button -->
        <div class="d-flex align-items-center justify-content-between">

            <!-- Search Input Group -->
            <div class="w-100 input-group">
                <input type="text" class="form-control border-dark ps-5" placeholder="Search">
                <span class="input-group-text border-dark" id="basic-addon1"><i class="bi bi-search"></i></span>
            </div>
        </div>

        <!-- Main Card Container for All Items -->
        <div class="card p-4 position-relative mt-4 rounded-2 shadow-blur shadow-lg ">
            <!-- Process Request Button in the Top-Right Corner as a Square -->
            <div class="card-title text-end text-white ">
                <button class="btn fw-bolder text-dark" style="background-color: #A1FE99" type="button" id="process"
                        name="process">
                    Process Request
                </button>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
                @if(empty($data['items']))
                    <div class="d-flex ps-3 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-xs fst-italic text-opacity-25">No Item Available</h6>
                        </div>
                    </div>
                @else
                    @foreach ($data['items'] as $item)
                        <div class="col">
                            <div class="card border-1 border-dark rounded-2 shadow-sm">
                                <img
                                    src="{{ $item['filename'] != null ? asset('item/' . $item['filename']) : asset('item/' . 'default.png') }}"
                                    alt="{{ $item['item_name'] }}"
                                    class="card-img-top p-3" style="height: 150px; object-fit: contain;">

                                <div class="card-body text-center fw-bold">
                                    <h6 class="card-title fs-5">{{ $item['item_name'] }}</h6>
                                    <button type="button" class="btn w-100 mt-4" style="background-color: #D4E5F4">
                                        Request
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <hr class="horizontal dark">
    @include('components.footer')
@endsection
