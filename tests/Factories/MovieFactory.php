<?php

namespace Tests\Factories;

use App\Models\Movie;

class MovieFactory extends AbstractTestFactory
{
    protected string $model = Movie::class;

    protected function defaultFields(): array
    {
        return [
            'title'             => 'test title',
            'description'       => 'test description',
            'year'              => 1111,
            'name_of_director'  => 'test name of director',
            'release_date'      => '2020-01-01 20:20:20'
        ];
    }
}