<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

/*
* This controller contain basic or share method/variable use in project, any
* other module extended from this controller and this controller extended CI controller
*
* Example
*
* class Home extends MY_Controller {
*
* 		function ...()
* 		{
* 			...
* 		}
* }
*
*/

class MY_Controller extends CI_Controller {
  # Initial global param for application

  var $_aUser;
  var $_aLang=array(
                          "en"=>"english",
                          "th"=>"thai",
                      );
  var $lang_code;
  var $language;
  var $current_page;
  var $_menu;

  function __construct() {
    parent::__construct();

    $lang_code=strtolower($this->uri->segment(1));
    $language=$this->get_language($lang_code);
      
    if($language=="")
    {
        #Get Default Language form config.php
        $lang_code=$this->get_lang_code($this->config->item('language'));

        #Split link without lang
        $uri=explode("/",$this->uri->uri_string());
        unset($uri[0]);
        $uri_string=implode("/",$uri);

        redirect($lang_code."/".$uri_string,'refresh');
    }
    else
    {
        $this->lang->load('site_lang', $language);
        $this->lang_code = $lang_code;
        $this->language = $language;
    }

    #Load model
    //$this->load->model('main/main_model');
    #check login session
    $this->_aUser = $this->session->userdata("logged_in");
    
  }

  function get_lang_code($language)
  {
      $lang_code=(array_search($language,$this->_aLang,true)!==false)?array_search($language,$this->_aLang,true):"";
      return $lang_code;
  }

  function get_language($lang_code)
  {
      $language=(isset($this->_aLang[$lang_code]))?$this->_aLang[$lang_code]:"";
      return $language;
  }

  function setNotification($sNotificationType, $sNotificationMessage = '')
  {
    # Set messgae
    $aNotification['type'] 	  =  trim($sNotificationType);
    $aNotification['message'] =  trim($sNotificationMessage);

    # Store in session
    $this->session->set_userdata('notification', $aNotification);
  }

  function check_admin()
  {
    if($this->_aUser["permission"]!="ADMIN")
    {
      $this->setNotification("error","Access denied.");
      redirect($this->lang_code,'refresh');
      exit;
    }
  }
}

/* End of file Module_Controller.php */
/* Location: ./application/libraries/Module_Controller.php */
