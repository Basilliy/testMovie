<?php

namespace App\Services\Song;

use App\Interfaces\Repositories\SongInterface;
use App\Interfaces\Requests\Song\SongAllInterface;
use App\Interfaces\Requests\Song\SongCreateInterface;
use App\Interfaces\Requests\Song\SongDeleteInterface;
use App\Interfaces\Requests\Song\SongInfoInterface;
use App\Interfaces\Requests\Song\SongUpdateInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class SongService
{
    protected SongInterface $repo;

    /**
     * SongService constructor.
     * @param SongInterface $repo
     */
    public function __construct(SongInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param SongCreateInterface $data
     * @return bool
     */
    public function addItem(SongCreateInterface $data): bool
    {
        return $this->repo->saveSong($data);
    }

    /**
     * @param SongAllInterface $data
     * @return Collection
     */
    public function allSongs(SongAllInterface $data): Collection
    {
        return $this->repo->getMovieList($data);
    }

    /**
     * @param SongInfoInterface $data
     * @return Model
     */
    public function itemInfo(SongInfoInterface $data): Model
    {
        return $this->repo->getMovie($data);
    }

    /**
     * @param SongDeleteInterface $data
     * @return bool
     */
    public function deleteItem(SongDeleteInterface $data): bool
    {
        return $this->repo->deleteMovie($data);
    }

    /**
     * @param SongUpdateInterface $data
     * @return bool
     */
    public function updateItem(SongUpdateInterface $data): bool
    {
        return $this->repo->updateMovie($data);
    }


}