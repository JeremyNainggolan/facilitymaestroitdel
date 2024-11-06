<a {{ $attributes }} class="nav-link {{ $active ? 'active font-weight-bolder' : '' }}"
   aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
