<?php

namespace Laravel\Socialite\Tests;

use Altivium\MeliSocialite\MeliProvider;
use Laravel\Socialite\Contracts\Factory;
use Laravel\Socialite\SocialiteServiceProvider;
use Orchestra\Testbench\TestCase;

class MeliSocialiteManagerTest extends TestCase
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('services.meli', [
            'client_id' => 'meli-client-id',
            'client_secret' => 'meli-client-secret',
            'redirect' => 'http://your-callback-url',
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [SocialiteServiceProvider::class];
    }

    public function test_it_can_instantiate_the_meli_driver()
    {
        $factory = $this->app->make(Factory::class);

        $provider = $factory->driver('meli');

        $this->assertInstanceOf(MeliProvider::class, $provider);
    }
}
