<?php

namespace Tests\Factories;

use App\Models\Song;

class SongFactory extends AbstractTestFactory
{
    protected string $model = Song::class;

    protected function defaultFields(): array
    {
        return [
            'title'             => 'song title',
            'name_of_album'     => 'new album',
            'year'              => 1990,
            'name_of_artist'    => 'mike',
            'release_date'      => '2020-01-01 20:20:20'
        ];
    }
}
