<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Factories\MovieFactory;
use Tests\TestCase;

class MovieTest extends TestCase
{
    use DatabaseTransactions;

    public function testMovieList()
    {
        MovieFactory::new()->createMany(10);

        $response = $this->json('GET', route('movie.all'));

        $response->assertStatus(200);

        $this->assertEquals(true, !empty($response->json()['data']));
    }

    public function testMovieInfo()
    {
        $movie = MovieFactory::new()->create();

        $response = $this->json('GET', route('movie.info', ['movie' => $movie->id]));

        $response->assertStatus(200);

        $this->assertEquals(true, $response->json()['data']['id'] === $movie->id);
    }

    public function testMovieAdd()
    {
        $response = $this->json('POST', route('movie.add'), [
            'title'             => 'test title',
            'description'       => 'description',
            'year'              => 1111,
            'name_of_director'  => 'name',
            'release_date'      => '2020-01-01 20:20:20',
        ]);

        $response->assertStatus(200);

        $this->assertEquals(true, $response->json()['data']['status']);
    }

    public function testMovieUpdate()
    {
        $movie = MovieFactory::new()->create();

        $response = $this->json('PUT', route('movie.update', ['movie' => $movie->id]), [
            'title'             => 'test title new set',
            'description'       => 'description',
            'year'              => 1111,
            'name_of_director'  => 'name',
            'release_date'      => '2020-01-01 20:20:20',
        ]);

        $response->assertStatus(200);

        $this->assertEquals(true, $response->json()['data']['status']);
    }

    public function testMovieDelete()
    {
        $movie = MovieFactory::new()->create();

        $response = $this->json('DELETE', route('movie.delete', ['movie' => $movie->id]));

        $response->assertStatus(200);

        $this->assertEquals(true, $response->json()['data']['status']);
    }
}
