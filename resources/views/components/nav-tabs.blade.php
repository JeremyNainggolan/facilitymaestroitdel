<ul class="nav nav-tabs d-flex">
    <li class="nav-item flex-fill">
        <x-nav-tabs-links href="/admin/rent/request" :active="request()->is('admin/rent/request') || request()->is('admin/rent')">
            Request
        </x-nav-tabs-links>
    </li>
    <li class="nav-item flex-fill">
        <x-nav-tabs-links href="/admin/rent/active" :active="request()->is('admin/rent/active')">
            Active
        </x-nav-tabs-links>
    </li>
</ul>
