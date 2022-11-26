<?php

namespace App\Http\Controllers\Api;

use App\Helpers\MyResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function response($message, bool $success = true, mixed $data = null): JsonResponse
    {
        return $success ? MyResponse::success($message, $data) : MyResponse::failed($message, $data);
    }
}
