<nav class="p-smg-3 navbar navbar-expand-lg sticky-top navbar-light top-0 w-100 bg-light opacity-75">
    <div class="container-fluid p-1">
        <a class="navbar-brand px-lg-3 fw-bolder" href="#">Facility Maestro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav fw-bold">
                <li class="nav-item px-lg-5">
                    <x-nav-links href="/home" :active="request()->is('home')">Home</x-nav-links>
                </li>
                <li class="nav-item px-lg-5">
                    <x-nav-links href="/rent" :active="request()->is('rent')">Rent</x-nav-links>
                </li>
                <li class="nav-item px-lg-5">
                    <x-nav-links href="/book" :active="request()->is('book')">Book</x-nav-links>
                </li>
                <li class="nav-item px-lg-5">
                    <x-nav-links href="/history" :active="request()->is('history')">History</x-nav-links>
                </li>
                <li class="nav-item px-lg-5">
                    <x-nav-links href="/profile" :active="request()->is('profile')">Profile</x-nav-links>
                </li>
            </ul>
        </div>
    </div>
</nav>
