<?php

namespace App\Http\Controllers\Api\Transportation;

use App\Http\Controllers\Controller;
use App\Models\Transportation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransportationController extends Controller
{
    public function index()
    {
        return Transportation::all();
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'origins'      => 'required',
            'destinations' => 'required',
            'mass'         => 'required|int'
        ]);

        Transportation::create($data);

        return $this->responseMessage('all nice', Response::HTTP_CREATED);
    }

    public function show(Request $request, Transportation $transportation)
    {
        return $this->responseMessage("Cost of transportation is: " . $transportation->calculate() . " ruble");
    }
}
