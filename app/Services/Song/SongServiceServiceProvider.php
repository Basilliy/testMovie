<?php

namespace App\Services\Song;

use Illuminate\Support\ServiceProvider;

class SongServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('songService', function($app) {
            return new SongService(
                $app->make('App\Interfaces\Repositories\SongInterface')
            );
        });
    }
}