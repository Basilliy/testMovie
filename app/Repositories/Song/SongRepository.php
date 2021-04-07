<?php

namespace App\Repositories\Song;

use App\Interfaces\Repositories\SongInterface;
use App\Interfaces\Requests\Song\SongAllInterface;
use App\Interfaces\Requests\Song\SongCreateInterface;
use App\Interfaces\Requests\Song\SongDeleteInterface;
use App\Interfaces\Requests\Song\SongInfoInterface;
use App\Interfaces\Requests\Song\SongUpdateInterface;
use App\Models\Song;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class SongRepository implements SongInterface
{
    protected Song $model;

    public function __construct(Song $song)
    {
        $this->model = $song;
    }
    public function saveSong(SongCreateInterface $data): bool
    {
        try {
            $this->model->create([
                'title'             => $data->getTitle(),
                'name_of_album'     => $data->getNameOfAlbum(),
                'year'              => $data->getYear(),
                'name_of_artist'    => $data->getNameOfArtist(),
                'release_date'      => $data->getReleaseDate()
            ]);

            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function getMovie(SongInfoInterface $data): Model
    {
        return $this->model->find($data->getSongId());
    }

    public function getMovieList(SongAllInterface $data): Collection
    {
        return $this->model->get();
    }

    public function updateMovie(SongUpdateInterface $data): bool
    {
        return $this->model
            ->where('id', $data->getSongId())
            ->update([
                'title'             => $data->getTitle(),
                'name_of_album'     => $data->getNameOfAlbum(),
                'year'              => $data->getYear(),
                'name_of_artist'    => $data->getNameOfArtist(),
                'release_date'      => $data->getReleaseDate()
            ]);
    }

    public function deleteMovie(SongDeleteInterface $data): bool
    {
        return $this->model
            ->where('id', $data->getSongId())
            ->delete();
    }
}