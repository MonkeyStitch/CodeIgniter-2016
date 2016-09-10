<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller
{

    public function __construct()
    {
        // use construction
        parent::__construct();

        date_default_timezone_set("Asia/Bangkok");

        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        // load model contact
        $this->load->model('contact_model');
    }


    public function index()
    {
        // add plugin ckeditor
        $this->template->add_js("assets/ckeditor/ckeditor.js");
        $cke_js = $this->load->view('contact/cke_js', '', true);
        $this->template->add_js($cke_js,"view");

        $data = [
            'student_id' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'mobile' => '',
            'topic' => '',
            'details' => '',
        ];
        
        $this->template->write('title', lang('menu_contact'));
        $this->template->write_view('content', 'contact/contact_view', $data);
        $this->template->render();
    }

    public function do_contact()
    {
        if ($this->input->post('_checkForm') != 'true') {
            redirect($this->lang_code.'/contact','refresh');
        }

        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim');
        $this->form_validation->set_rules('details', 'Details', 'required');

        if ($this->form_validation->run() !== false) {
            $data = [
                'student_id' => $this->input->post('student_id'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'topic' => $this->input->post('topic'),
                'details' => $this->input->post('details'),
                'created_date' => date('Y-m-d H:i:s'),
            ];


            $data['mobile_camp'] = $this->contact_model->get_mobile_camp($data['mobile']);


            if($this->contact_model->insert_entry($data)){
//                echo '<pre>';var_dump($data); echo '</pre>';exit;
                # Call email lib
                $this->load->library('email');

                # Set email subject
                $sEmailSubject = lang('menu_contact').' : ' . $data['topic'];

                $this->email->clear(true);

                $this->email->from($data['email'], $data['first_name']);

//                $this->email->to('tisstyle.game1@gmail.com');
//                $this->email->to('stitch39@outlook.com');
                $this->email->to('thonkong@outlook.com,tisstyle.game1@gmail.com'); // mail P'pete

                $this->email->subject($sEmailSubject);
                $html=$this->load->view('contact/message_contact_view', $data, true);
                $this->email->message($html);


                $this->email->send();
//                echo $this->email->print_debugger();exit;
                //------End Send E-Mail-------

                $this->setNotification("success","Send Mail Success");
                redirect($this->lang_code.'/contact','refresh');
                exit;
            }
            else
            {
                $this->setNotification("error","Send Mail Fail");
            }
            
        }
    }

    public function get_api()
    {
        echo '<pre>';
        var_dump($this->contact_model->get_mobile_camp('0927591995'));
    }
}