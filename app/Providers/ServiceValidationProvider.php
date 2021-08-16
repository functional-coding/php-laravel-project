<?php

namespace App\Providers;

use FunctionalCoding\Service;
use App\Validator;

class ServiceValidationProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        Service::setResolverForGetValidationErrors(function ($data = [], $ruleLists = [], $names = []) {
            $validation = $this->app->make('validator');
            $validation->resolver(function ($tr, array $data, array $rules, array $messages, array $names) {
                return $this->app->make(
                    Validator::class,
                    [
                        'translator' => $tr,
                        'customAttributes' => $names,
                        'data' => $data,
                        'rules' => $rules,
                        'messages' => $messages,
                    ]
                );
            });

            $validator = $validation->make($data, $ruleLists, $messages = [], $names);
            $validator->passes();

            return $validator->errors()->all();
        });
    }
}
