<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Weather_Model extends CI_Model
{
    public function getWeatherData($latitude, $longitude)
    {
        $this->load->library('curl');

        $apiKey = '7fcbbc568e32c60f238cf245a332036e';
        $url = "https://api.openweathermap.org/data/2.5/weather?lat={$latitude}&lon={$longitude}&appid={$apiKey}";
        // $url = "https://api.openweathermap.org/data/2.5/weather?lat=7.291418&lon=80.636696&appid=7fcbbc568e32c60f238cf245a332036e";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        if ($response === false) {
            $error = curl_error($ch);
            echo 'Test2';
        }
        curl_close($ch);

        return json_decode($response, true);
    }
}
