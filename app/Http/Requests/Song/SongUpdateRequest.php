<?php

namespace App\Http\Requests\Song;

use App\Http\Requests\BaseRequest;
use App\Interfaces\Requests\Song\SongUpdateInterface;

/**
 * App\Http\Requests\Song\SongUpdateRequest
 *
 * @property int $song_id
 * @property string $title
 * @property string $name_of_album
 * @property int $year
 * @property string $name_of_artist
 * @property string $release_date
 */
class SongUpdateRequest extends BaseRequest implements SongUpdateInterface
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'song_id' => 'required|numeric|exists:songs,id',
            'title'           => 'required|string|min:1|max:150',
            'name_of_album'   => 'required|string|min:1|max:150',
            'year'            => 'required|numeric|digits:4',
            'name_of_artist'  => 'required|string|min:1|max:100',
            'release_date'    => 'required|string|date_format:Y-m-d H:i:s'
        ];
    }

    public function validationData(): array
    {

        $this->merge([
            'song_id' => $this->route('song')
        ]);

        return $this->all();
    }
    /**
     * @return array
     */
    public function toArray(): array
    {
        return parent::toArray();
    }

    public function getSongId(): int
    {
        return $this->song_id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getNameOfAlbum(): string
    {
        return $this->name_of_album;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function getNameOfArtist(): string
    {
        return $this->name_of_artist;
    }

    public function getReleaseDate(): string
    {
        return $this->release_date;
    }
}
