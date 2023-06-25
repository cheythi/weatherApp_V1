<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Weather_Controller extends CI_Controller
{
    public function index()
    {
        $this->load->model('Weather_Model');
        $this->load->helper('url');

        $latitude  = $this->input->get('latitude');
        $longitude = $this->input->get('longitude');
        // $unit      = $this->input->get('unit');

        // if (!$latitude || !$longitude) 
        // {
        //     echo 'test';
        //     return;
        // }

        $weather = $this->Weather_Model->getWeatherData($latitude, $longitude);

        $data['weather'] = $weather;

        $this->load->view('header');
        $this->load->view('currentWeather_view', $data);
        $this->load->view('footer');

    }
    
}

