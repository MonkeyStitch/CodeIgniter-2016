<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        
    }
    
    
    public function index(){
//        print_r($this);exit;
        $this->template->write('title', lang("menu_blog"));
        $this->template->write_view('content', 'blog/index_view');
        $this->template->render();
    }


    public function create()
    {
        echo 'create';
    }

}