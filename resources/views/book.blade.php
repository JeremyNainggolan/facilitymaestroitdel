@extends('layouts/app')
@section('title', $data['page_title'])

@section('content')
    <x-nav-bar></x-nav-bar>

    <div class="container my-3">
        <div class="card shadow-lg rounded-3 bg-body">
            <div class="card-header bg-transparent text-center">
                <h3 class="fw-bolder mb-0 text-dark text-uppercase">Form Registration</h3>
            </div>
            <div class="card-body px-5">
                <form method="POST" action="{{ route('facility.register') }}">
                    @csrf
                    <!-- Name Input -->
                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" name="name" id="name" class="form-control fw-light rounded-2" placeholder="Enter your name" required>
                    </div>

                    <!-- Phone Input -->
                    <div class="mb-4">
                        <label for="phone" class="form-label fw-bold">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control fw-light rounded-2" placeholder="Enter your phone number" required>
                    </div>

                    <!-- Date of Request -->
                                        <div class="mb-4">
                        <label for="date_request" class="form-label fw-bold">Date of Request</label>
                        <input type="date" name="date_request" id="date_request" class="form-control fw-light rounded-2" required>
                    </div>

                    <!-- Facility Select -->
                    <div class="mb-4">
                        <label for="facility" class="form-label fw-bold">Facility</label>
                        <select name="facility" id="facility" class="form-select fw-light rounded-2" required>
                            <option value="" selected disabled>Choose Facility</option>
                            @foreach($data['facilities'] as $facility)
                                <option value="{{ $facility['facility_id'] }}">{{ $facility['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold">Description (Reason)</label>
                        <textarea name="description" id="description" rows="3" class="form-control fw-light rounded-2" placeholder="Explain your reason" required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-gradient fw-bolder bg-success text-white">
                            Process Request
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <hr class="horizontal dark">
    @include('components.footer')
@endsection
