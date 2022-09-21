<x-layout>
    <x-layout-admin>
        <h1>Nueva Etiqueta</h1>
        <x-layout-admin.form-components.errors />
        <form action="{{ route('create-tag') }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="name" id="name" placeholder="Nombre la etiqueta"
                    value="{{ old('name') }}">
                <label for="name">Nombre de la etiqueta</label>
            </div>

            <button type="submit" class="btn btn-primary">Crear Etiqueta</button>
        </form>
    </x-layout-admin>
</x-layout>
