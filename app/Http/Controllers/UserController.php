<?php

namespace App\Http\Controllers;

use App\Http\Controller;
use App\Services\User\UserFindingService;

class UserController extends Controller
{
    public static function show()
    {
        return [UserFindingService::class];
    }
}
