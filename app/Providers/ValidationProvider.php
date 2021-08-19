<?php

namespace App\Providers;

use App\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Factory;

class ValidationProvider extends ServiceProvider
{
    public function register()
    {
        Factory::resolver(function ($translator, $data, $rules, $customMessages, $customNames) {
            return new Validator(
                $translator,
                $data,
                $rules,
                $customMessages,
                $customNames
            );
        });
    }
}
