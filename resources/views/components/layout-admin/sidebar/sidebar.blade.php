<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark vh-100 overflow-auto position-fixed">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <i class="bi bi-shop me-2 ms-4"></i>
        <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    @php
        $menu_elements = [
            'Home' => [
                'text' => 'Inicio',
                'icon' => 'bi bi-house',
                'url' => route('admin-page'),
            ],
            'Crear Producto' => [
                'text' => 'Crear Producto',
                'icon' => 'bi bi-plus-square',
                'url' => route('create-product'),
            ],
            'Tienda' => [
                'text' => 'Tienda',
                'icon' => 'bi bi-shop',
                'url' => route('store'),
            ],
        ];
    @endphp
    <ul class="nav nav-pills flex-column mb-auto">
        @foreach ($menu_elements as $element)
            @php
                $text = $element['text'];
                $url = $element['url'];
                $icon = $element['icon'];
            @endphp

            <x-layout-admin.sidebar.menu-element :text="$text" :url="$url" :icon="$icon" />
        @endforeach

    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" class="rounded-circle me-2" width="32"
                height="32">
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" style="">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>
