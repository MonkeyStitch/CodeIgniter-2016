<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends MY_Controller {

  	function __construct() {
    	parent::__construct();
        
        $this->load->model("users_model");
        $this->load->helper(array('form'));

        $this->load->library('form_validation');
	}
	public function index($username,$reset_code)
	{
		$aUser=$this->users_model->check_username($username);
		if(!isset($aUser[0]))
		{

			$this->setNotification("error","Don't have this username, please check username again.");
			redirect($this->lang_code.'/home','refresh');
			exit;
		}
		$user=(array)$aUser[0];
		//echo "<pre>";print_r($user);exit;
		if($reset_code!=$user["reset_code"])
		{
			$this->setNotification("error","Reset code is invalid");
			redirect($this->lang_code.'/home','refresh');
			exit;
		}
		$data["username"]=$username;
		$data["reset_code"]=$reset_code;
		$this->template->write('title', lang("user_reset_password_title"));
		$this->template->write_view('content', 'user/reset_password_view',$data);
	    $this->template->render();
	}

	public function do_change($username,$reset_code)
	{

		$aUser=$this->users_model->check_username($username);
		$user=(array)$aUser[0];
		if($reset_code!=$user["reset_code"])
		{
			$this->setNotification("error","Reset code is invalid");
			redirect($this->lang_code.'/home','refresh');
			exit;
		}

		$this->form_validation->set_rules('password', 'Password', 'trim');
		$this->form_validation->set_rules('passwordConfirm', 'Password', 'trim|matches[password]');

		if ($this->form_validation->run() !== FALSE)
        {
        	if($this->users_model->change_password($username))
        	{
				$this->setNotification("success","Reset success");
				redirect($this->lang_code.'/user/login','refresh');
				exit;
			}
			else
			{
				$this->setNotification("error","Reset fail");
			}
			
        }

		$this->template->write('title', lang("user_changepassword_title"));
		$this->template->write_view('content', 'user/change_password_view');
	    $this->template->render();
	}
}
