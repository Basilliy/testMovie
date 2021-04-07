<?php

namespace App\Services\Movie;

use App\Http\Requests\Movie\MovieDeleteRequest;
use App\Interfaces\Requests\Movie\MovieAllInterface;
use App\Interfaces\Requests\Movie\MovieCreateInterface;
use App\Interfaces\Requests\Movie\MovieInfoInterface;
use App\Interfaces\Requests\Movie\MovieUpdateInterface;
use Illuminate\Support\Facades\Facade;

/**
 * App\Services\Movie\MovieFacade
 *
 * @method static addMovie(MovieCreateInterface $data)
 * @method static itemInfo(MovieInfoInterface $data)
 * @method static allMovies(MovieAllInterface $data)
 * @method static updateItem(MovieUpdateInterface $data)
 * @method static deleteItem(MovieDeleteRequest $data)
 */
class MovieFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'movieService'; }
}