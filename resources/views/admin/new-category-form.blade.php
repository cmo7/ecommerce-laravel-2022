<x-layout>
    <x-layout-admin>
        <h1>Nueva Categoría</h1>
        <x-layout-admin.form-components.errors />
        <form action="{{ route('create-category') }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="name" id="name" placeholder="Nombre la categria"
                    value="{{ old('name') }}">
                <label for="name">Nombre de la categoría</label>
            </div>

            <button type="submit" class="btn btn-primary">Crear Categoria</button>
        </form>
    </x-layout-admin>
</x-layout>
