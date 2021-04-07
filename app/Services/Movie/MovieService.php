<?php

namespace App\Services\Movie;

use App\Http\Requests\Movie\MovieDeleteRequest;
use App\Interfaces\Repositories\MovieInterface;
use App\Interfaces\Requests\Movie\MovieAllInterface;
use App\Interfaces\Requests\Movie\MovieCreateInterface;
use App\Interfaces\Requests\Movie\MovieInfoInterface;
use App\Interfaces\Requests\Movie\MovieUpdateInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MovieService
{
    protected MovieInterface $repo;

    /**
     * MovieService constructor.
     * @param MovieInterface $repo
     */
    public function __construct(MovieInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param MovieCreateInterface $data
     * @return bool
     */
    public function addMovie(MovieCreateInterface $data): bool
    {
        return $this->repo->saveMovie($data);
    }

    /**
     * @param MovieAllInterface $data
     * @return Collection
     */
    public function allMovies(MovieAllInterface $data): Collection
    {
        return $this->repo->getMovieList($data);
    }

    /**
     * @param MovieInfoInterface $data
     * @return Model
     */
    public function itemInfo(MovieInfoInterface $data): Model
    {
        return $this->repo->getMovie($data);
    }

    /**
     * @param MovieDeleteRequest $data
     * @return bool
     */
    public function deleteItem(MovieDeleteRequest $data): bool
    {
        return $this->repo->deleteMovie($data);
    }

    /**
     * @param MovieUpdateInterface $data
     * @return bool
     */
    public function updateItem(MovieUpdateInterface $data): bool
    {
        return $this->repo->updateMovie($data);
    }
}