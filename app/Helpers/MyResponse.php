<?php

namespace App\Helpers;

class MyResponse
{
    public static function success($message, $data = null): \Illuminate\Http\JsonResponse
    {
//        if ( !is_null($data) ) {
//            $teqrypt = new Teqrypt();
//            $data = $teqrypt->encrypt(json_encode($data));
//            $data = $data['success'] === true ? $data['data'] : null;
//        }

        return response()->json([
            'success'   => true,
            'data'      => $data,
            'message'   => $message
        ]);
    }

    public static function failed($message, $data = null): \Illuminate\Http\JsonResponse
    {
//        if ( !is_null($data) ) {
//            $teqrypt = new Teqrypt();
//            $data = $teqrypt->encrypt(json_encode($data));
//            $data = $data['success'] === true ? $data['data'] : null;
//        }

        return response()->json([
            'success'   => false,
            'message'   => $message,
            'data'      => $data
        ]);
    }
}
