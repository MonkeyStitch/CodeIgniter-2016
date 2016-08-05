<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends MY_Controller {

	public function index()
	{
		$this->template->write('title', lang("menu_home"));
		$this->template->write_view('content', 'home_view');
	    $this->template->render();
	}
	public function err404()
	{
		$this->template->write('title', "Error 404");
		$data["message"]="Page not found.";

		$this->template->write_view('content', 'errors/new/error_404',$data);
	    $this->template->render();
	}
}
