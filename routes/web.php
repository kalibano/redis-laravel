<?php

use Illuminate\Support\Facades\Cache;

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
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Redis::set('name', 'Taylor');
    echo Redis::get('name');
    // return view('welcome');
    $lock = Cache::lock('importing-data', 10);
    dd($lock->get());
    if ($lock->get()) {
        $lock->release();
    }
});
