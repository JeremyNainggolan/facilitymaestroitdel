<div class="d-flex flex-column flex-shrink-0 text-dark p-4 vh-100 position-sticky shadow-sm"
     style="width: 30vh; top: 0; background-color: #ffffff">
    <a href="{{ url('admin/dashboard') }}"
       class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="{{ asset('svg/logo-no-background.svg') }}" class="img-fluid p-4" alt="Logo">
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <x-side-nav-links href="/admin/dashboard" :active="request()->is('admin/dashboard') || request()->is('admin')">
                <i class="bi bi-command px-2"></i>
                Dashboard
            </x-side-nav-links>
        </li>
        <li>
            <x-side-nav-links href="/admin/user"
                              :active="request()->is('admin/user') || request()->is('admin/user/edit') || request()->is('admin/user/history')">
                <i class="bi bi-person px-2"></i>
                User
            </x-side-nav-links>
        </li>
        <li>
            <x-side-nav-links href="/admin/item"
                              :active="request()->is('admin/item') || request()->is('admin/item/add') || request()->is('admin/item/edit') || request()->is('admin/detail')">
                <i class="bi bi-tv px-2"></i>
                Item
            </x-side-nav-links>
        </li>
        <li>
            <x-side-nav-links href="/admin/storage"
                              :active="request()->is('admin/storage') || request()->is('admin/storage/edit') || request()->is('admin/storage/add')">
                <i class="bi bi-archive px-2"></i>
                Storage
            </x-side-nav-links>
        </li>
        <li>
            <x-side-nav-links href="/admin/rent" :active="request()->is('admin/rent') || request()->is('admin/rent/request') || request()->is('admin/rent/active')">
                <i class="bi bi-inbox px-2"></i>
                Rent
            </x-side-nav-links>
        </li>
        <li>
            <x-side-nav-links href="/admin/facility" :active="request()->is('admin/facility')">
                <i class="bi bi-building px-2"></i>
                Facility
            </x-side-nav-links>
        </li>
        <li>
            <x-side-nav-links href="/admin/report" :active="request()->is('admin/report')">
                <i class="bi bi-exclamation-octagon px-2"></i>
                Report
            </x-side-nav-links>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
           data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ \Illuminate\Support\Facades\Auth::user()->filename != null ? asset('user/' . \Illuminate\Support\Facades\Auth::user()->filename) : asset('user/default-picture.png') }}" alt="" width="32" height="32" class="rounded-circle me-3">
            <strong>{{ \Illuminate\Support\Facades\Auth::user()->username }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sign out</a>
            </li>
        </ul>
    </div>

    {{--    <!-- Button trigger modal -->--}}
    {{--    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">--}}
    {{--        Launch static backdrop modal--}}
    {{--    </button>--}}


</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Sign Out</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to Sign Out?
            </div>
            <div class="modal-footer">
                <form method="GET" action="{{ url('admin/logout') }}" role="form">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary" href="{{ url('admin/logout') }}">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
