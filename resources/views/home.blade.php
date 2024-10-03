@extends('layouts/app')
@section('title', 'Facility Maestro')
@section('content')
    <x-nav-bar></x-nav-bar>
    <div style="font-family: 'Inknut Antiaqua', serif;">
        <div class="position-relative min-vh-100 justify-content-center align-items-start d-flex flex-column px-5"
             style="background-image: url('{{ asset('img/tobalake.jpg') }}'); background-size: cover; background-position: center;">
        <span class="mask bg-gradient-dark opacity-6"
              style="backdrop-filter: blur(4px); position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></span>
            <!-- Overlay Content -->
            <div class="text-white position-relative">
                <h3 class="display-5 fw-bold py-0">Facility Maestro IT Del</h3>
                <h1 class="display-1 fw-bold">Hello, {{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>
                <p class="lead my-0">Enhances user-friendliness in accessing and using facilities.</p>
                <a href="/rent" class="btn btn-primary btn-lg mt-3 rounded-pill px-5">Rent Now</a>
            </div>
        </div>
        <div>
            <h1>
                Lanjut
            </h1>
        </div>
    </div>
@endsection
