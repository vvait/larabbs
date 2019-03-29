<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
//        'App\Events\Event' => [
//            'App\Listeners\EventListener',
//        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // add your listeners (aka providers) here
            'SocialiteProviders\Weixin\WeixinExtendSocialite@handle'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

//        $accessToken = '20_955ZmpePX4Vj1273nauLjMezxzlR5Wg7NyN5_wgSf3qUwv7nDHFBCRJQ7L2g6bfKP4nww0O_uiIXoMkgNLRG2Q';
//        $openID = 'oI8G41MFdnqUcznapo-p08v8aQg0';
//        $driver = Socialite::driver('weixin');
//        $driver->setOpenId($openID);
//        $oauthUser = $driver->userFromToken($accessToken);

//        $code = '061pSxwf0alGbu1S9huf0WyMwf0pSxwF';
//        $driver = Socialite::driver('weixin');
//        $response = $driver->getAccessTokenResponse($code);
//        $driver->setOpenId($response['openid']);
//        $oauthUser = $driver->userFromToken($response['access_token']);

        //
    }
}
