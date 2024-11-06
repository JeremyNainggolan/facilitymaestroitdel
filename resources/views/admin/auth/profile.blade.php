@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <x-admin-nav>{{ $data['page_title'] }}</x-admin-nav>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form method="POST" action="{{ route('edit.profile') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            @if (session()->has('error'))
                                <div class="text-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session()->has('success'))
                                <div class="text-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="d-flex align-items-center">
                                <p class="text-uppercase font-weight-bolder text-sm">Profile</p>
                                <button id="submit" name="submit" type="submit" class="btn btn-primary btn-sm ms-auto">
                                    Save
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Username</label>
                                        <input name="txt_username" id="txt_username" class="form-control" type="text"
                                               value="{{ $data['detail']->username }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input name="txt_email" id="txt_email" class="form-control" type="email"
                                               value="{{ $data['detail']->email }}">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Full Name</label>
                                        <input name="txt_name" id="txt_name" class="form-control" type="text"
                                               value="{{ $data['detail']->name }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Phone Number</label>
                                        <input name="txt_phonenumber" id="txt_phonenumber" class="form-control"
                                               type="text"
                                               value="{{ $data['detail']->phonenumber }}">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Security</p>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="reset-password" class="form-control-label">Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" placeholder=""
                                               aria-label="Example text with button addon" id="txt_password"
                                               name="txt_password" aria-describedby="button-addon1">
                                        <button class="btn btn-primary mb-0" type="button" id="button"
                                                onclick="togglePasswordVisibility()"><i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                    <button class="btn btn-danger mb-0" type="button" id="button"
                                            onclick="generateDefaultPassword()">Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <img src="{{ asset('img/libraryaudit.jpg') }}" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                    <img
                                        src="{{ $data['detail']->filename != null ? asset('user/' . $data['detail']->filename) : asset('user/default-picture.png') }}"
                                        class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="text-center mt-4">
                            <h5>
                                {{ $data['detail']->name }}
                            </h5>
                            <div class="h6 mt-2">
                                {{ '@ '. $data['detail']->username }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function generateDefaultPassword() {
            document.getElementById('txt_password').value = 'password';
        }

        function togglePasswordVisibility() {
            const passwordField = document.getElementById('txt_password');
            const toggleButton = document.getElementById('toggle-password');
            const isPassword = passwordField.type === 'password';

            passwordField.type = isPassword ? 'text' : 'password';
            toggleButton.innerHTML = isPassword ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
        }

    </script>

@endsection
