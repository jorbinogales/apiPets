<?php 

namespace App\Utils;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait ApiResponser
{
    protected function successfullResponse($code = CodeResponse::SUCCESSFUL, $httpCode = 200)
    {
        return response()->json(['code' => $code], $httpCode);
    }

    protected function errorResponse($code = CodeResponse::BAD_REQUEST, $httpStatus = 402)
    {
        return response()->json(['code' => $code], $httpStatus);
    }

    protected function showAll(AnonymousResourceCollection $collection)
    {
        return response()->json(['data' => $collection]);
    }

    protected function showOne(JsonResource $resource)
    {
        return response()->json(['data' => $resource]);
    }

    protected function showPaginated(ResourceCollection $collection)
    {
        return $collection;
    }
}