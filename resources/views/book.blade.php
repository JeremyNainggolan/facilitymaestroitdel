@extends('layouts/app')
@section('title', 'Facility Maestro')
@section('content')
    <x-nav-bar></x-nav-bar>

    <div class="container mt-5">
        <div class="card shadow-lg rounded-3 bg-body">
            <div class="card-header bg-transparent text-center">
                <h3 class="fw-bolder mb-0 text-dark text-uppercase">Form Registration</h3>
            </div>
            <div class="card-body px-5">
                <form method="POST" action="{{ route('register.facility') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white rounded-start">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="text" name="name" id="name" class="form-control fw-light fs-6" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="form-label fw-bold">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white rounded-start">
                                <i class="bi bi-telephone-fill"></i>
                            </span>
                            <input type="tel" name="phone" id="phone" class="form-control fw-light rounded-end"
                                   required>
                        </div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="mb-4">
                        <label for="birthdate" class="form-label fw-bold">Date of Request</label>
                        <input type="date" name="date_request" id="date_request" class="form-control fw-light rounded-2" required>
                    </div>

                    <!-- Storage -->
                    <div class="mb-4">
                        <label for="facility" class="form-label fw-bold">Facility</label>
                        <select name="facility" id="facility" class="form-select fw-light rounded-2" required>
                            <option value="" selected disabled>Choose Facility</option>
                            @foreach($data['facilities'] as $facility)
                                <option value="{{ $facility['name'] }}">{{ $facility['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold">Description (Reason)</label>
                        <textarea name="description" id="description" rows="3" class="form-control fw-light rounded-2" required></textarea>
                    </div>

                    <!-- Button -->
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
