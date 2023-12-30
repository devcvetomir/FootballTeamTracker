<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ApiResponseController extends BaseController
{
    protected function successResponse($data, $message = '', $status = 200, $headers = [])
    {

        $response = [
            'status' => $status,
            $response['message'] = $message,
            $response['data'] = $data,
            'debugBag' => $this->getMetaData(),

        ];


        return response()->json($response, $status, $headers);
    }


    public function errorResponse($message = 'Error', $status = 500, $error = null)
    {
        return response()->json([
            'status' => 500,
            'message' => $message,
            'error' => $error,
            'debugBag' => $this->getMetaData(),
        ], $status);
    }



    private function getMetaData()
    {
        return [
            'request_url' => request()->url(),
            'params' => request()->all(),
            'host' => request()->header('Host'),
            'referrer' => request()->header('Referer'),
            'user_agent' => request()->header('User-Agent'),
        ];
    }




}
