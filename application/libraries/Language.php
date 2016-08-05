<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Language {
    public $arr_lang=array(
                            "en"=>"english",
                            "th"=>"thai",
                        );
    public $lang_code;
    public $language;
    function Language() {
        $CI =& get_instance();
        $lang_code=strtolower($CI->uri->segment(1));
        $language=$this->get_language($lang_code);
          
        if($language=="")
        {
            #Get Default Language form config.php
            $lang_code=$this->get_lang_code($CI->config->item('language'));

            #Split link without lang
            $uri=explode("/",$CI->uri->uri_string());
            unset($uri[0]);
            $uri_string=implode("/",$uri);

            redirect($lang_code."/".$uri_string,'refresh');
        }
        else
        {
            $CI->lang->load('site_lang', $language);
            $this->lang_code = $lang_code;
            $this->language = $language;
        }
    }

    function get_lang_code($language)
    {
        $lang_code=(array_search($language,$this->arr_lang,true)!==false)?array_search($language,$this->arr_lang,true):"";
        return $lang_code;
    }

    function get_language($lang_code)
    {
        $language=(isset($this->arr_lang[$lang_code]))?$this->arr_lang[$lang_code]:"";
        return $language;
    }

}
