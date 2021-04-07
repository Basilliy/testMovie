<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Requests\Movie\MovieAllInterface;
use App\Interfaces\Requests\Movie\MovieCreateInterface;
use App\Interfaces\Requests\Movie\MovieDeleteInterface;
use App\Interfaces\Requests\Movie\MovieInfoInterface;
use App\Interfaces\Requests\Movie\MovieUpdateInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface MovieInterface
{
    public function saveMovie(MovieCreateInterface $data): bool;

    public function getMovie(MovieInfoInterface $data): Model;

    public function getMovieList(MovieAllInterface $data): Collection;

    public function updateMovie(MovieUpdateInterface $data): bool;

    public function deleteMovie(MovieDeleteInterface $data): bool;
}