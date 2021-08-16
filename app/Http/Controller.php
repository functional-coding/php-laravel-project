<?php

namespace App\Http;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;

class Controller extends \Illuminate\Routing\Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public static function bearerToken()
    {
        return Request::bearerToken() ? Request::bearerToken() : '';
    }

    public static function input($key)
    {
        return Arr::get(Request::all(), $key, '');
    }

    public static function route($key)
    {
        return Request::route($key);
    }
}
