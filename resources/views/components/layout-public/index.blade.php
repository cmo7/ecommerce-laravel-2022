@props(['cart'])

<x-layout-public.header />

@if ($cart != null)
    <x-layout-public.cart :cart="$cart" />
@endif

<div class="container mt-4">
    {{ $slot }}
</div>
<x-layout-public.footer />
