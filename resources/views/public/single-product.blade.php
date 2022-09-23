<x-layout>
    <x-layout-public>
        <a href="#" class="text-decoration-none"> <h3 class="text-muted text-start">{{$product->category->name}}</h3> </a>
        <div class="row mx-1">
            <div class="col-12 col-md-4 mb-3">
                <img src="{{$product->picture}}" class="img-fluid" alt="">
            </div>
            <div class="col-12 col-md-8 mb-3">
                <h1>{{$product->name}}</h1>
                <p class="fs-3">{{number_format($product->price, 2, ',', '.')}} €</p>
                <p>{{$product->short_description}}</p>
                <div id="tags">
                    @foreach ($product->tags as $tag)
                        <a class="btn btn-outline-dark" href="#">{{$tag->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <h3 class="m-3">Productos relacionados</h3>
        @php
            $name = "related";
        @endphp
        <x-layout-public.product-grid
            :products="$related_products"
            :name="$name"
        />

        <div class="row mx-1 mt-3">
            <h3>Descripción</h3>
            <p>{{$product->content}}</p>
        </div>
    </x-layout-public>
</x-layout>
