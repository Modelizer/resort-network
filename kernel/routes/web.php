<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\ComponentAttributeBag;

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

Route::get('/', function () {
    return view('welcome', [
        'component' => 'foo',
        'value' => '<div>abc</div>',
        'my1' => 1,
        'myAttributes' => ([
            'acme' => 'cool',
        ]),
    ]);
});
