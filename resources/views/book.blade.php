@extends('layouts/app')
@section('title', 'Facility Maestro')
@section('content')
    <x-nav-bar></x-nav-bar>

    <div class="container mt-5">
        <div class="card shadow-sm" style="border-radius: 12px;">
            <div class="card-header bg-white text-center" style="border-bottom: none;">
                <h3 class="fw-bold" style="margin-bottom: 0;">Form Registration</h3>
            </div>
            <div class="card-body px-5">
                <form method="POST" action="{{ route('register.facility') }}">
                    @csrf
                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nama</label>
                        <input type="text" name="name" id="name" class="form-control fw-light" 
                            value="" required placeholder="Masukkan Nama" 
                            style="border-radius: 8px; font-size: 1rem;">
                    </div>

                    <!-- No Telepon -->
                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">No Telepon</label>
                        <input type="tel" name="phone" id="phone" class="form-control fw-light" 
                            value="" required placeholder="Masukkan No Telepon" 
                            style="border-radius: 8px; font-size: 1rem;">
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="mb-3">
                        <label for="birthdate" class="form-label fw-bold">Tanggal Lahir</label>
                        <input type="date" name="birthdate" id="birthdate" class="form-control fw-light" 
                            value="" required 
                            style="border-radius: 8px; font-size: 1rem;">
                    </div>

                    <!-- Storage -->
                    <div class="mb-3">
                        <label for="storage" class="form-label fw-bold">Storage</label>
                        <select name="storage" id="storage" class="form-select fw-light" 
                            required style="border-radius: 8px; font-size: 1rem;">
                            <option value="" selected disabled>Pilih Storage</option>
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-control fw-light" 
                            placeholder="Masukkan Deskripsi" required 
                            style="border-radius: 8px; font-size: 1rem;"></textarea>
                    </div>

                    <!-- Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success fw-bold" 
                            style="background-color: #28a745; border-radius: 8px; padding: 10px 20px; font-size: 1rem;">
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
