@extends('layouts.app')
@section('title', 'Facility Maestro')

@section('content')
    <x-nav-bar></x-nav-bar>

    <!-- Main Container -->
    <div class="container my-4">
        <!-- Search Bar, Cart Button, and Filter Button -->
        <div class="d-flex align-items-center justify-content-between" style="max-width: 100%; margin: 0 auto; background-color: white; border-radius: 50px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 5px; height: 45px;">
            
            <!-- Filter Button -->
            <button class="btn" style="background-color: #F7F7F7; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; padding: 0;">
                <i class="fas fa-sliders-h" style="font-size: 14px;"></i>
            </button>

            <!-- Search Input Group -->
            <div class="d-flex align-items-center position-relative" style="flex-grow: 1; margin-left: 10px;">
                <!-- Search Input -->
                <input type="text" class="form-control" placeholder="Search" style="border: none; background-color: white; border-radius: 50px; padding: 10px 40px; font-size: 0.9rem; width: 100%; box-shadow: none;">

                <!-- Close Icon (Inside the Input) -->
                <button class="btn position-absolute" style="right: 55px; background-color: transparent; border: none;">
                    <i class="fas fa-times" style="color: #A9A9A9; font-size: 12px;"></i>
                </button>

                <!-- Search Icon (Inside the Input) -->
                <button class="btn position-absolute" style="right: 15px; background-color: transparent; border: none;">
                    <i class="fas fa-search" style="color: #A9A9A9; font-size: 16px;"></i>
                </button>
            </div>

            <!-- Cart Button -->
            <button class="btn" style="background-color: #F7F7F7; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; padding: 0;">
                <i class="fas fa-shopping-cart" style="font-size: 14px;"></i>
            </button>
        </div>

        <!-- Main Card Container for All Items -->
        <div class="card p-4 position-relative mt-4" style="border-radius: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding-top: 50px;">
            <!-- Process Request Button in the Top-Right Corner as a Square -->
            <button class="btn position-absolute" style="top: 10px; right: 10px; background-color: #70F293; border: none; padding: 10px 20px; font-size: 0.85rem; color: white; z-index: 10;">
                Process Request
            </button>

            <div class="mb-4"></div>

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
                            <img src="{{ asset('img/' . $item['image']) }}" alt="{{ $item['name'] }}" class="card-img-top p-3" style="height: 150px; object-fit: contain;">
                            
                            <!-- Card Body -->
                            <div class="card-body text-center">
                                <h6 class="card-title" style="font-size: 1rem;">{{ $item['name'] }}</h6>
                                <button class="btn {{ $item['status'] == 'requested' ? 'btn-success' : 'btn-outline-primary' }} w-100"
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
