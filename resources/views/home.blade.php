@extends('layouts/app')
@section('title', $data['page_title'])
@section('content')
    <x-nav-bar></x-nav-bar>

    <div class="position-relative min-vh-100 justify-content-center align-items-start d-flex flex-column px-5"
         style="background-image: url('{{ asset('img/tobalake.jpg') }}'); background-size: cover; background-position: center;">
        <div class="position-relative">
            <h3 class="display-5 text-white fw-bold py-0 ">Facility Maestro IT Del</h3>
            <h1 class="display-1 text-white fw-bold">Hello, {{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>
            <p class="lead my-0 text-white">Enhances user-friendliness in accessing and using facilities.</p>
            <a href="/rent" class="btn btn-primary mt-3 rounded-pill px-5">Rent Now</a>
        </div>
    </div>

    <div id="infoCarousel" class="carousel slide my-5 p-5" data-bs-ride="carousel">
        <div class="carousel-inner text-center">
            <!-- Borrowing Goods -->
            <div class="carousel-item active">
                <div class="d-flex justify-content-center">
                    <div class="card col-lg-4 col-md-6 mb-4 shadow border-light">
                        <div class="card-body fs-5 text-center">
                            <i class="bi bi-collection" style="font-size: 3rem;"></i>
                            <p class="card-title mt-2 fw-bold">Borrowing Goods</p>
                            <p class="card-text">IT Del Academic Community can apply for borrowing goods.</p>
                            <p class="card-text text-secondary small">
                                You can borrow items such as projectors, microphones, and other facilities to support academic or organizational activities. Submit your request online and pick up the items at the designated location.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Facility Loan -->
            <div class="carousel-item">
                <div class="d-flex justify-content-center">
                    <div class="card col-lg-4 col-md-6 mb-4 shadow border-light">
                        <div class="card-body fs-5 text-center">
                            <i class="bi bi-building" style="font-size: 3rem;"></i>
                            <p class="card-title mt-2 fw-bold">Facility Loan</p>
                            <p class="card-text">IT Del Academic Community can apply for facility loans.</p>
                            <p class="card-text text-secondary small">
                                Facilities such as classrooms, meeting rooms, and labs are available for reservation. Ensure that your reservation aligns with the institution's guidelines and policies.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Borrowing Details -->
            <div class="carousel-item">
                <div class="d-flex justify-content-center">
                    <div class="card col-lg-4 col-md-6 mb-4 shadow border-light">
                        <div class="card-body fs-5 text-center">
                            <i class="bi bi-clock-history" style="font-size: 3rem;"></i>
                            <p class="card-title mt-2 fw-bold">Borrowing Details</p>
                            <p class="card-text">IT Del Academic Community can view borrowing history.</p>
                            <p class="card-text text-secondary small">
                                Track the status of your loan applications, check return deadlines, and ensure proper usage of borrowed items. Keep your borrowing history organized for easy reference.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#infoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black;"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#infoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black;"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <hr class="horizontal dark">
    <x-footer></x-footer>
@endsection
