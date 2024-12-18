<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
    private $api_url = "http://localhost:8080/api";

    public function login($data)
    {
        $response = $this->call_api('POST', '/auth/login', $data);
        return json_decode($response, true);
    }

    private function call_api($method, $endpoint, $data = null)
    {
        $url = $this->api_url . $endpoint;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set HTTP method
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        // Add data for POST/PUT
        if ($method == 'POST' || $method == 'PUT') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data))
            ]);
        }

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
