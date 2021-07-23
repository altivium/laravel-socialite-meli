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
