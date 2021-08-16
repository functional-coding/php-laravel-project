<?php

namespace App\Http\Controllers;

use App\Http\Controller;
use App\Services\User\UserFindService;

class UserController extends Controller
{
    public static function show()
    {
        return [UserFindService::class];
    }
}
