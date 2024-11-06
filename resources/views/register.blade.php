@extends('layouts/app')
@section('title', 'User Register')
@section('content')
    <main class="main-content mt-0 ">
        <div class="position-relative min-vh-100 justify-content-center align-items-center d-flex flex-column"
             style="background-image: url('{{ asset('img/building.jpg') }}'); background-size: cover; background-position: center; position: relative;">

            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto" style="font-family: 'Krona One', sans-serif;">
                        <h1 class="text-white my-4 display-1">HELLO!</h1>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card border-0 px-1 rounded-4 shadow">
                        <div class="text-center pt-4">
                            <h2 class="fs-1 fw-bold">Register</h2>
                        </div>
                        <div class="card-body">
                            <form role="form" action="{{ route('register') }}" method="POST">
                                @csrf
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <div class="text-danger">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                @endif
                                <div class="mb-3">
                                    <input required autofocus id="name" name="name" type="text"
                                           class="form-control" placeholder="Name" aria-label="Name">
                                </div>
                                <div class="mb-3">
                                    <input required id="email" name="email" type="email" class="form-control"
                                           placeholder="Email" aria-label="Email">
                                    @if ($errors->has('email'))
                                        <div class="text-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <input required id="username" name="username" type="text" class="form-control"
                                           placeholder="Username" aria-label="Username">
                                    @if ($errors->has('username'))
                                        <div class="text-danger">
                                            {{ $errors->first('username') }}

                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <input required id="phonenumber" name="phonenumber" type="tel" class="form-control"
                                           placeholder="Phone Number" aria-label="phoneNumber">
                                </div>
                                <div class="mb-3">
                                    <input required id="password" name="password" type="password" class="form-control"
                                           placeholder="Password" aria-label="Password">
                                    @if ($errors->has('password'))
                                        <div class="text-danger">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Profile Picture</label>
                                    <input class="form-control" type="file" id="user_img" name="user_img"
                                           accept=".png, .jpg, .jpeg">
                                </div>
                                <div class="form-check form-check-info text-start">
                                    <input required class="form-check-input" type="checkbox" value=""
                                           id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I agree to the <a href="javascript:;"
                                                          class="text-primary text-decoration-none font-weight-bolder">Terms
                                            and
                                            Conditions</a>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button id="submit" name="submit" type="submit"
                                            class="btn text-white bg-primary p-2 w-100 my-4 mb-2">Sign
                                        up
                                    </button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ url('login') }}"
                                                                                         class="text-primary text-decoration-none font-weight-bolder">Sign
                                        in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
