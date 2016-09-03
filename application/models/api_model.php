<?php
class Api_model extends CI_Model {


        public function __construct()
        {
                parent::__construct();
        }

        public function check_secret_key($secret_key)
        {
                $data=$this->db->get_where('api_app', array("secret_key"=>$secret_key),1)->result();
                return $data;
        }
		
        public function insert_log($secret_key,$url,$method,$function,$param,$msg)
        {
				$data["secret_key"]=$secret_key;
				$data["url"]=$url;
				$data["method"]=$method;
				$data["function"]=$function;
				$data["msg"]=$msg;
				$data["param"]=$param;
				$data["transaction_date"]=date("Y-m-d H:i:s");

                $this->db->insert('api_log', $data);
                if($this->db->affected_rows() > 0)
                {
                        return true; 
                }
                else
                {
                        return false;
                }
        }

}