<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function success($data): JsonResponse
    {
        return response()->json([
            'data' => $data,
        ], 200);
    }
}
