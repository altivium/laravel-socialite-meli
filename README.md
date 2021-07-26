MeliSocialite
=======================
[![Latest Stable Version](https://poser.pugx.org/altivium/laravel-socialite-meli/v/stable)](https://packagist.org/packages/altivium/laravel-socialite-meli)
[![License](https://poser.pugx.org/altivium/laravel-socialite-meli/license)](https://packagist.org/packages/altivium/laravel-socialite-meli)
[![Total Downloads](https://poser.pugx.org/altivium/laravel-socialite-meli/downloads)](https://packagist.org/packages/altivium/laravel-socialite-meli)

Laravel Socialite Provider para Mercadolibre, integra fácilmente la autenticación/autorización en Laravel

[Developers Mercadolibre](https://developers.mercadolibre.com/)

[Laravel Socialite](https://laravel.com/docs/socialite)

Requirements
------------

MeliSocialite requiere la versión 
**Laravel v8+**

**Socialite v5.0+**

Instalación
-------

Para instalar via composer:
```php
composer require altivium/laravel-socialite-meli
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
    'redirect' => env('MELI_REDIRECT'),
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

Funciona para MercadoLibre:

  * [x] Argentina 🇦🇷
  * [x] Bolivia 🇧🇴
  * [x] Brasil 🇧🇷
  * [x] Chile 🇨🇱
  * [x] Colombia 🇨🇴
  * [x] Costa Rica 🇨🇷
  * [x] Dominicana 🇩🇴
  * [x] Ecuador 🇪🇨
  * [x] Guatemala 🇬🇹
  * [x] Honduras 🇭🇳
  * [x] México 🇲🇽
  * [x] Nicaragua 🇳🇮
  * [x] Panamá 🇵🇦
  * [x] Paraguay 🇵🇾
  * [x] Perú 🇵🇪
  * [x] Portugal 🇵🇹
  * [x] Salvador 🇸🇻
  * [x] Uruguay 🇺🇾
  * [x] Venezuela 🇻🇪
  
Licencia
-------

MIT © **[`Altivium SAS de CV`](https://altivium.com)**
