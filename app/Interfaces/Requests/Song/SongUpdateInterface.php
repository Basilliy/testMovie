<?php

namespace App\Interfaces\Requests\Song;

interface SongUpdateInterface
{
    public function getSongId(): int;

    public function getTitle(): string;

    public function getNameOfAlbum(): string;

    public function getYear(): string;

    public function getNameOfArtist(): string;

    public function getReleaseDate(): string;
}