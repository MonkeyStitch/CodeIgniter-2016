<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once dirname(__FILE__) . '/../../libraries/Facebook/autoload.php';

class Facebook extends MY_Controller {


	public function __construct() {
		parent::__construct();
		
        $this->load->model("users_model");
		
		$app_id='{app_id}';
		$app_secret='{app_secret}';
		$this->fb = new Facebook\Facebook([
		  'app_id' => $app_id, 
		  'app_secret' => $app_secret,
		  'default_graph_version' => 'v2.2',
		]);
	}

	public function index() {
		
		$helper = $this->fb->getRedirectLoginHelper();

		$permissions = ['email']; // Optional permissions
		$loginUrl = $helper->getLoginUrl(base_url($this->lang_code.'/user/facebook/callback'), $permissions);

		header("location:". ($loginUrl));
	}

	public function callback() {
		$helper = $this->fb->getRedirectLoginHelper();

		$accessToken = $helper->getAccessToken();

		$response = $this->fb->get('/me?fields=id,name,email', $accessToken);
		$user = $response->getGraphUser();

		$sess_array['fb_access_token'] = (string) $accessToken;
		$sess_array['username'] = 'fb@'.$user['id'];
		$sess_array['name'] = $user['name'];
		$sess_array['email'] = $user['email'];

		$aUser=$this->users_model->check_username($sess_array['username']);
		$user=(array)$aUser[0];
		if(!isset($user["username"]))
		{
			$this->users_model->insert_param($sess_array);
			$aUser=$this->users_model->check_username($sess_array['username']);
			$user=(array)$aUser[0];
		}
		$this->session->set_userdata('logged_in',$user);

		$this->setNotification("success","Login success");
		redirect($this->lang_code.'/home','refresh');
		exit;
	}

}