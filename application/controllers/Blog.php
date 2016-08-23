<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();

        #check permission "ADMIN"
        $this->check_admin();

        $this->load->model('posts_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'upload'));
    }
    
    
    public function index(){
//        print_r($this);exit;
        $this->template->write('title', lang("menu_blog"));
        $this->template->write_view('content', 'blog/index_view');
        $this->template->render();
    }


    public function create()
    {
        // add plugin ckeditor
        $this->template->add_js("assets/ckeditor/ckeditor.js");

        $cke_js=$this->load->view('blog/cke_js', '', true);
        $this->template->add_js($cke_js,"view");
        
        $this->template->write('title', lang("blog_add_blog"));
        $this->template->write_view('content', 'blog/create_view');
        $this->template->render();
    }

    public function do_create()
    {

        $config['upload_path']          = base_url().'/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100000;
//        $config['max_width']            = 1024;
//        $config['max_height']           = 768;
        $config['encrypt_name']         = TRUE;


        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('image_blog'))
        {
            $error = array('error' => $this->upload->display_errors());

            echo '<pre>';print_r($error);exit;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            echo '<pre>';print_r($data);exit;
            $this->load->view('errors/upload/upload_success', $data);
        }
        exit;

        $this->form_validation->set_rules('subject_blog', 'Subject Blog', 'required');
        $this->form_validation->set_rules('details_blog', 'Details Blog', 'required');

        if ($this->form_validation->run() !== FALSE)
        {
            if($this->posts_model->insert_post($this->_aUser['username'])){
                $this->setNotification("success","Register success");
                redirect($this->lang_code.'/blog/posts/','refresh');
                exit;
            }
        }
    }


}