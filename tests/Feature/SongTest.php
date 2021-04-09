<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Factories\SongFactory;
use Tests\TestCase;

class SongTest extends TestCase
{
    use DatabaseTransactions;

    public function testSongList()
    {
        SongFactory::new()->createMany(10);

        $response = $this->json('GET', route('song.all'));

        $response->assertStatus(200);

        $this->assertEquals(true, !empty($response->json()['data']));
    }

    public function testSongInfo()
    {
        $song = SongFactory::new()->create();

        $response = $this->json('GET', route('song.info', ['song' => $song->id]));

        $response->assertStatus(200);

        $this->assertEquals(true, $response->json()['data']['id'] === $song->id);
    }

    public function testSongAdd()
    {
        $response = $this->json('POST', route('song.add'), [
            'title'             => 'song title',
            'name_of_album'     => 'new album',
            'year'              => 1990,
            'name_of_artist'    => 'mike',
            'release_date'      => '2020-01-01 20:20:20'
        ]);

        $response->assertStatus(200);

        $this->assertEquals(true, $response->json()['data']['status']);
    }

    public function testMovieUpdate()
    {
        $song = SongFactory::new()->create();

        $response = $this->json('PUT', route('song.update', ['song' => $song->id]), [
            'title'             => 'new song title',
            'name_of_album'     => 'new album',
            'year'              => 1990,
            'name_of_artist'    => 'mike',
            'release_date'      => '2020-01-01 20:20:20'
        ]);

        $response->assertStatus(200);

        $this->assertEquals(true, $response->json()['data']['status']);
    }

    public function testMovieDelete()
    {
        $song = SongFactory::new()->create();

        $response = $this->json('DELETE', route('song.delete', ['song' => $song->id]));

        $response->assertStatus(200);

        $this->assertEquals(true, $response->json()['data']['status']);
    }
}
