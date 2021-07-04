<?php

namespace App\Providers;

use App\Models\Note;
use Illuminate\Support\ServiceProvider;
use Route;

class SlugServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('note', function ($uuid) {
            if (strpos($uuid, '-') >= 0) {
                $explodedUuid = explode('-', $uuid);
                $uuid = $explodedUuid[count($explodedUuid) - 1];
            }
            return Note::query()->where('uuid', $uuid)->firstOrFail();
        });
    }
}
