<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends MY_Controller {

  	function __construct() {
    	parent::__construct();

        $this->load->model("users_model");
        $this->load->helper(array('form'));

        $this->load->library('form_validation');
	}
	public function index()
	{
		$this->template->write('title', lang("user_changepassword_title"));
		$this->template->write_view('content', 'user/change_password_view');
	    $this->template->render();
	}

	public function do_change()
	{

		$this->form_validation->set_rules('password', 'Password', 'trim');
		$this->form_validation->set_rules('passwordConfirm', 'Password', 'trim|matches[password]');

		if ($this->form_validation->run() !== FALSE)
        {
        	if($this->users_model->change_password($this->_aUser["username"]))
        	{
				$this->setNotification("success","Edit success");
				redirect($this->lang_code.'/user/change_password','refresh');
				exit;
			}
			else
			{
				$this->setNotification("error","Edit fail");
			}
			
        }

		$this->template->write('title', lang("user_changepassword_title"));
		$this->template->write_view('content', 'user/change_password_view');
	    $this->template->render();
	}
}
