<?php
class Weather_model extends CI_Model {


        public function __construct()
        {
                parent::__construct();
        }

        public function get_weather()
        {
			$url="http://data.tmd.go.th/api/WeatherToday/V1/?type=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response  = curl_exec($ch);
			$data=json_decode($response,true);
			curl_close($ch);
//			echo "<pre>";print_r($data);exit;
            return $data;
        }

}