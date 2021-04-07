<?php

namespace App\Repositories\Movie;

use App\Interfaces\Repositories\MovieInterface;
use App\Interfaces\Requests\Movie\MovieAllInterface;
use App\Interfaces\Requests\Movie\MovieCreateInterface;
use App\Interfaces\Requests\Movie\MovieDeleteInterface;
use App\Interfaces\Requests\Movie\MovieInfoInterface;
use App\Interfaces\Requests\Movie\MovieUpdateInterface;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MovieRepository implements MovieInterface
{
    protected Movie $model;

    /**
     * MovieRepository constructor.
     * @param Movie $movie
     */
    public function __construct(Movie $movie)
    {
        $this->model = $movie;
    }

    /**
     * @param MovieCreateInterface $data
     * @return bool
     */
    public function saveMovie(MovieCreateInterface $data): bool
    {
        try {
            $this->model->create([
                'title'            => $data->getTitle(),
                'description'      => $data->getDescription(),
                'year'             => $data->getYear(),
                'name_of_director' => $data->getNameOfDirector(),
                'release_date'     => $data->getReleaseDate()
            ]);

            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    /**
     * @param MovieInfoInterface $data
     * @return Model
     */
    public function getMovie(MovieInfoInterface $data): Model
    {
        return $this->model->find($data->getMovieId());
    }

    /**
     * @param MovieAllInterface $data
     * @return Collection
     */
    public function getMovieList(MovieAllInterface $data): Collection
    {
        return $this->model->get();
    }

    /**
     * @param MovieUpdateInterface $data
     * @return bool
     */
    public function updateMovie(MovieUpdateInterface $data): bool
    {
        return $this->model
            ->where('id', $data->getMovieId())
            ->update([
                'title'            => $data->getTitle(),
                'description'      => $data->getDescription(),
                'year'             => $data->getYear(),
                'name_of_director' => $data->getNameOfDirector(),
                'release_date'     => $data->getReleaseDate()
        ]);
    }

    /**
     * @param MovieDeleteInterface $data
     * @return bool
     */
    public function deleteMovie(MovieDeleteInterface $data): bool
    {
        return $this->model
            ->where('id', $data->getMovieId())
            ->delete();
    }
}