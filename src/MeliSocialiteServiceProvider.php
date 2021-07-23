<?php

namespace Altivium\MeliSocialite;

use Laravel\Socialite\SocialiteServiceProvider;

class MeliSocialiteServiceProvider extends SocialiteServiceProvider
{
    public function register()
    {
        $this->app->bind('Laravel\Socialite\Contracts\Factory', function ($app) {
            return new MeliManager($app);
        });
    }
}
