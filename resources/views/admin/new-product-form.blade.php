<x-layout>
    <x-layout-admin>
        <h1>Crear un nuevo producto</h1>
        <form action="{{ route('create-product') }}" method="post">

            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="name" id="name" placeholder="Nombre del producto">
                <label for="name">Nombre del producto</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="short_description" id="short_description" placeholder="Descripción Corta"></textarea>
                <label for="short_description">Descripción Corta</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="content" id="content" placeholder="Descripción Larga"></textarea>
                <label for="content">Descripción Larga</label>
            </div>

            <div class="mb-3">
                <label for="picture" class="form-label">Imagen del producto</label>
                <input class="form-control" name="picture" type="file" id="picture">
            </div>

            <div class="input-group mb-3">
                <div class="form-floating ">
                    <input class="form-control" type="number" name="price" id="price" placeholder="0"
                        min="0" step="0.01">
                    <label for="price">Precio</label>
                </div>
                <span class="input-group-text">€</span>
            </div>

            <div class="input-group mb-3">
                <div class="form-floating">
                    <input class="form-control" type="number" name="stock" id="stock" placeholder="0"
                        min="0">
                    <label for="stock">Stock</label>
                </div>
                <span class="input-group-text">Unidades</span>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Categoría</span>
                <select name="category_id" id="category_id" class="form-select">
                    <option value="">-- Selecciona una categoría --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <h6>Etiquetas</h6>
                <div class="row">
                    @foreach ($tags as $tag)
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tags" value="{{$tag->id}}" id="tag-{{$tag->id}}">
                                <label class="form-check-label" for="tag-{{$tag->id}}">
                                    {{$tag->name}}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Crear producto</button>
        </form>
    </x-layout-admin>
</x-layout>
