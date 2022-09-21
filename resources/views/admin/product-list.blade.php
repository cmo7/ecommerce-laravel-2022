<x-layout>
    <x-layout-admin>
        <h1>Lista de productos</h1>
        <div class="mt-3 container">
            @foreach ($products as $product)
                <div class="row mb-1">
                    <div class="col-12 col-md-4">
                        {{$product->name}}
                    </div>
                    <div class="col-12 col-md-2">
                        {{$product->price}}
                    </div>
                    <div class="col-12 col-md-2">
                        {{$product->stock}}
                    </div>
                    <div class="col-12 col-md-2">
                        {{$product->orders->count()}}
                    </div>
                    <div class="col-12 col-md-2">
                        <a href="#" class="btn btn-primary">Editar</a>
                    </div>
                </div>
            @endforeach
        </div>
    </x-layout-admin>
</x-layout>
