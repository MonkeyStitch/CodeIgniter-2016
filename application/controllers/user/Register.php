<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("users_model");
        $this->load->helper(array('form', 'captcha'));

        $this->load->library('form_validation');

        /* Setup vals to pass into the create_captcha function */
        $vals = array(
            'img_path' => 'images/captcha/',
            'img_url' => base_url().'images/captcha/',
            'img_width' => '150',
            'img_height' => '50',
            'pool' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        );

        /* Generate the captcha */
        $this->captcha = create_captcha($vals);
    }
    public function index()
    {
        $data["username"]="";
        $data["name"]="";
        $data["email"]="";
        $data["mobile"]="";
        $data["address"]="";


        /* Store the captcha value (or 'word') in a session to retrieve later */
        $this->session->set_userdata('captchaWord', $this->captcha['word']);

        $data["captcha"]=$this->captcha;

        $this->template->write('title', lang("user_register_title"));
        $this->template->write_view('content', 'user/register_view',$data);
        $this->template->render();
    }
    public function do_register()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_check_username');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('passwordConfirm', 'Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('captcha', "Captcha", 'required|callback_check_captcha');

        if ($this->form_validation->run() !== FALSE)
        {
            if($this->users_model->insert_entry())
            {
                $this->setNotification("success","Register success");
                redirect($this->lang_code.'/user/login','refresh');
                exit;
            }
            else
            {
                $this->setNotification("error","Register fail");
            }

        }

        $data["username"]=$this->input->post("username");
        $data["name"]=$this->input->post("name");
        $data["email"]=$this->input->post("email");
        /* Store the captcha value (or 'word') in a session to retrieve later */
        $this->session->set_userdata('captchaWord', $this->captcha['word']);

        $data["captcha"]=$this->captcha;

        $this->template->write('title', lang("user_register_title"));
        $this->template->write_view('content', 'user/register_view',$data);
        $this->template->render();
    }
    public function check_username($username)
    {
        $result=$this->users_model->check_username($username);
        if(!$result)
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('check_username', sprintf(lang("user_register_usernameIsExist"),$username));
            return false;
        }
    }
    public function check_captcha($word)
    {
        $session_word = $this->session->userdata('captchaWord');
        if(strtoupper($word)==strtoupper($session_word))
        {
            /* Clear the session variable */
            $this->session->unset_userdata('captchaWord');
            return true;
        }
        else
        {
            $this->form_validation->set_message('check_captcha', lang("user_register_captchaInvalid"));
            return false;
        }
    }
    public function test_send_email()
    {
        # Call email lib
        $this->load->library('email');

        # Set email subject
        $sEmailSubject = 'Test';

        $this->email->clear(true);

        $this->email->from('pornpichai.thonkong@gmail.com','Pete');

        $this->email->to('pornpichai@redplanethotels.com');

        #Send CC to Creater Budget all time
        //$mail_bcc[0]='pornpichai@redplanethotels.com';
        //$this->email->bcc($mail_bcc);

        $this->email->subject($sEmailSubject);
        //$this->load->view('email_view', $data_email, true)
        $this->email->message("test test");


        $this->email->send();
        echo $this->email->print_debugger();
        //------End Send E-Mail-------
    }
}
