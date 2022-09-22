<x-layout>
    <x-layout-admin>
        <h1>Lista de productos</h1>
        <div class="mt-3 container">
            <div class="row mb-1">
                <div class="col-12 col-md-4 fs-3">
                    Nombre del producto
                </div>
                <div class="col-12 col-md-2 fs-3">
                    Precio
                </div>
                <div class="col-12 col-md-2 fs-3">
                    Stock
                </div>
                <div class="col-12 col-md-2 fs-3">
                    Ventas
                </div>
                <div class="col-12 col-md-2 fs-3">
                    Controles
                </div>
            </div>
            <hr>
            @foreach ($products as $product)
                <div class="row mb-1">
                    <div class="col-12 col-md-4">
                        {{ $product->name }}
                    </div>
                    <div class="col-12 col-md-2">
                        {{ $product->price }} €
                    </div>
                    <div class="col-12 col-md-2">
                        {{ $product->stock }} Unidades
                    </div>
                    <div class="col-12 col-md-2">
                        {{ $product->orders->count() }}
                    </div>
                    <div class="col-12 col-md-2">
                        <a href="#" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Borrar</a>
                    </div>
                </div>
            @endforeach
        </div>
    </x-layout-admin>
</x-layout>
