<?php

namespace App\Http\Requests\Song;

use App\Http\Requests\BaseRequest;
use App\Interfaces\Requests\Song\SongDeleteInterface;

/**
 * App\Http\Requests\Song\SongDeleteRequest
 *
 * @property int $song_id
 */
class SongDeleteRequest extends BaseRequest implements SongDeleteInterface
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'song_id' => 'required|numeric|exists:songs,id'
        ];
    }

    public function validationData(): array
    {

        $this->merge([
            'song_id' => $this->route('song')
        ]);

        return $this->all();
    }

    public function getSongId(): int
    {
        return $this->song_id;
    }
}
