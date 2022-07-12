<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    // .envファイルの'APP_ENV'が'ngrok'ならhttps通信をする
    public function boot()
    {
        if(env('APP_ENV') === 'ngrok')
        {
            \URL::forceScheme('https');
        }
    }
}
