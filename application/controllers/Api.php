<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

  	function __construct() {
    	parent::__construct();


        $this->load->model("users_model");
        $this->load->model("api_model");

		$this->method=strtolower($_SERVER['REQUEST_METHOD']);

		$this->url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		
		$this->secret_key=$this->input->get("api_key");
		$app_data=$this->api_model->check_secret_key($this->secret_key);
		#check secert key
		if(!isset($app_data[0]))
		{
			$result["result"]="error";
			$result["msg"]="Secert key is not exist.";

			#save log
			$function=__FUNCTION__;
			$param=json_encode($this->input->input_stream());
			$msg=$result["result"]."|".$result["msg"];
			$this->api_model->insert_log($this->secret_key,$this->url,$this->method,$function,$param,$msg);

			echo json_encode($result);
			exit();
		}

	}
	public function users($username="")
	{
		if($this->method=="get")
		{
			$users=$this->users_model->get_json_users($username);
			$result["result"]="success";
			$result["data"]=json_decode($users,true);

			#save log
			$function=__FUNCTION__;
			$param=json_encode($this->input->get());
			$msg="";
			$this->api_model->insert_log($this->secret_key,$this->url,$this->method,$function,$param,$msg);

			echo json_encode($result);
		}
		else if($this->method=="post")
		{
			$data["username"]=$this->input->input_stream("username");
			$data["password"]=sha1($this->input->input_stream("password"));
			$data["name"]=$this->input->input_stream("name");
			$data["email"]=$this->input->input_stream("email");
			$result["result"]="error";
			
			$aUser=$this->users_model->check_username($data["username"]);
			if(!isset($aUser[0]))
			{
				if($this->users_model->insert_from_api($data))
				{
					$result["result"]="success";
				}
			}

			#save log
			$function=__FUNCTION__;
			$param=json_encode($this->input->post());
			$msg=$result["result"];
			$this->api_model->insert_log($this->secret_key,$this->url,$this->method,$function,$param,$msg);

			echo json_encode($result);
		}
		else if($this->method=="put")
		{	
			if($username=="")
			{
				$username=$this->input->input_stream("username");
			}
			if($this->input->input_stream("password"))
			{
				$data["password"]=sha1($this->input->input_stream("password"));
			}
			$data["name"]=$this->input->input_stream("name");
			$data["email"]=$this->input->input_stream("email");
			$result["result"]="error";
			$aUser=$this->users_model->check_username($username);
			if(isset($aUser[0]) && $username==$aUser[0]->username)
			{
				if($this->users_model->edit_from_api($username,$data))
				{
					$result["result"]="success";
				}
			}

			#save log
			$function=__FUNCTION__;
			$param=json_encode($this->input->input_stream());
			$msg=$result["result"];
			$this->api_model->insert_log($this->secret_key,$this->url,$this->method,$function,$param,$msg);

			
			echo json_encode($result);
		}
		else if($this->method=="delete")
		{
			$result["result"]="error";
			if($username!="")
			{
				$aUser=$this->users_model->check_username($username);
				if(isset($aUser[0]) && $username==$aUser[0]->username)
				{
					if($this->users_model->delete($username))
					{
						$result["result"]="success";
					}
				}
			}
			else
			{
				$result["msg"]="Username is empty.";
			}

			#save log
			$function=__FUNCTION__;
			$param=json_encode($this->input->input_stream());
			$msg=$result["result"];
			$this->api_model->insert_log($this->secret_key,$this->url,$this->method,$function,$param,$msg);

			
			echo json_encode($result);

		}
	}
}
