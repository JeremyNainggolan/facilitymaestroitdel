<ul class="nav nav-tabs d-flex">
    <li class="nav-item flex-fill">
        <x-history-nav-links href="/history" :active="request()->is('history')">
            Item
        </x-history-nav-links>
    </li>
    <li class="nav-item flex-fill">
        <x-history-nav-links href="/history/facility" :active="request()->is('history/facility')">
            Facility
        </x-history-nav-links>
    </li>
</ul>
