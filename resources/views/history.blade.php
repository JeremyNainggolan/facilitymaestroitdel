@extends('layouts/app')
@section('title', 'User History')

@section('content')
    {{-- Navbar --}}
    <x-nav-bar></x-nav-bar>

    <div class="container mt-4">
        {{-- Page Title --}}
        <h1 class="text-center">Facility Maestro</h1>

        {{-- Navigation Tabs --}}
        <ul class="nav nav-tabs mt-4">
            <li class="nav-item">
                <a class="nav-link active" href="#">Item Rented History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Book History</a>
            </li>
        </ul>

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
                            <td><img src="path_to_guitar_image.png" alt="Guitar" style="width:50px;"></td>
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
                            <td><img src="path_to_basketball_image.png" alt="Basketball" style="width:50px;"></td>
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
                            <td><img src="path_to_volleyball_image.png" alt="Volleyball" style="width:50px;"></td>
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

    {{-- Footer --}}
    <footer class="text-center mt-4">
        <p>&copy; 2024. Copyright <strong>Facility Maestro</strong>. All Rights Reserved</p>
    </footer>
@endsection
