<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Weather_Model extends CI_Model
{
    public function getWeatherData($latitude, $longitude)
    {
        $this->load->library('curl');
        $apiKey = '7fcbbc568e32c60f238cf245a332036e';

        if (isset($latitude, $longitude)) {
            $url = "https://api.openweathermap.org/data/2.5/weather?lat={$latitude}&lon={$longitude}&appid={$apiKey}&units=metric";
        } else {
            $url = "https://api.openweathermap.org/data/2.5/weather?lat=6.927079&lon=79.861244&appid=7fcbbc568e32c60f238cf245a332036e&units=metric";
        }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}
