<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Middlewares\RequestInputValueCastingMiddleware;
use App\Http\Middlewares\ServiceParameterSettingMiddleware;
use App\Http\Middlewares\ServiceRunMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

$prefix = str_replace('/', DIRECTORY_SEPARATOR, $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR);
$prefix = str_replace($prefix, '', __FILE__);
$prefix = str_replace('routes'.DIRECTORY_SEPARATOR.'web.php', '', $prefix);
$prefix = rtrim($prefix, DIRECTORY_SEPARATOR);
$prefix = str_replace(DIRECTORY_SEPARATOR, '/', $prefix);
$prefix = $_SERVER['DOCUMENT_ROOT'] && Str::startsWith(__FILE__, str_replace('/', DIRECTORY_SEPARATOR, $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR)) ? $prefix : '';

Route::group([
    'prefix' => $prefix,
    'middleware' => [
        ServiceRunMiddleware::class,
        ServiceParameterSettingMiddleware::class,
        RequestInputValueCastingMiddleware::class,
    ],
], function () {
    // Route::get('examples', 'ExampleController@index');
    Route::get('users/{id}', 'UserController@show');
    Route::get('/', function () {
        dd('hello world');
    });
});

Route::get('/', function () {
    return view('welcome');
});
