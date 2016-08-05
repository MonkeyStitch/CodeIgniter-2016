<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

  	function __construct() {
    	parent::__construct();
        
        $this->load->model("users_model");
        $this->load->helper(array('form'));

        $this->load->library('form_validation');
	}
	public function index()
	{
		$this->template->write('title', lang("user_login_title"));
		$this->template->write_view('content', 'user/login_view');
	    $this->template->render();
	}
	public function do_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|callback_authenication');

		if ($this->form_validation->run() !== FALSE)
        {
			$this->setNotification("success","Login success");
			redirect($this->lang_code.'/home','refresh');
			exit;
			
        }
		$this->template->write('title', lang("user_login_title"));
		$this->template->write_view('content', 'user/login_view');
    	$this->template->render();
	}
	public function authenication()
	{
		$result=$this->users_model->check_login();
		if($result)
    	{
    		$sess_array = (array)$result[0];
			$this->session->set_userdata('logged_in',$sess_array);
			return true;
    	}
    	else
    	{
    		$this->form_validation->set_message('authenication', lang("user_authentication_usernamePasswordIncorrect"));
    		return false;
    	}
	}
}
