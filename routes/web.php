<?php

use App\Http\Controllers\ShortLinkController;
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

Route::name('shortLink.')->group(function () {
    Route::get('/{token}', [ShortLinkController::class, 'redirect'])->name('redirect');
    Route::get('/', [ShortLinkController::class, 'create'])->name('create');
    Route::post('/', [ShortLinkController::class, 'store'])->name('store');
    Route::get('short-link/{token}', [ShortLinkController::class, 'show'])->name('show');
});
