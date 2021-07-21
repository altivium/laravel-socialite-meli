<?php

namespace Altivium\MeliSocialite;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

class MeliProvider extends AbstractProvider implements ProviderInterface
{
    protected $apiUrl = 'https://api.mercadolibre.com';
    protected $oauthUrl = '/oauth/token';
    protected $siteUrl = [
        "MLA" => "https://auth.mercadolibre.com.ar", // Argentina
        "MLB" => "https://auth.mercadolivre.com.br", // Brasil
        "MCO" => "https://auth.mercadolibre.com.co", // Colombia
        "MCR" => "https://auth.mercadolibre.com.cr", // Costa Rica
        "MEC" => "https://auth.mercadolibre.com.ec", // Ecuador
        "MLC" => "https://auth.mercadolibre.cl",     // Chile
        "MLM" => "https://auth.mercadolibre.com.mx", // Mexico
        "MLU" => "https://auth.mercadolibre.com.uy", // Uruguay
        "MLV" => "https://auth.mercadolibre.com.ve", // Venezuela
        "MPA" => "https://auth.mercadolibre.com.pa", // Panama
        "MPE" => "https://auth.mercadolibre.com.pe", // Peru
        "MPT" => "https://auth.mercadolibre.com.pt", // Portugal
        "MRD" => "https://auth.mercadolibre.com.do"  // Dominicana
    ];

    protected $siteId;

    protected $authUrl;

    protected function getAuthUrl($state)
    {
        if ($this->siteId) {
            $this->authUrl = $this->siteUrl[$this->siteId].'/authorization';
        } else {
            $this->authUrl = 'http://auth.mercadolibre.com/authorization';
        }

        return $this->buildAuthUrlFromBase($this->authUrl, $state);
    }

    protected function getTokenUrl()
    {
        return $this->apiUrl.$this->oauthUrl;
    }

    protected function getAccessToken($code)
    {
        $response = $this->getHttpClient()->post($this->getTokenUrl(), [
            'headers' => ['Accept' => 'application/json'],
            'body'    => $this->getTokenFields($code),
        ]);


        return $this->parseAccessToken($response->getBody());
    }

    protected function getTokenFields($code)
    {
        return array_add(
            parent::getTokenFields($code),
            'grant_type',
            'authorization_code'
        );
    }

    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get($this->apiUrl.'/users/me?'.http_build_query(['access_token'=>$token]));
        return json_decode($response->getBody(), true);
    }

    protected function mapUserToObject(array $user)
    {
        return (new User)->setRaw($user)->map([
            'id'       => $user['id'],
            'nickname' => $user['nickname'],
            'name'     => trim($user['first_name'].' '.$user['last_name']),
            'avatar'   => !empty($user['logo']) ? $user['logo'] : null,
            'email'    => (isset($user['email']))? $user['email'] : null,
        ]);
    }

    public function site($siteId)
    {
        $this->siteId = $siteId;
        return $this;
    }
}
