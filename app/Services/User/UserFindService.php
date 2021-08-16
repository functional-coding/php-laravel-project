<?php

namespace App\Services\User;

use App\Models\User;
use FunctionalCoding\Illuminate\Service\FindService;
use FunctionalCoding\Service;

class UserFindingService extends Service
{
    public static function getArrBindNames()
    {
        return [
            'result' => 'user for {{id}}',
        ];
    }

    public static function getArrCallbackLists()
    {
        return [];
    }

    public static function getArrLoaders()
    {
        return [
            'available_expands' => function () {
                return [];
            },

            'model_class' => function () {
                return User::class;
            },
        ];
    }

    public static function getArrPromiseLists()
    {
        return [];
    }

    public static function getArrRuleLists()
    {
        return [];
    }

    public static function getArrTraits()
    {
        return [
            FindService::class,
        ];
    }
}
