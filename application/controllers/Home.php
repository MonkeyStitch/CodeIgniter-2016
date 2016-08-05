<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$this->template->write('title', lang("menu_home"));
		$this->template->write_view('content', 'home_view');
	    $this->template->render();
	}
	function test()
	{
		$this->setNotification("success","OK");
		$aNotification = $this->session->userdata('notification');
		//print_r($aNotification);
		redirect('th/main','refresh');
	}
	function test2()
	{
		echo $this->input->input_stream("test");exit;
	}
}
