<?php

namespace App\Traits;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * ApiResponser
 */
trait ApiResponser
{
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    private function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    private function showAll(Collection $collection, $code = 200)
    {
        return response()->json(['data' => $collection], $code);
    }

    private function showOne(Model $model, $code = 200)
    {
        return response()->json(['data' => $model], $code);
    }
}
