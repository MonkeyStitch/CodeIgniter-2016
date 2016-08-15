<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

  	function __construct() {
    	parent::__construct();

        $this->load->model("users_model");
        $this->load->helper(array('form'));

        $this->load->library('form_validation');
	}
	public function index()
	{
		$aUser=$this->users_model->check_username($this->_aUser["username"]);

//		echo '<pre>';
//		print_r($this->_aUser["username"]);
//		exit();

		$data=(array)$aUser[0];
		$this->template->write('title', lang('menu_profile'));
		$this->template->write_view('content', 'user/profile_view',$data);
	    $this->template->render();
	}

	public function do_edit()
	{

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');

		if ($this->form_validation->run() !== FALSE)
        {
        	if($this->users_model->edit($this->_aUser["username"]))
        	{
				$this->setNotification("success","Edit success");
				redirect($this->lang_code.'/user/profile','refresh');
				exit;
			}
			else
			{
				$this->setNotification("error","Edit fail");
			}
			
        }

		$data["username"]=$this->_aUser["username"];
		$data["name"]=$this->input->post("name");
		$data["email"]=$this->input->post("email");

		$this->template->write('title', lang("user_profile_title"));
		$this->template->write_view('content', 'user/profile_view',$data);
	    $this->template->render();
	}
}
