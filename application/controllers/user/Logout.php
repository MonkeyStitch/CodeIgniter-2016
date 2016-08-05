<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

    function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $this->session->unset_userdata('logged_in');
        $this->setNotification("success","Logout success");
        redirect($this->lang_code.'/home','refresh');
        exit;
    }
}