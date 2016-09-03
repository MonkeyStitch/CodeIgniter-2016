<?php
class Users_model extends CI_Model {

        public $username;
        public $password;
        public $permission;
        public $email;
        public $name;
        public $reset_code;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function check_login()
        {
                $this->username    = $this->input->post('username'); 
                $this->password  = sha1($this->input->post('password'));
                $data=$this->db->get_where('users', array("username"=>$this->username,"password"=>$this->password),1)->result();
                //echo "<pre>";print_r($data);exit;
                return $data;
        }

        public function check_username($username)
        {
                $data=$this->db->get_where('users', array("username"=>$username),1)->result();
                return $data;
        }

        public function get_last_ten_entries()
        {
                $query = $this->db->get('users', 10);
                return $query->result();
        }

        public function get_users($where="",$limit=0,$start=0)
        {       $this->db->select('*');
                $this->db->from('users');
                $this->db->order_by("username", "asc");
                $str_where="";
                if($where!="")
                {
                        $where=addslashes($where);
                        $str_where="username like '%$where%' or email like '%$where%' or permission like '%$where%' or name like '%$where%'";
                        $this->db->where($str_where);

                }
                if($limit>0)
                {
                        $this->db->limit($limit, $start);
                }
                $query = $this->db->get();
                $result["count"]=$this->get_count_users($str_where);
                $result["data"]=$query->result();
                //echo $str_where."<pre>";print_r($query);print_r($result);exit;
                return $result;
        }

        public function get_count_users($str_where="")
        {       $this->db->select('*');
                $this->db->from('users');
                $this->db->order_by("username", "asc");
                if($str_where!="")
                {
                        $this->db->where($str_where);
                }
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                return $rowcount;
        }

        public function insert_entry()
        {
                $this->username    = $this->input->post('username'); 
                $this->password  = sha1($this->input->post('password'));
                $this->permission     = $this->input->post('permission');
                if(!$this->permission || $this->_aUser["permission"]!="ADMIN")
                {
                        $this->permission  ="USER";
                }
                $this->email     = $this->input->post('email');
                $this->name     = $this->input->post('name');

                $this->db->insert('users', $this);
                if($this->db->affected_rows() > 0)
                {
                        // Code here after successful insert
                        return true; // to the controller
                }
                else
                {
                        return false;
                }
        }

        public function edit($username)
        {
                $password=$this->input->post('password');
                if($password)
                {
                        $data["password"]  = sha1($password);
                }
                $permission=$this->input->post('permission');
                if($permission)
                {
					$data["permission"]     = $permission;
				}
                $data["email"]     = $this->input->post('email');
                $data["name"]     = $this->input->post('name');

                $this->db->where('username',$username);
                $this->db->update('users', $data);
				
                if($this->db->affected_rows() > 0)
                {
                        // Code here after successful insert
                        return true; // to the controller
                }
                else
                {
                        return false;
                }
        }
        public function insert_param($data)
        {
                $this->username    = $data['username']; 
                $this->password    = ''; 
				$this->permission  ="USER";
                $this->email     = $data['email'];
                $this->name     = $data['name'];

                $this->db->insert('users', $this);
                if($this->db->affected_rows() > 0)
                {
                        // Code here after successful insert
                        return true; // to the controller
                }
                else
                {
                        return false;
                }
        }
        public function change_password($username)
        {
                $password=$this->input->post('password');
                if($password)
                {
                        $data["password"]  = sha1($password);
                }

                $this->db->where('username',$username);
                $this->db->update('users', $data);
                if($this->db->affected_rows() > 0)
                {
                        // Code here after successful insert
                        return true; // to the controller
                }
                else
                {
                        return false;
                }
        }

		public function forgot_password()
		{
                $this->username    = $this->input->post('username'); 
                $this->email  = $this->input->post('email');
                $aUser=$this->db->get_where('users', array("username"=>$this->username,"email"=>$this->email),1)->result();
				if(isset($aUser[0]))
				{
					$user=(array)$aUser[0];
					$reset_code=sha1(date("YmdHis").$this->username);

					$data["reset_code"]=$reset_code;
					$this->db->where('username',$this->username);
					$this->db->update('users', $data);
					if($this->db->affected_rows() > 0)
					{
							return true;
					}
					else
					{
							return false;
					}
				}
				else
				{
					return false;
				}
                //echo "<pre>";print_r($data);exit;
		}

        public function get_json_users($username)
        {       $this->db->select('username,name,email');
                $this->db->from('users');
				if($username!="")
				{
					$this->db->where('username',$username);
				}
                $this->db->order_by("username", "asc");
                
                $query = $this->db->get();
                $result=$query->result();
                return json_encode($result);
        }

        public function insert_from_api($data)
        {
                $this->db->insert('users', $data);
                if($this->db->affected_rows() > 0)
                {
                        return true; 
                }
                else
                {
                        return false;
                }
        }
		public function edit_from_api($username,$data)
        {
                $this->db->where('username',$username);
                $this->db->update('users', $data);
				
                if($this->db->affected_rows() > 0)
                {
                        return true;
                }
                else
                {
                        return false;
                }
        }

        public function delete($username)
        {
			$this -> db -> where('username', $username);
			$this -> db -> delete('users');
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