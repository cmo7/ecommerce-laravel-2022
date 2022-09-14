# Ecommerce con Laravel

Se trata de una aplicación web para una tienda online.

Entre otras características debería tener:

- Listado de productos.
- Perfiles de usuarios.
- Panel de administración de la tienda.
- Capacidad de hacer pedidos.
- Carrito de la compra.

## Stack

- [Laravel (backend)](http://laravel.com)
- MySQL (base de datos)
- [Bootstrap (librería de componentes)](https://getbootstrap.com)

## TODO

- [ ] Diseñar lista de modelos
- [ ] Diseñar lista de migraciones
- [ ] Diseñar lista de controladores
  
## Modelos

### Product

Modelo "Product"
Tabla "products"
Controlador "ProductController"

| Columna | Tipo    | Descripción                     |
| ------- | ------- | ------------------------------- |
| id      | integer | Clave Primaria del Product      |
| name    | string  | Nombre que se muestra en la web |
