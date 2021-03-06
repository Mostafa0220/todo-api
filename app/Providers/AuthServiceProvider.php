<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
    }

    /**
     * Boot the authentication services for the application.
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            if ($token = $request->bearerToken()) {
                return User::where('api_token', $token)->first();
            }
        });
        /* $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->header('Authorization')) {
            $key = explode(' ',$request->header('Authorization'));
            $user = User::where('api_token', $key[1])->first();
            if(!empty($user)){
            $request->request->add(['userid' => $user->id]);
            }
            return $user;
            }
            }); */
    }
}
