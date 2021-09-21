<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function responseJson($data, string $message = '', int $status = 200): JsonResponse
    {
        return Response::json(compact('data', 'message'), $status);
    }

    function responseMessage(string $message, int $status = 200): JsonResponse
    {
        return Response::json(compact('message'), $status);
    }

    function responseData($data, int $status = 200): JsonResponse
    {
        return Response::json(compact('data'), $status);
    }

}
