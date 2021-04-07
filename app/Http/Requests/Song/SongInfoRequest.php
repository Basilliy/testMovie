<?php

namespace App\Http\Requests\Song;

use App\Http\Requests\BaseRequest;
use App\Interfaces\Requests\Song\SongInfoInterface;

/**
 * App\Http\Requests\Song\SongInfoRequest
 *
 * @property int $song_id
 */
class SongInfoRequest extends BaseRequest implements SongInfoInterface
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
}
