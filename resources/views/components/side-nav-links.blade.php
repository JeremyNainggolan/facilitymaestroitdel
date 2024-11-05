<a {{ $attributes }} class="nav-link {{ $active ? 'active bg-primary text-light' : 'text-dark' }}"
   aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
