<?php

use Illuminate\Support\Facades\Route;

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

use FunctionalCoding\Illuminate\Http\RequestInputValueCastingMiddleware;
use FunctionalCoding\Illuminate\Http\ServiceParameterSettingMiddleware;
use FunctionalCoding\Illuminate\Http\ServiceRunMiddleware;
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
], function () use ($router) {
    // Route::get('examples', 'ExampleController@index');
    // Route::get('examples/{id}', 'ExampleController@show');
    Route::get('/', function () {
        dd('hello world');
    });
});

Route::get('/', function () {
    return view('welcome');
});
