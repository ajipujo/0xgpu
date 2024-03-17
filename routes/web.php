<?php

use App\Http\Controllers\admin\AiCloud as AdminAiCloud;
use App\Http\Controllers\admin\Transaction as AdminTransaction;
use App\Http\Controllers\admin\Dashboard;
use App\Http\Controllers\AiCloud;
use App\Http\Controllers\Frontend;
use App\Http\Controllers\Transaction;
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

Route::get('/', [Frontend::class, 'index'])->name('frontend.home');
Route::get('/clouds', [AiCloud::class, 'index'])->name('frontend.clouds');
Route::get('/cloud/{cloud}', [AiCloud::class, 'show'])->name('frontend.cloud');
Route::post('/cloud/{cloud}/transaction', [AiCloud::class, 'create_transaction'])->name('frontend.cloud.transaction');

Route::resource('/transaction', Transaction::class)->middleware('auth.guest');

Route::get('/web3-login-message', [Web3Login::class, 'message']);
Route::post('/web3-login-verify', [Web3Login::class, 'verify']);
Route::post('/logout', [Web3Login::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth.admin']], function() {
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard.home');

    // Transactions - Admin
    Route::get('/transactions', [AdminTransaction::class, 'index'])->name('dashboard.transactions');
    Route::get('/transaction/{transaction}', [AdminTransaction::class, 'show'])->name('dashboard.transaction.show');
    Route::patch('/transaction/{transaction}/accept', [AdminTransaction::class, 'accept'])->name('dashboard.transaction.accept');
    Route::patch('/transaction/{transaction}/reject', [AdminTransaction::class, 'reject'])->name('dashboard.transaction.reject');

    // Transactions - Cloud
    Route::resource('/clouds', AdminAiCloud::class);
});
