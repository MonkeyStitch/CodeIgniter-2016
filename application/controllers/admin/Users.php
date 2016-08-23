<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

  	function __construct() {
    	parent::__construct();

    	#check permission "ADMIN"
    	$this->check_admin();
        
        $this->load->model("users_model");
        $this->load->helper(array('form'));

        $this->load->library('form_validation');
		$this->_toplink["link"]=base_url($this->lang_code."/admin/users");
		$this->_toplink["text"]=lang("admin_user_index_title");

	}
	public function index()
	{
		$data=array();
		$users_js=$this->load->view('admin/users_js', '', true);
		$this->template->add_js($users_js,"view");
		$this->template->write('title', lang("admin_user_index_title"));
		$this->template->write_view('content', 'admin/users_view',$data);
	    $this->template->render();
	}
	public function edit($username)
	{
		$aUser=$this->users_model->check_username($username);
		$data=(array)$aUser[0];

		$data["_toplink"]=$this->_toplink;
		$this->template->write('title', sprintf(lang("admin_user_edit_title"),$username));
		$this->template->write_view('content', 'admin/users_edit_view',$data);
	    $this->template->render();
	}

	public function do_edit($username)
	{

		$this->form_validation->set_rules('password', 'Password', 'trim');
		$this->form_validation->set_rules('passwordConfirm', 'Password', 'trim|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');

		if ($this->form_validation->run() !== FALSE)
        {
        	if($this->users_model->edit($username))
        	{
				$this->setNotification("success","Edit success");
				redirect($this->lang_code.'/admin/users','refresh');
				exit;
			}
			else
			{
				$this->setNotification("error","Edit fail");
			}
			
        }

		$data["username"]=$username;
		$data["name"]=$this->input->post("name");
		$data["email"]=$this->input->post("email");
		$data["permission"]=$this->input->post("permission");

		$data["_toplink"]=$this->_toplink;
		$this->template->write('title', sprintf(lang("admin_user_edit_title"),$username));
		$this->template->write_view('content', 'admin/users_edit_view',$data);
    	$this->template->render();
	}
	
	
	
	
	public function delete($username){

		if($this->users_model->delete_user($username)){
			$this->setNotification("success","Delete success");
		} else {
			$this->setNotification("error","Delete fail");
		}
		redirect($this->lang_code.'/admin/users','refresh');
	}
	
	

	public function ajax_list_users()
	{
		//$limit=(isset($_GET["length"]))?$_GET["length"]:0;
		//$start=(isset($_GET["start"]))?($_GET["start"]):0;
		//$search=(isset($_GET["search"]["value"]))?sprintf("%s",$_GET["search"]["value"]):"";
		$limit=$this->input->get("length");
		$start=$this->input->get("start");
		$search=$this->input->get("search[value]");
		//echo "<pre>";print_r($_GET);exit;
		$users=$this->users_model->get_users($search,$limit,$start);

		if (isset($_GET["draw"])) {
			$result["draw"]= $_GET["draw"];
		}

		$result["recordsTotal"]=$users["count"];
		$result["recordsFiltered"]=$users["count"];
		$i=0;
		if(count($users["data"])>0)
		{
			foreach ($users["data"] as $key => $value) {
				$value=(array)$value;
				$result["data"][$i][]=$value["username"];
				$result["data"][$i][]=$value["permission"];
				$result["data"][$i][]=$value["name"];
				$result["data"][$i][]=$value["email"];
				$result["data"][$i][]=$value["mobile"];
				$result["data"][$i][]=$value["address"];
				$key=$value["username"];
				$result["data"][$i][]="<a class=\"btn btn-sm btn-primary\" href=\"javascript:void(0)\" title=\"Edit\" onclick=\"editData
('$key')\"><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>  <a class=\"btn btn-sm btn-danger
\" href=\"javascript:void(0)\" title=\"Delete\" onclick=\"deleteData('$key')\"><i class=\"glyphicon
 glyphicon-trash\"></i> Delete</a>";
				$i++;
			}
		}
		else
		{

			$result["data"][$i][]=lang("datatable_no_data");
			$result["data"][$i][]="";
			$result["data"][$i][]="";
			$result["data"][$i][]="";
			$result["data"][$i][]="";
		}

		echo json_encode($result);
	}
}
