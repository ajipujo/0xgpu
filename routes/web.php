<?php

use App\Http\Controllers\admin\AiCloud;
use App\Http\Controllers\AiCloud as ControllersAiCloud;
use App\Http\Controllers\Web3Login;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/web3-login-message', [Web3Login::class, 'message']);
Route::post('/web3-login-verify', [Web3Login::class, 'verify']);

Route::prefix('admin')->group(function () {
    Route::resource('clouds', AiCloud::class);
});

Route::get('/aiclouds', [ControllersAiCloud::class, 'index']);
