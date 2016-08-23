<?php

class Posts_model extends MY_Model {

    public $post_id;
    public $username;
    public $subject;
    public $details;
    public $date_time;


    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function insert_post($username){

        $this->username = $username;
        $this->subject = $this->input->post('subject_blog');
        $this->details = $this->input->post('details_blog');
        $this->date_time = now();
        
        $this->db->insert('');

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