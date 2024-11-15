@extends('layouts/app')
@section('title', 'Facility Maestro')
@section('content')
    <x-nav-bar></x-nav-bar>

    <div class="container mt-5">
        <div class="card shadow-lg" style="border-radius: 16px; background-color: #f8f9fa;">
            <div class="card-header bg-transparent text-center" style="border-bottom: none;">
                <h3 class="fw-bold" style="margin-bottom: 0; color: #343a40;">Form Registration</h3>
            </div>
            <div class="card-body px-5">
                <form method="POST" action="{{ route('register.facility') }}">
                    @csrf
                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Nama</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white" style="border-radius: 8px 0 0 8px;">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="text" name="name" id="name" class="form-control fw-light" 
                                required placeholder="Masukkan Nama" 
                                style="border-radius: 0 8px 8px 0; font-size: 1rem;">
                        </div>
                    </div>

                    <!-- No Telepon -->
                    <div class="mb-4">
                        <label for="phone" class="form-label fw-bold">No Telepon</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white" style="border-radius: 8px 0 0 8px;">
                                <i class="bi bi-telephone-fill"></i>
                            </span>
                            <input type="tel" name="phone" id="phone" class="form-control fw-light" 
                                required placeholder="Masukkan No Telepon" 
                                style="border-radius: 0 8px 8px 0; font-size: 1rem;">
                        </div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="mb-4">
                        <label for="birthdate" class="form-label fw-bold">Tanggal Lahir</label>
                        <input type="date" name="birthdate" id="birthdate" class="form-control fw-light" 
                            required style="border-radius: 8px; font-size: 1rem;">
                    </div>

                    <!-- Storage -->
                    <div class="mb-4">
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
                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-control fw-light" 
                            placeholder="Masukkan Deskripsi" required 
                            style="border-radius: 8px; font-size: 1rem;"></textarea>
                    </div>

                    <!-- Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-gradient fw-bold" 
                            style="border-radius: 12px; padding: 12px 24px; font-size: 1rem; background: linear-gradient(135deg, #28a745, #218838); color: #fff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); transition: all 0.3s;">
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
  