<?php

namespace App\Services\Song;

use App\Interfaces\Requests\Song\SongAllInterface;
use App\Interfaces\Requests\Song\SongCreateInterface;
use App\Interfaces\Requests\Song\SongDeleteInterface;
use App\Interfaces\Requests\Song\SongInfoInterface;
use App\Interfaces\Requests\Song\SongUpdateInterface;
use Illuminate\Support\Facades\Facade;

/**
 * App\Services\Song\SongFacade
 *
 * @method static addItem(SongCreateInterface $data)
 * @method static allSongs(SongAllInterface $data)
 * @method static itemInfo(SongInfoInterface $data)
 * @method static deleteItem(SongDeleteInterface $data)
 * @method static updateItem(SongUpdateInterface $data)
 */
class SongFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'songService'; }
}