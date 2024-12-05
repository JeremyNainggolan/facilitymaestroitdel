@extends('layouts/admin-app')
@section('title', $data['page_title'])
@section('content')
    <x-admin-nav>{{ $data['page_title'] }}</x-admin-nav>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 pt-3 ">
                <h6 class="text-capitalize">{{ $data['page_header'] }}</h6>
            </div>
            <div class="mx-4">
                <form method="post" action="{{ url('admin/facility/edit/'. $data['facility']->facility_id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @if (session()->has('error'))
                        <div class="text-danger fw-bolder">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row my-2">
                        <div class="col-lg-10">
                            <label for="facility_name" class="form-label">Facility Name</label>
                            <input name="facility_name" type="text" id="facility_name" class="form-control"
                                   value="{{ $data['facility']->name }}">
                        </div>
                        <div class="col-lg-2">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="{{ $data['facility']->status }}"
                                        selected>{{ $data['facility']->status }}</option>
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <label for="detail" class="form-label">Detail</label>
                            <input name="detail" type="text" id="detail" class="form-control"
                                   value="{{ $data['facility']->detail }}">
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-8">
                            <label for="item_img" class="form-label">Picture</label>
                            <input class="form-control" type="file" id="facility_img" name="facility_img"
                                   accept=".png, .jpg, .jpeg">
                            <img src="{{ asset('facility/' . $data['facility']->filename) }}" class="mt-3" width="120rem">
                        </div>
                        <div class="col-lg-4">
                            <label for="condition" class="form-label">Condition</label>
                            <select name="condition" id="condition" class="form-select" required>
                                <option value="{{ $data['facility']->condition }}"
                                        selected>{{ $data['facility']->condition }}</option>
                                <option value="broken">Broken</option>
                                <option value="good">Good</option>
                                <option value="lost">Lost</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center justify-content-center">
                        <button id="submit" name="submit" type="submit"
                                class="text-white btn m-4 px-5"
                                style="background-color: #67C6E3">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
@endsection
