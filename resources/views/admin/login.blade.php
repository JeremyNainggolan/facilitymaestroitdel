@extends('layouts/app')
@section('title', 'Administration Login')
@section('content')
    <main class="main-content mt-0">
        <div class="page-header align-items-center min-vh-100 bg-white d-flex justify-content-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-8 col-12">
                        <div class="card border-0 shadow rounded-4">
                            <div class="card-body" style="font-family: 'Inknut Antiaqua', serif;">
                                <img class="card-img p-4" src="{{ asset('svg/logo-no-background.svg') }}" alt="">
                                <h2 class="fw-bolder text-center mx-2 py-3">- Administration Login -</h2>
                                <form role="form" class="text-start" method="POST" action="{{ route('admin.login') }}">
                                    @csrf
                                    <div class="input-group input-group-outline my-3 px-2">
                                        <input required value="{{ old('email') }}" autofocus id="email" name="email" type="email"
                                            class="form-control" placeholder="Email" aria-label="Email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-outline mb-2 px-2">
                                        <input required id="password" name="password" type="password" class="form-control"
                                            placeholder="Password" aria-label="Password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button id="submit" name="submit" type="submit"
                                            class="text-white btn w-100 my-4 mb-4" style="background-color: #67C6E3">Sign
                                            in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
