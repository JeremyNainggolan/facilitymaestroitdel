<a {{ $attributes }} class="nav-link w-100 text-center text-uppercase text-xs font-weight-bolder  {{ $active ? 'active' : 'text-primary' }}"
   aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
