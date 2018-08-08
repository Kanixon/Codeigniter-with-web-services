<?php
	class AuthModel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			// $this->load->model('admin/PushnotificationModel');
		}
		function login($email, $password)
		{
			$this->db->from('adminUser');
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$query = $this->db->get();
			$userData = $query->result_array();
			
			if(isset($userData[0]))
			{
				$this->session->set_userdata("admin_session", $userData);
			}
			return $userData;
		}
			
		function admin_profile()
		{
			$this->db->select('*');
			$this->db->from('adminUser');
			$this->db->where('id','1');
			$query = $this->db->get();
			return $data = $query->result_array();	
		}
		function admin_profile_update($data,$id)
		{
			 $this->db->where('id', $id);
			 $this->db->update('adminUser', $data);

     		$this->db->select('*');
			$this->db->from('adminUser');
			$this->db->where('id', $id);
			$query = $this->db->get();
			return $data = $query->result_array();	
				 
		}
		function change_password($data)
		{
		 $old_password = $data['old_password'];
		 $new_password = $data['new_password'];
		
			$this->db->select('*');
			$this->db->from('adminUser');
			$this->db->where('password', $old_password);
			$query = $this->db->get();
			$dataa = $query->result_array();	
			if(!empty($dataa))
			{
				$this->db->where('password', $old_password);
				$this->db->update('adminUser',  array(
													'password' => $new_password
												));
				return $dataa;
			}
			else
			{
				
				return false;
			}
		}

	}