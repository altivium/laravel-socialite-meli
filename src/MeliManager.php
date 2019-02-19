<?php

namespace Altivium\MeliSocialite;
use Laravel\Socialite\SocialiteManager;

class MeliManager extends SocialiteManager
{
    protected function createMeliDriver()
    {
        $config = $this->app['config']['services.meli'];

        return $this->buildProvider(
            MeliProvider::class, $config
        );
    }
}