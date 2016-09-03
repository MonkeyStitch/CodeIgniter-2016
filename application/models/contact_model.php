<?php

class contact_model extends MY_Model
{

    public $contact_id;
    public $student_id;
    public $first_name;
    public $last_name;
    public $mobile;
    public $mobile_network;
    public $email;
    public $topic;
    public $details;
    public $created_date;

    public function __construct(){
        parent::__construct();
    }

    public function insert_entry($data)
    {
        $this->student_id = $data['student_id'];
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->email = $data['email'];
        $this->mobile = $data['mobile'];
        $this->mobile_network = $data['mobile_camp'];
        $this->topic = $data['topic'];
        $this->details = $data['details'];
        $this->created_date = $data['created_date'];

        $this->db->insert('contact', $this);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_proxy()
    {
        $url = 'http://proxy.tekbreak.com/100/json';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'get');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }



    public function get_mobile_camp($mobile)
    {
//        return 'No Data';
        $url = "http://freecarrierlookup.com/getcarrier.php";
        $dataForm = "cc=66&phonenum=".substr($mobile, 1);
        $proxy = '101.200.169.110:80';

//        $proxyArr = $this->get_proxy();
//        $response = false;

//        $random = array_rand($proxyArr, 5);

//        foreach ($random as $key => $value) {
//            $proxy = $proxyArr[$value]['ip'].':'.$proxyArr[$value]['port'];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataForm);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

//        echo '<pre>';var_dump($response);exit;
            if (strpos($response, 'Carrier:') === false) {
                return 'No Data';
//                break;
            }
//        }


        $data = explode("</tr>", $response);
        $content = trim(strip_tags($data[1]));
        $content = str_replace("Carrier: ", "", $content);

        return $content;
    }

}