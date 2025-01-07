<?php

class Dischub {
    private $api_url;

    public function __construct() {
        $this->api_url = "https://dischub.co.zw/api/orders/create/";
    }

    public function createPayment($data) {
        $ch = curl_init($this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return [
            'status_code' => $http_code,
            'response' => json_decode($response, true)
        ];
    }
}