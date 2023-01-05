<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $data
     * @return JsonResponse
     */
    public function successApiResponse($data = null): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    /**
     * @return JsonResponse
     */
    public function unauthorizedApiResponse(): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => 'Unauthorized',
        ], 401);
    }

    /**
     * @return JsonResponse
     */
    public function notFoundApiResponse(): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => 'Resource not found'
        ], 404);
    }
}
