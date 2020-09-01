<?php

namespace App\Providers;

use Jenssegers\Optimus\Optimus;
use Illuminate\Support\ServiceProvider;

class OptimusServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Optimus::class, function ($app) {
            $prime = config('my-setting.optimus.prime');
            $inverse = config('my-setting.optimus.inverse');
            $xor = config('my-setting.optimus.xor');

            if (empty($prime) || empty($inverse) || empty($xor)) {
                throw new \Exception("Optimus prime does not set! Run \"php vendor/bin/optimus spark\"");
            }

            return new Optimus($prime, $inverse, $xor);
        });
    }
}
