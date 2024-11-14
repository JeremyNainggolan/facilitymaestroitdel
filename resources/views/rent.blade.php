@extends('layouts.app')
@section('title', 'Facility Maestro')

@section('content')
    <x-nav-bar></x-nav-bar>

    <!-- Main Container -->
    <div class="container my-4">
        <!-- Search Bar, Cart Button, and Process Request Button -->
        <div class="d-block d-md-flex align-items-center mb-3 justify-content-between" style="max-width: 100%; margin: 0 auto; background-color: white; border-radius: 50px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 8px;">
            <!-- Filter Button -->
            <button class="btn" style="background-color: #F7F7F7; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-sliders-h"></i>
            </button>
            
            <!-- Search Input -->
            <input type="text" class="form-control mx-3 mt-2 mt-md-0" placeholder="Search" style="border: none; flex-grow: 1; background-color: #F9F9F9; border-radius: 50px; padding: 8px 15px; font-size: 0.9rem;">

            <!-- Cart Button -->
            <button class="btn mx-2" style="background-color: #F7F7F7; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-shopping-cart"></i>
            </button>

            <!-- Process Request Button -->
            <button class="btn mt-2 mt-md-0" style="background-color: #70F293; border-color: #70F293; border-radius: 20px; padding: 5px 12px; font-size: 0.85rem;">
                Process Request
            </button>
        </div>

        <!-- Items Grid -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            @php
                $items = [
                    ['name' => 'Basketball', 'status' => 'requested'],
                    ['name' => 'Shuttlecock', 'status' => 'request'],
                    ['name' => 'Table Tennis', 'status' => 'request'],
                    ['name' => 'Guitar', 'status' => 'requested'],
                    ['name' => 'Bass', 'status' => 'request'],
                    ['name' => 'Volleyball', 'status' => 'request'],
                    ['name' => 'Keyboard', 'status' => 'request'],
                    ['name' => 'Tagading', 'status' => 'requested'],
                    ['name' => 'Camera', 'status' => 'request'],
                    ['name' => 'Speaker', 'status' => 'request'],
                ];
            @endphp

            <!-- Display each item as a card -->
            @foreach ($items as $item)
                <div class="col mb-3">
                    <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
                        <!-- Item Image -->
                        @if (strtolower($item['name']) == 'basketball')
                            <img src="{{ asset('img/basketball.jpg') }}" class="card-img-top p-3" alt="{{ $item['name'] }}" style="height: 150px; object-fit: contain;">
                        @elseif (strtolower($item['name']) == 'shuttlecock')
                            <img src="{{ asset('img/shuttlecock.jpg') }}" class="card-img-top p-3" alt="{{ $item['name'] }}" style="height: 150px; object-fit: contain;">
                        @elseif (strtolower($item['name']) == 'table tennis')
                            <img src="{{ asset('img/tabletennis.jpg') }}" class="card-img-top p-3" alt="{{ $item['name'] }}" style="height: 150px; object-fit: contain;">
                        @elseif (strtolower($item['name']) == 'guitar')
                            <img src="{{ asset('img/guitar.jpg') }}" class="card-img-top p-3" alt="{{ $item['name'] }}" style="height: 150px; object-fit: contain;">
                        @elseif (strtolower($item['name']) == 'bass')
                            <img src="{{ asset('img/bass.jpg') }}" class="card-img-top p-3" alt="{{ $item['name'] }}" style="height: 150px; object-fit: contain;">
                        @elseif (strtolower($item['name']) == 'volleyball')
                            <img src="{{ asset('img/vollyball.jpg') }}" class="card-img-top p-3" alt="{{ $item['name'] }}" style="height: 150px; object-fit: contain;">
                        @elseif (strtolower($item['name']) == 'keyboard')
                            <img src="{{ asset('img/keyboard.jpg') }}" class="card-img-top p-3" alt="{{ $item['name'] }}" style="height: 150px; object-fit: contain;">
                        @elseif (strtolower($item['name']) == 'tagading')
                            <img src="{{ asset('img/tagading.jpg') }}" class="card-img-top p-3" alt="{{ $item['name'] }}" style="height: 150px; object-fit: contain;">
                        @elseif (strtolower($item['name']) == 'camera')
                            <img src="{{ asset('img/camera.jpg') }}" class="card-img-top p-3" alt="{{ $item['name'] }}" style="height: 150px; object-fit: contain;">
                        @elseif (strtolower($item['name']) == 'speaker')
                            <img src="{{ asset('img/speaker.jpg') }}" class="card-img-top p-3" alt="{{ $item['name'] }}" style="height: 150px; object-fit: contain;">
                        @else
                            <img src="{{ asset('facility_maestro.png') }}" class="card-img-top p-3" alt="{{ $item['name'] }}" style="height: 150px; object-fit: contain;">
                        @endif
                        
                        <!-- Card Body with Item Name and Button -->
                        <div class="card-body text-center" style="padding: 10px;">
                            <h5 class="card-title mb-2" style="font-size: 1rem;">{{ $item['name'] }}</h5>
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

    <!-- Footer -->
    <footer class="text-center mt-4 mb-2">
        <p class="text-muted" style="font-size: 0.85rem;">© 2024, Copyright Facility Maestro. All Rights Reserved</p>
    </footer>
@endsection
