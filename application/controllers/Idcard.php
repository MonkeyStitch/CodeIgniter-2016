<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Idcard extends MY_Controller {

  	function __construct() {
    	parent::__construct();

        $this->load->model("idcard_model");
	}
	public function index()
	{
		$data["data"]=array();
		$idcard=$this->input->get("idcard");
		$data["idcard"]="";
		if($idcard)
		{
			$data["idcard"]=$idcard;
			$data["result"]=$this->idcard_model->check_idcard($idcard);
		}
		$this->template->write('title', lang("menu_idcard"));
		$this->template->write_view('content', 'idcard_view',$data);
	    $this->template->render();
	}

	function check_id()
	{
		$data["data"]=array();
		$idcard=$this->input->get("idcard");
		$data["idcard"]="";
		if($idcard)
		{
			$data["idcard"]=$idcard;
			$data["result"]=$this->idcard_model->check_idcard2($idcard);
		}
		//echo "<pre>";print_r($data);exit;
		$this->template->write('title', lang("menu_idcard"));
		$this->template->write_view('content', 'idcard_view2',$data);
	    $this->template->render();
	}
}
