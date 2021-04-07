<?php

namespace App\Repositories\Song;

use App\Models\Song;
use Illuminate\Support\ServiceProvider;

class SongRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Interfaces\Repositories\SongInterface', function($app) {
            return new SongRepository(new Song());
        });
    }
}