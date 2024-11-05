@extends('layouts/app')
@section('title', 'User Login')
@section('content')
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100 d-flex align-items-center justify-content-center">
                <div class="container fw-normal">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex mx-lg-0 mx-auto">
                        <div class="card rounded-4 p-3 border-0 shadow">
                            <img src="{{ asset('svg/logo-no-background.svg') }}" class="card-img-top p-4" alt="">
                            <div class="m-2 bg-white">
                                <h4 class="fw-bold">Sign In</h4>
                                <p class="mb-0">Enter your email and password to sign in</p>
                            </div>
                            <div class="card-body">
                                <form role="form" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    @if (session()->has('error'))
                                        <div class="text-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <div class="mb-2">
                                        <input id="username" name="username" autofocus type="text"
                                               class="form-control form-control-lg" placeholder="Username" required
                                               aria-label="Username">
                                        @if ($errors->has('username'))
                                            <div class="text-danger fw-1">
                                                {{ $errors->first('username') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-2">
                                        <input id="password" name="password" type="password"
                                               class="form-control form-control-lg" placeholder="Password" required
                                               aria-label="Password">
                                        @if ($errors->has('password'))
                                            <div class="text-danger">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-check form-switch">
                                        <input name="remember-token" class="form-check-input" type="checkbox"
                                               id="remember-token">
                                        <label class="form-check-label" for="remember-token">Remember me?</label>
                                    </div>
                                    <div class="text-center">
                                        <button id="submit" name="submit" type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign
                                            in
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Don't have an account?
                                    <a href="{{ url('register') }}"
                                       class="text-primary text-decoration-none text-gradient font-weight-bold">Sign
                                        up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div
                            class="position-relative bg-gradient-primary h-100 m-2 px-7 d-flex flex-column justify-content-center overflow-hidden rounded"
                            style="font-family: 'Indie Flower', cursive; background-image: url({{ asset('img/libraryaudit.jpg') }}); background-size: cover; text-shadow: 4px 0px 8px #000000;">
                            <span
                                class="mask opacity-6 position-absolute top-0 start-0 end-0 bottom-0"
                                style="backdrop-filter: blur(4px);"></span>
                            <h4 class="fs-lg-1 fs-1 mt-5 px-2 text-white blockquote position-relative">"Having no
                                problems
                                is the biggest problem of all"</h4>
                            <p class="fs-3 text-white blockquote-footer position-relative">Taichi Ono</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
