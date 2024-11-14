<!-- Navbar Light -->
<nav
    class="navbar sticky-top navbar-expand-lg navbar-light bg-white z-index-3 py-3">
    <div class="container">
        <a class="navbar-brand" href="" rel="tooltip" title="Facility Maestro" data-placement="bottom" target="_blank">
            Facility Maestro
        </a>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ms-auto">
                <li class="nav-item px-lg-5">
                    <x-nav-links href="/home" :active="request()->is('home') || request()->is('/')">Home</x-nav-links>
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
<!-- End Navbar -->
