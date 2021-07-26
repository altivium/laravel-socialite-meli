<?php

namespace Altivium\MeliSocialite;

use Laravel\Socialite\Contracts\Factory;
use Laravel\Socialite\SocialiteServiceProvider;

class MeliSocialiteServiceProvider extends SocialiteServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/services.php',
            'services'
        );

        $this->app->singleton(Factory::class, function ($app) {
            return new MeliManager($app);
        });
    }
}
