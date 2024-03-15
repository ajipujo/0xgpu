<?php

use App\Http\Controllers\admin\AiCloud as AdminAiCloud;
use App\Http\Controllers\AiCloud;
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
Route::post('/logout', [Web3Login::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::resource('/clouds', AdminAiCloud::class);
});

Route::get('/clouds', [AiCloud::class, 'index'])->name('frontend.clouds');
Route::get('/clouds/trx/:id', [AiCloud::class, 'index']);
