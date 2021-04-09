<?php

namespace App\Http\Controllers;

use App\Http\Requests\Song\SongAllRequest;
use App\Http\Requests\Song\SongCreateRequest;
use App\Http\Requests\Song\SongDeleteRequest;
use App\Http\Requests\Song\SongInfoRequest;
use App\Http\Requests\Song\SongUpdateRequest;
use App\Services\Song\SongFacade;
use Illuminate\Http\JsonResponse;

class SongController extends BaseController
{

    public function create(SongCreateRequest $request): JsonResponse
    {
        return $this->success(['status' =>  SongFacade::addItem($request)]);
    }

    public function all(SongAllRequest $request): JsonResponse
    {
        return $this->success(SongFacade::allSongs($request));
    }

    public function info(SongInfoRequest $request): JsonResponse
    {
        return $this->success(SongFacade::itemInfo($request));
    }

    public function delete(SongDeleteRequest $request): JsonResponse
    {
        return $this->success(['status' =>  SongFacade::deleteItem($request)]);
    }

    public function update(SongUpdateRequest $request): JsonResponse
    {
        return $this->success(['status' =>  SongFacade::updateItem($request)]);
    }
}
