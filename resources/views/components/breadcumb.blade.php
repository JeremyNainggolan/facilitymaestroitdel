<?php
$url = request()->getPathInfo();
$items = explode('/', $url);
unset($items[0]);
?>

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach($items as $key => $item)
            @if($key == count($items))
                <li class="breadcrumb-item active" aria-current="page">{{ \Illuminate\Support\Str::ucfirst($item) }}</li
            @else
                <li class="breadcrumb-item"><a href="{{ $item }}">{{ \Illuminate\Support\Str::ucfirst($item) }}</a></li>
            @endif
        @endforeach

    </ol>
</nav>
