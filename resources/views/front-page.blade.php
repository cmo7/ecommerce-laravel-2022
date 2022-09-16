<x-layout>
    <x-layout-public>
        <!-- Hero -->
        <section id="hero" class="container-fluid">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="/images/marvin-meyer-SYTO3xs06fU-unsplash.jpg" class="d-block mx-lg-auto img-fluid"
                        alt="Bootstrap Themes" loading="lazy" width="700" height="500">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Responsive left-aligned hero with image</h1>
                    <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the
                        world’s most popular front-end open source toolkit, featuring Sass variables and mixins,
                        responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="products" class="cotainer-fluid">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($products as $product)
                @php
                    $price = number_format($product->price, 2, ',', '.');
                    list($whole, $decimal) = explode(',', $price);
                @endphp
                <!-- Product List Element -->
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img class="card-img-top" src="{{$product->picture}}">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <div class="d-flex justify-content-between align-items-center mt-auto flex-wrap-reverse">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-lg btn-outline-primary">Ver más</button>
                                    <button type="button" class="btn btn-lg btn-primary"><i class="bi bi-cart-plus"></i></button>
                                </div>
                                <div class="d-flex align-items-start">
                                    <span class="fs-2">{{$whole}}</span>
                                    <span class="fs-6">{{$decimal}}</span> €
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Product List Element -->
                @endforeach
            </div>
        </section>
    </x-layout-public>
</x-layout>
