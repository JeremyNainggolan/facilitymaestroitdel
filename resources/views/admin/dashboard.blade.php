@extends('layouts/app')
@section('title', 'Dashboard')
@section('content')
    <div class="d-flex">

        <aside>
            <x-side-nav-bar></x-side-nav-bar>
        </aside>
        <div class="col-lg-9 col-md-6 p-3">
            <p>Pages / Dashboard</p>

            <h3 class="mb-4">Dashboard</h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5>Total Users</h5>
                            <p>48 Users</p>
                            <a href="#" class="btn btn-primary btn-sm">View Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5>Total Materials</h5>
                            <p>128 Items</p>
                            <a href="#" class="btn btn-primary btn-sm">View Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5>Total Materials</h5>
                            <p>128 Items</p>
                            <a href="#" class="btn btn-primary btn-sm">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mt-5">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5>Total Users</h5>
                            <p>48 Users</p>
                            <a href="#" class="btn btn-primary btn-sm">View Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-5">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5>Total Materials</h5>
                            <p>128 Items</p>
                            <a href="#" class="btn btn-primary btn-sm">View Detail</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
