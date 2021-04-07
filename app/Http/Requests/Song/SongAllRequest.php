<?php

namespace App\Http\Requests\Song;

use App\Http\Requests\BaseRequest;
use App\Interfaces\Requests\Song\SongAllInterface;

class SongAllRequest extends BaseRequest implements SongAllInterface
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return parent::toArray();
    }
}
