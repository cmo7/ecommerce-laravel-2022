<x-layout>
    <x-layout-public :cart="$cart" >
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

        @php
            $name = "todos-los-productos";
        @endphp
        <x-layout-public.product-grid
            :products="$products"
            :name="$name"/>

    </x-layout-public>
</x-layout>
