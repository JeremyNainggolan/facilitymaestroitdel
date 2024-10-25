<a {{ $attributes }} class="nav-link w-100 text-center {{ $active ? 'active' : 'text-primary' }}"
   aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
