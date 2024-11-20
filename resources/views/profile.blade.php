@extends('layouts/app')
@section('title', 'Facility Maestro')

@section('content')
    {{-- Navbar --}}
    <x-nav-bar></x-nav-bar>

    {{-- Profile Card --}}
    <div class="d-flex justify-content-center mt-5">
        <div class="card profile-card shadow p-4 d-flex flex-row align-items-center">
            {{-- Profile Image --}}
            <div class="profile-image-container me-4">
                <td><img src="{{ asset('img/profile.jpg') }}" alt="Guitar" style="width:50px;"></td>
            </div>
            {{-- Profile Info --}}
            <div class="profile-info">
                <form>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" value="Mart Jeremiah" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" value="12S22002" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" value="S1 - Sistem Informasi" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" value="+62851-7167-9411" readonly>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <hr class="horizontal dark mt-5">
    @include('components.footer')
@endsection

