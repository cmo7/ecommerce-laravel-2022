@php
$cart = get_cart();
@endphp

<x-layout>
    <x-layout-public>
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Tu carrito</span>
                    <span class="badge bg-primary rounded-pill">{{ $cart->products->count() }}</span>
                </h4>
                <ul class="list-group mb-3">

                    @foreach ($cart->products as $product)
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">{{ $product->name }}</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">{{ $product->price }}€</span>
                        </li>
                    @endforeach

                    <!-- Precio Total -->
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (EUR)</span>
                        <strong>{{ $cart->total_price }}€</strong>
                    </li>
                    <!-- Precio Total termina -->
                </ul>

            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Dirección</h4>
                <form class="needs-validation" novalidate="" action="{{route('process-checkout')}}" method="POST">
                    @csrf
                    <div class="row g-3">

                        <div class="col-12">
                            <label for="address" class="form-label">Linea 1 de Dirección</label>
                            <input type="text" name="address" class="form-control" id="address"
                                placeholder="Calle Falsa 123" required="">
                        </div>

                        <div class="col-12">
                            <label for="address2" class="form-label">Linea 2 de Dirección <span
                                    class="text-muted">(Opcional)</span></label>
                            <input type="text" name="address2" class="form-control" id="address2"
                                placeholder="Escalera, piso, puerta">
                        </div>

                        <div class="col-md-5">
                            <label for="country" class="form-label">País</label>
                            <select name="country" class="form-select" id="country" required="">
                                <option value="">Elige...</option>
                                <option value="España">España</option>
                                <option value="Andorra">Andorra</option>
                                <option value="España">Nueva Zelanda</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="state" class="form-label">Provincia</label>
                            <select name="state" class="form-select" id="state" required="">
                                <option value="">Elige...</option>
                                <option value="S/C de Tenerife">Santa Cruz de Tenerife</option>
                                <option value="Las Palmas">Las Palmas</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="zip" class="form-label">Código Postal</label>
                            <input type="text" name="zip" class="form-control" id="zip" placeholder="" required="">
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Pago</h4>

                    <div class="row gy-3">
                        <div class="col-md-6">
                            <label for="cc-name" class="form-label">Nombre en la tarjeta</label>
                            <input type="text" class="form-control" id="cc-name" placeholder=""
                                required="">
                            <small class="text-muted">Nombre completo como aparece en la tarjeta</small>
                        </div>

                        <div class="col-md-6">
                            <label for="cc-number" class="form-label">Número de la tarjeta</label>
                            <input type="text" class="form-control" id="cc-number" placeholder=""
                                required="">
                        </div>

                        <div class="col-md-3">
                            <label for="cc-expiration" class="form-label">Caducidad</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder=""
                                required="">
                        </div>

                        <div class="col-md-3">
                            <label for="cc-cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder=""
                                required="">
                        </div>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Completar Pedido</button>
                </form>
            </div>
        </div>
    </x-layout-public>
</x-layout>
