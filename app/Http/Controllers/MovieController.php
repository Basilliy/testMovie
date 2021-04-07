<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\MovieAllRequest;
use App\Http\Requests\Movie\MovieCreateRequest;
use App\Http\Requests\Movie\MovieDeleteRequest;
use App\Http\Requests\Movie\MovieInfoRequest;
use App\Http\Requests\Movie\MovieUpdateRequest;
use App\Services\Movie\MovieFacade;
use Illuminate\Http\JsonResponse;

class MovieController extends BaseController
{
    /**
     * @param MovieCreateRequest $request
     * @return JsonResponse
     */
    public function create(MovieCreateRequest $request): JsonResponse
    {
        return $this->success(['status' =>  MovieFacade::addMovie($request)]);
    }

    /**
     * @param MovieAllRequest $request
     * @return JsonResponse
     */
    public function all(MovieAllRequest $request): JsonResponse
    {
        return $this->success([MovieFacade::allMovies($request)]);
    }

    /**
     * @param MovieInfoRequest $request
     * @return JsonResponse
     */
    public function info(MovieInfoRequest $request): JsonResponse
    {
        return $this->success([MovieFacade::itemInfo($request)]);
    }

    /**
     * @param MovieDeleteRequest $request
     * @return JsonResponse
     */
    public function delete(MovieDeleteRequest $request): JsonResponse
    {
        return $this->success([MovieFacade::deleteItem($request)]);
    }

    /**
     * @param MovieUpdateRequest $request
     * @return JsonResponse
     */
    public function update(MovieUpdateRequest $request): JsonResponse
    {
        return $this->success([MovieFacade::updateItem($request)]);
    }
}
