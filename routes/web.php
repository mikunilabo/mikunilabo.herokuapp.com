<?php

use App\Http\Controllers;
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

Route::view('/', $name = 'welcome')->name($name);

Route::middleware(['auth', /*'verified'*/])->group(function () {
    Route::view($name = 'dashboard', $name)->name($name);
});

/**
 * Vendor
 */
Route::prefix($prefix = 'vendor')/*->namespace($studly = Str::studly($prefix))*/->name(sprintf('%s.', Str::snake(Str::studly($prefix))))->group(function () {
    Route::prefix($prefix = 'line')/*->namespace($studly = Str::studly($prefix))*/->name(sprintf('%s.', Str::snake(Str::studly($prefix))))->group(function () {
        Route::post($name = 'webhook', [Controllers\Vendor\Line\WebhookController::class, '__invoke'])->name($name);
    });
});

require __DIR__.'/auth.php';
