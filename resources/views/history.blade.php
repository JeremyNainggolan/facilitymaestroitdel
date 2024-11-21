@extends('layouts/app')
@section('title', $data['page_title'])

@section('content')
    {{-- Navbar --}}
    <x-nav-bar></x-nav-bar>

        {{-- Centered Navigation Tabs --}}
        <div class="d-flex justify-content-center mt-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Item Rented History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Book History</a>
                </li>
            </ul>
        </div>

        {{-- Table Section --}}
        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Request Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Guitar Row --}}
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('img/guitar.jpg') }}" alt="Guitar" style="width:50px;"></td>
                            <td>Guitar</td>
                            <td>2024-09-07</td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-secondary">Detail</button>
                            </td>
                        </tr>
                        {{-- Basketball Row --}}
                        <tr>
                            <td>2</td>
                            <td><img src="{{ asset('img/basketball.jpg') }}" alt="Basketball" style="width:50px;"></td>
                            <td>Basketball</td>
                            <td>2024-09-25</td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-secondary">Detail</button>
                            </td>
                        </tr>
                        {{-- Volleyball Row --}}
                        <tr>
                            <td>3</td>
                            <td><img src="{{ asset('img/vollyball.jpg') }}" alt="Volleyball" style="width:50px;"></td>
                            <td>Volleyball</td>
                            <td>2024-09-25</td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-secondary">Detail</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
 <!-- Footer -->
 <hr class="horizontal dark">
    @include('components.footer')
@endsection
