MeliSocialite
=======================
[![Latest Stable Version](https://poser.pugx.org/altivium/melisocialite/v/stable)](https://packagist.org/packages/altivium/melisocialite)
[![License](https://poser.pugx.org/altivium/melisocialite/license)](https://packagist.org/packages/altivium/melisocialite)
[![Total Downloads](https://poser.pugx.org/altivium/melisocialite/downloads)](https://packagist.org/packages/altivium/melisocialite)

Laravel Socialite Provider para Mercadolibre, integra fácilmente la autenticación/autorización en Laravel

[Developers Mercadolibre](https://developers.mercadolibre.com/)

[Laravel Socialite](https://laravel.com/docs/8.x/socialite)

Requirements
------------

MeliSocialite requiere la versión 
**Laravel v8+**

**Socialite v5.0+**

Instalación
-------

Para instalar via composer:
```php
composer require altivium/melisocialite
```
Configuración
-------

Agrega en el archivo config/services.php de Laravel la siguiente configuración

```php
<?php
// config/services.php
'meli' => [
    'client_id' => env('MELI_CLIENT_ID'),
    'client_secret' => env('MELI_CLIENT_SECRET'),
    'redirect' => 'http://example.com/callback-url',
],

```
No olvides setear en tu .env las variables MELI_CLIENT_ID y MELI_CLIENT_SECRET con los datos correspondientes a tu app de MercadoLibre

En tus controladores y/o rutas ya puedes usarlo de la siguiente forma

```php
use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    return Socialite::driver('meli')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('meli')->user();

    // $user->token
});

```

Soporte
-------

Soporte
Para 
  
Licencia
-------

MIT © **[`Altivium SAS de CV`](https://altivium.com)**
