<?php

namespace App\Http\Requests\Movie;

use App\Http\Requests\BaseRequest;
use App\Interfaces\Requests\Movie\MovieInfoInterface;

/**
 * App\Http\Requests\Movie\MovieInfoRequest
 *
 * @property int $movie_id
 */
class MovieInfoRequest extends BaseRequest implements MovieInfoInterface
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'movie_id' => 'required|numeric|exists:movies,id'
        ];
    }

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
     * @return array
     */
    public function toArray(): array
    {
        return parent::toArray();
    }
}
