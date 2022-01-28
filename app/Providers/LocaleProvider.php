<?php

namespace App\Providers;

use FunctionalCoding\Service;
use Illuminate\Support\ServiceProvider;

class LocaleProvider extends ServiceProvider
{
    public function boot()
    {
        Service::setLocaleResolver(function () {
            return app('translator')->getLocale() ?: app('translator')->getFallback();
        });
    }
}
