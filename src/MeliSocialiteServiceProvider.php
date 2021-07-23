<?php

namespace Altivium\MeliSocialite;

use Laravel\Socialite\SocialiteServiceProvider;
use Laravel\Socialite\Contracts\Factory;

class MeliSocialiteServiceProvider extends SocialiteServiceProvider
{
    public function register()
    {
        $this->app->singleton(Factory::class, function ($app) {
            return new MeliManager($app);
        });
    }
}
