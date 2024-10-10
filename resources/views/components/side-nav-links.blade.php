<a {{ $attributes }} class="nav-link {{ $active ? 'active' : 'text-dark' }}"
   aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
