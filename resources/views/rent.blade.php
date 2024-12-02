@extends('layouts/app')
@section('title', $data['page_title'])

@section('content')
    <x-nav-bar></x-nav-bar>

    <div class="container my-3">
        <div class="d-flex align-items-center justify-content-between">

            <div class="w-100 input-group">
                <input type="text" class="form-control border-dark ps-5" placeholder="Search">
                <span class="input-group-text border-dark" id="basic-addon1"><i class="bi bi-search"></i></span>
            </div>
        </div>

        <div class="card p-4 position-relative mt-4 rounded-2 shadow-blur shadow-lg ">
            <div class="card-title text-end text-white ">
                <a class="btn fw-bolder text-white btn-success" href="{{ url('rent/cart') }}">
                    Process Request
                </a>
            </div>

            @if (session()->has('error'))
                <div class="mx-4 mb-4 text-white p-2 rounded-2 alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif
            @if (session()->has('success'))
                <div class="mx-4 mb-4 text-white p-2 rounded-2 alert-info text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
                @if(empty($data['items']))
                    <div class="d-flex ps-3 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-xs fst-italic text-opacity-25">No Item Available</h6>
                        </div>
                    </div>
                @else
                    @foreach ($data['items'] as $item)
                        <div class="col">
                            <div class="card border-1 border-dark rounded-2 shadow-sm">
                                <img
                                    src="{{ $item['filename'] != null ? asset('item/' . $item['filename']) : asset('item/' . 'default.png') }}"
                                    alt="{{ $item['item_name'] }}"
                                    class="card-img-top p-3" style="height: 150px; object-fit: contain;">

                                <div class="card-body text-center fw-bold">
                                    <h6 class="card-title fs-5">{{ $item['item_name'] }}</h6>
                                    @if(\Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->content()->where('id', $item['item_id'])->count() > 0)
                                        <a class="btn w-100 mt-4 btn-secondary" href="{{ url('rent/cart') }}">
                                            Go to Cart
                                        </a>
                                    @else
                                        <form method="post" action="{{ route('cart.add') }}">
                                            @csrf
                                            <input type="hidden" name="id" id="id" value="{{ $item['item_id'] }}">
                                            <input type="hidden" name="item_name" id="item_name"
                                                   value="{{ $item['item_name'] }}">
                                            <input type="hidden" name="item_img" id="item_img"
                                                   value="{{ $item['filename'] }}">
                                            <button type="submit" class="btn w-100 mt-4 btn-primary">
                                                Request
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <hr class="horizontal dark">
    @include('components.footer')
@endsection
