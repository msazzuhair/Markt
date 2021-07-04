<?php

use Illuminate\Support\Facades\Route;
use JoelButcher\Socialstream\Http\Controllers\Inertia\PasswordController;
use JoelButcher\Socialstream\Http\Controllers\Inertia\RemoveConnectedAccountsController;
use JoelButcher\Socialstream\Http\Controllers\OAuthController;
use Laravel\Socialite\Facades\Socialite;


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
    return redirect()->route('dashboard');
});

Route::get('/read/{note}',[\App\Http\Controllers\NoteController::class, 'read'])->name('note.read');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\NoteController::class, 'index'])->name('dashboard');
    Route::get('/note/create', [\App\Http\Controllers\NoteController::class, 'create'])->name('note.create');
    Route::get('/note/{note}', [\App\Http\Controllers\NoteController::class, 'show'])->name('note.show');
});

// OAuth
Route::group(['middleware' => config('socialstream.middleware', ['web'])], function () {
    Route::get('/auth/{provider}', [OAuthController::class, 'redirectToProvider'])->name('oauth.redirect');
    Route::get('/auth/{provider}/callback', [OAuthController::class, 'handleProviderCallback'])->name('oauth.callback');

    if (config('jetstream.stack') === 'inertia') {
        Route::delete('/user/connected-account/{id}', [RemoveConnectedAccountsController::class, 'destroy'])
            ->name('connected-accounts.destroy');

        Route::put('/user/set-password', [PasswordController::class, 'store'])->name('user-password.set');
    }
});
