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
                <form method="post" action="{{ url('admin/item/edit/'. $data['item']->item_id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="text-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    @if (session()->has('error'))
                        <div class="text-danger fw-bolder">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row my-2">
                        <div class="col-lg-8">
                            <label for="item_name" class="form-label">Item Name</label>
                            <input name="item_name" type="text" id="item_name" class="form-control"
                                   value="{{ $data['item']->item_name }}">
                        </div>
                        <div class="col-lg-4">
                            <label for="location" class="form-label">Location</label>
                            <select name="storage_id" id="storage_id" class="form-select" required>
                                <option value="{{ $data['item']->storage_id }}">{{ $data['item']->location }}</option>
                                @foreach($data['storages'] as $storage)
                                    <option value="{{ $storage->id }}">{{ $storage->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <label for="description" class="form-label">Description</label>
                            <input name="description" class="form-control" id="description"
                                   value="{{ $data['item']->description }}">
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <label for="condition" class="form-label">Condition</label>
                            <select name="condition" id="condition" class="form-select" required>
                                <option value="{{ $data['item']->condition }}"
                                        selected>{{ $data['item']->condition }}</option>
                                <option value="broken">Broken</option>
                                <option value="good">Good</option>
                                <option value="lost">Lost</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="{{ $data['item']->item_status }}"
                                        selected>{{ $data['item']->item_status }}</option>
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <label for="item_img" class="form-label">Picture</label>
                            <input class="form-control" type="file" id="item_img" name="item_img"
                                   accept=".png, .jpg, .jpeg">
                            <img src="{{ asset('item/' . $data['item']->filename) }}" width="120rem">
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
