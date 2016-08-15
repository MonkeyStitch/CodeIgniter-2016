<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("users_model");
        $this->load->helper(array('form'));

        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->template->write('title', lang("user_forgot_password_title"));
        $this->template->write_view('content', 'user/forgot_password_view');
        $this->template->render();
    }
    public function do_forgot()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');

        if ($this->form_validation->run() !== FALSE)
        {

            $result=$this->users_model->forgot_password();
            if($result)
            {
                $aUser=$this->users_model->check_username($this->input->post('username'));
                if(isset($aUser[0]))
                {
                    $user=(array)$aUser[0];
                    //echo "<pre>";print_r($user);exit;
                    # Call email lib
                    $this->load->library('email');

                    # Set email subject
                    $sEmailSubject = lang('webTitle').' : ' . lang('user_forgot_password_title');

                    //echo '<pre>';print_r($sEmailSubject);exit;

                    $this->email->clear(true);

                    $this->email->from('devcomsci29@gmail.com','STITCH');

                    $this->email->to($this->input->post('email'));

                    $this->email->subject($sEmailSubject);
                    $html=$this->load->view('user/forgot_password_email_view', $user, true);
                    $this->email->message($html);


                    $this->email->send();
//                    echo $this->email->print_debugger();exit;
                    //------End Send E-Mail-------
                    $this->setNotification("success","Send e-mail success");
                    redirect($this->lang_code.'/home','refresh');
                    exit;
                }
                else
                {
                    $this->setNotification("error","Email address is invalid");
                }
            }
            else
            {
                $this->setNotification("error","Don't have this username, please check username again.");
            }

        }
        else
        {
            $this->setNotification("error","Send e-mail fail");
        }
        $this->template->write('title', lang("user_forgot_password_title"));
        $this->template->write_view('content', 'user/forgot_password_view');
        $this->template->render();
    }
}
