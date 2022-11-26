<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;

/**
 * Description of HttpClient
 *
 * @author Canaan Etai
 */
class HttpClient {

    static function send($headers, $httpMethod, $resourceUrl, $request) {
        $response = Array();

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if ($httpMethod == 'DELETE') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
        }

        if ($httpMethod == 'POST') {
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
        }

        if ($httpMethod == 'PUT') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $resourceUrl);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($curl, CURLINFO_HEADER_OUT, true);

        $curl_response = curl_exec($curl);
        $info = curl_getinfo($curl);

        if ($curl_response === false) {
            curl_close($curl);
            die('<br><br>error occured during curl exec. Additional info: ' . var_dump($info));
        }

//      $json = json_decode($curl_response, true);
        $response[Constants::HTTP_CODE] = $info['http_code'];
        $response[Constants::RESPONSE_BODY] = $curl_response;

        //print_r($response);
        curl_close($curl);

        return $response;
    }

}

