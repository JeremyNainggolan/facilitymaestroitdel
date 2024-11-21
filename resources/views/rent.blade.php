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

            <div class="card ms-2 rounded-1">
                <i class="bi bi-cart mx-3 my-2 rounded-0"></i>
            </div>
        </div>

        <!-- Main Card Container for All Items -->
        <div class="card p-4 position-relative mt-4"
             style="border-radius: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding-top: 50px;">
            <!-- Process Request Button in the Top-Right Corner as a Square -->
            <div class="card-title text-end text-white">
                <button class="btn btn-success" type="button" id="process" name="process">
                    Process Request
                </button>
            </div>

            <!-- Items Grid with Individual Cards -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
                @php
                    $items = [
                        ['name' => 'Basketball', 'image' => 'basketball.jpg', 'status' => 'requested'],
                        ['name' => 'Shuttlecock', 'image' => 'shuttlecock.jpg', 'status' => 'request'],
                        ['name' => 'Table Tennis', 'image' => 'tabletennis.jpg', 'status' => 'request'],
                        ['name' => 'Guitar', 'image' => 'guitar.jpg', 'status' => 'requested'],
                        ['name' => 'Bass', 'image' => 'bass.jpg', 'status' => 'request'],
                        ['name' => 'Volleyball', 'image' => 'vollyball.jpg', 'status' => 'request'],
                        ['name' => 'Keyboard', 'image' => 'keyboard.jpg', 'status' => 'request'],
                        ['name' => 'Tagading', 'image' => 'tagading.jpg', 'status' => 'requested'],
                        ['name' => 'Camera', 'image' => 'camera.jpg', 'status' => 'request'],
                        ['name' => 'Speaker', 'image' => 'speaker.jpg', 'status' => 'request'],
                    ];
                @endphp

                @foreach ($items as $item)
                    <div class="col">
                        <!-- Individual Card for Each Item -->
                        <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
                            <!-- Item Image -->
                            <img src="{{ asset('img/' . $item['image']) }}" alt="{{ $item['name'] }}"
                                 class="card-img-top p-3" style="height: 150px; object-fit: contain;">

                            <!-- Card Body -->
                            <div class="card-body text-center">
                                <h6 class="card-title" style="font-size: 1rem;">{{ $item['name'] }}</h6>
                                <button
                                    class="btn {{ $item['status'] == 'requested' ? 'btn-success' : 'btn-outline-primary' }} w-100"
                                    style="border-radius: 20px; padding: 8px; font-size: 0.9rem; {{ $item['status'] == 'requested' ? 'background-color: #B1FEC7; border-color: #B1FEC7;' : 'border-color: #ADD8E6; color: #ADD8E6;' }}">
                                    {{ $item['status'] == 'requested' ? 'Requested' : 'Request' }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Footer -->
    <hr class="horizontal dark">
    @include('components.footer')
@endsection
