@extends('layouts/app')
@section('title', $data['page_title'])
@section('content')
    <x-nav-bar></x-nav-bar>

    <div class="position-relative min-vh-100 justify-content-center align-items-start d-flex flex-column px-5"
         style="background-image: url('{{ asset('img/tobalake.jpg') }}'); background-size: cover; background-position: center;">
        <div class="position-relative">
            <h3 class="display-5 text-white fw-bold py-0 ">Facility Maestro IT Del</h3>
            <h1 class="display-1 text-white fw-bold">Hello, {{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>
            <p class="lead my-0 text-white">Enhances user-friendliness in accessing and using facilities.</p>
            <a href="/rent" class="btn btn-primary mt-3 rounded-pill px-5">Rent Now</a>
        </div>
    </div>

    <div class="container my-5 p-5">
        <div class="row justify-content-evenly text-dark">
            <div class="card col-lg-3 col-md-10 mb-4 d-flex shadow border-light">
                <div class="card-body fs-5">
                    <i class="bi bi-collection" style="font-size: 3rem;"></i>
                    <p class="card-title mt-2 fw-bold">Peminjaman Barang</p>
                    <p class="card-text pb-lg-4 pb-sm-3">Civitas Akademika IT Del dapat mengajukan peminjaman barang</p>
                </div>
            </div>
            <div class="card col-lg-3 col-md-10 mb-4 d-flex shadow border-light">
                <div class="card-body fs-5">
                    <i class="bi bi-building" style="font-size: 3rem;"></i>
                    <p class="card-title mt-2 fw-bold">Peminjaman Fasilitas</p>
                    <p class="card-text pb-lg-4 pb-sm-3">Civitas Akademika IT Del dapat mengajukan peminjaman fasilitas</p>
                </div>
            </div>
            <div class="card col-lg-3 col-md-10 mb-4 d-flex shadow border-light">
                <div class="card-body fs-5">
                    <i class="bi bi-clock-history" style="font-size: 3rem;"></i>
                    <p class="card-title mt-2 fw-bold">Detail Peminjaman</p>
                    <p class="card-text pb-lg-4 pb-sm-3">Civitas Akademika IT Del dapat melihat riwayat peminjaman</p>
                </div>
            </div>
        </div>
    </div>
    <hr class="horizontal dark">
    <x-footer></x-footer>
@endsection
