<?php

namespace App\Providers;

use App\Validator;
use Illuminate\Support\Facades\Validator as Validation;
use Illuminate\Support\ServiceProvider;

class ValidationProvider extends ServiceProvider
{
    public function boot()
    {
        Validation::resolver(function ($translator, $data, $rules, $customMessages, $customNames) {
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
