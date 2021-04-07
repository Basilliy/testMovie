<?php

namespace App\Services\Movie;

use Illuminate\Support\ServiceProvider;

class MovieServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('movieService', function($app) {
            return new MovieService(
                $app->make('App\Interfaces\Repositories\MovieInterface')
            );
        });
    }
}