<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weather extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model("weather_model");
    }

    public function index()
    {
        $data = array();
        $data["weather"] = $this->weather_model->get_weather();
//		echo "<pre>";print_r($data["weather"]);exit;
        $users_js = $this->load->view('weather_js', '', true);
        $this->template->add_js($users_js, "view");
        $this->template->write('title', lang("menu_weather"));
        $this->template->write_view('content', 'weather_view', $data);
        $this->template->render();
    }


    function youtube($code = "1IdG-t22VmY")
    {
        $url = "http://keepvid.com/?url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D" . $code;
        $content = file_get_contents($url);

        $aUL = explode("</ul>", $content);
        $aLI = explode("</li>", $aUL[4]);

        // search หาใน tag
        preg_match("<a href=\"(.*?)\">", $aLI[1], $match);

//		echo "<pre>";print_r($match);exit();

//		header("Location: ".$match[1]);

        echo '<video width="320" height="240" controls>
                <source src="'.$match[1].'" type="video/mp4">
                    Your browser does not support the video tag.
            </video>';
    }


    public function mobile($mobile)
    {
        $url = "http://freecarrierlookup.com/getcarrier.php";
        $dataForm = "cc=66&phonenum=".substr($mobile, 1);
        $proxy = '221.4.169.82:8080';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataForm);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch); //
//        echo $response;exit;
        $data = explode("</tr>", $response);

        $content = trim(strip_tags($data[1]));
        $content = str_replace("Carrier: ", "", $content);

        echo $content;
    }
}
