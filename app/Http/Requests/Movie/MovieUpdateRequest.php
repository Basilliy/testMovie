<?php

namespace App\Http\Requests\Movie;

use App\Http\Requests\BaseRequest;
use App\Interfaces\Requests\Movie\MovieUpdateInterface;

/**
 * App\Http\Requests\Movie\MovieUpdateRequest
 *
 * @property int $movie_id
 * @property string $title
 * @property string $description
 * @property int $year
 * @property string $name_of_director
 * @property string $release_date
 */
class MovieUpdateRequest extends BaseRequest implements MovieUpdateInterface
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'             => 'required|string|min:1|max:150',
            'description'       => 'required|string|min:1|max:300',
            'year'              => 'required|numeric|digits:4',
            'name_of_director'  => 'required|string|min:1|max:100',
            'release_date'      => 'required|string|date_format:Y-m-d H:i:s'
        ];
    }

    /**
     * @return array
     */
    public function validationData(): array
    {

        $this->merge([
            'movie_id' => $this->route('movie')
        ]);

        return $this->all();
    }

    /**
     * @return int
     */
    public function getMovieId(): int
    {
        return $this->movie_id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return (int) $this->year;
    }

    /**
     * @return string
     */
    public function getNameOfDirector(): string
    {
        return $this->name_of_director;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return parent::toArray();
    }
}
