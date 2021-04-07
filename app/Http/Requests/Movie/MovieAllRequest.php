<?php

namespace App\Http\Requests\Movie;

use App\Http\Requests\BaseRequest;
use App\Interfaces\Requests\Movie\MovieAllInterface;

class MovieAllRequest extends BaseRequest implements MovieAllInterface
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
