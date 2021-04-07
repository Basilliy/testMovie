<?php

namespace App\Repositories\Movie;

use App\Models\Movie;
use Illuminate\Support\ServiceProvider;

class MovieRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Interfaces\Repositories\MovieInterface', function($app) {
            return new MovieRepository(new Movie());
        });
    }
}