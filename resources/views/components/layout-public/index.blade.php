<x-layout-public.header />

@if (get_cart() != null)
    <x-layout-public.cart />
@endif

<div class="container mt-4">
    {{ $slot }}
</div>
<x-layout-public.footer />
