<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Requests\Song\SongAllInterface;
use App\Interfaces\Requests\Song\SongCreateInterface;
use App\Interfaces\Requests\Song\SongDeleteInterface;
use App\Interfaces\Requests\Song\SongInfoInterface;
use App\Interfaces\Requests\Song\SongUpdateInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface SongInterface
{
    public function saveSong(SongCreateInterface $data): bool;

    public function getMovie(SongInfoInterface $data): Model;

    public function getMovieList(SongAllInterface $data): Collection;

    public function updateMovie(SongUpdateInterface $data): bool;

    public function deleteMovie(SongDeleteInterface $data): bool;
}