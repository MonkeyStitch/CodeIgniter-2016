<?php

class Posts_model extends MY_Model {

    public $post_id;
    public $username;
    public $subject;
    public $details;
    public $date_time;
    public $picture;


    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function insert_post($username, $path_file){

//        echo '<pre>';print_r($path_file);exit;
        $this->username = $username;
        $this->subject = $this->input->post('subject_blog');
        $this->details = $this->input->post('details_blog');
        $this->picture = $path_file;
        $this->date_time = date('Y-m-d H:i:s');
        
        $this->db->insert('posts', $this);

        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}