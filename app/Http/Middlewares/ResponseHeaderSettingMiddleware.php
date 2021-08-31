<?php

namespace App\Http\Middlewares;

class ResponseHeaderSettingMiddleware
{
    public function handle($request, $next)
    {
        // header should be set before $next($request)
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
        }
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Headers: Accept, Authorization, Content-Type, Origin, X-Requested-With');

        $response = $next($request);

        return $response;
    }
}
