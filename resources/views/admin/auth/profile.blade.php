@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form method="POST" action="{{ route('edit.profile') }}" enctype="multipart/form-data">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profile</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Profile</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Username</label>
                                        <input class="form-control" type="text" value="{{ $data['detail']->username }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" value="{{ $data['detail']->email }}">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Full Name</label>
                                        <input class="form-control" type="text" value="{{ $data['detail']->name }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Phone Number</label>
                                        <input class="form-control" type="text"
                                               value="{{ $data['detail']->phonenumber }}">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Security</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Password</label>
                                        <input class="form-control" type="password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Confirm Password</label>
                                        <input class="form-control" type="password">
                                    </div>
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
@endsection
