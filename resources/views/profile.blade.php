@extends('layouts/app')
@section('title', $data['page_title'])

@section('content')
    <x-nav-bar></x-nav-bar>

    <div class="container my-4">
        <div class="card">
            <form method="POST" action="{{ route('edit') }}" enctype="multipart/form-data">
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
                </div>
            </form>
            <div class="card-footer">
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Security</p>
                <form method="GET" action="{{ route('logout') }}" role="form">
                    @csrf
                    <button id="logout" name="logout" type="submit" class="btn btn-danger btn-sm ms-auto">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <hr class="horizontal dark mt-5">
    @include('components.footer')
@endsection

