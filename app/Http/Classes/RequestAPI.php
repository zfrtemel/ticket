<?php


namespace App\Http\Classes;


use GuzzleHttp\Client;

class RequestAPI
{

    public function request($method, $url, $data = [])
    {
        $client = new Client(
            [
                'base_uri' => " $url",
                'headers' => [
                    'Content-Type' => 'application/json;charset=UTF-8',
                    'Accept' => 'application/json'
                ],
            ]
        );
        $response = $client->request($method, $url, [
            'form_params' => $data
        ]);
        return $response->getBody();
        // $client->request($method, $url, [
        //     'form_params' => $data
        // ]);
    }
}
