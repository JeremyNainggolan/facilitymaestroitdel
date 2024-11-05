<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ url('admin') }}">
            <img src="{{ asset('svg/logo-no-background.svg') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Facility Maestro</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li>
                <x-side-nav-links href="/admin/dashboard" :active="request()->is('admin/dashboard') || request()->is('admin') || request()->is('admin/profile')">
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
                                  :active="request()->is('admin/item') || request()->is('admin/item/add') || request()->is('admin/item/edit') || request()->is('admin/item/edit/*')">
                    <i class="bi bi-tv px-2"></i>
                    Item
                </x-side-nav-links>
            </li>
            <li>
                <x-side-nav-links href="/admin/storage"
                                  :active="request()->is('admin/storage') || request()->is('admin/storage/edit') || request()->is('admin/storage/add') || request()->is('admin/storage/edit/*')">
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
                <x-side-nav-links href="/admin/facility" :active="request()->is('admin/facility') || request()->is('admin/facility/add') || request()->is('admin/facility/edit') || request()->is('admin/facility/edit/*')">
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
    </div>
</aside>
