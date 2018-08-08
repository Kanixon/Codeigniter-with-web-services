<?php
	class UsersModel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function clienListing()
		{
			 $this->db->select('*');
			 $this->db->from('userRegistration ur');
			 $this->db->join('userProfession up', 'up.profId = ur.userProfession');
			 $this->db->order_by("userId", "Desc");			 
			 $query = $this->db->get();
			 return  $query->result_array();	
		}
		function userDelete($id)
		{
			 $this->db->where('userId',$id);
			 $this->db->delete('userRegistration');
			 return true;
		}
		function get_profession()
		{
			 $this->db->select('*');
			 $this->db->from('userProfession');	
			 $query = $this->db->get();
			 return  $query->result_array();
		}
		function edit_Client($id)
		{
			 $this->db->select('*');
			 $this->db->from('userRegistration');
			 $this->db->where('userId',$id);			 
			 $query = $this->db->get();
			 return  $query->result_array();	
		}
		function update_client_query($id,$data)
		{
			 $this->db->where('userId',$id);
			 $this->db->update('userRegistration',$data);
			 
			 $this->db->select('*');
			 $this->db->from('userRegistration');
			 $this->db->where('userId',$id);
			 $query = $this->db->get();
			 $result = $query->result_array();
			 return $result;
		}
		function userBlock($id)
		{
			 $this->db->from('userRegistration');
			 $this->db->where('userId',$id);
			 $query 	= $this->db->get();
			 $userData 	= $query->result_array();
			 $status 	= $userData[0]['is_Block'];
			//print_R($status);die;
			 if($status == "true")
			 {
			 	$data = array(
			 					 "is_Block" => "false"			//when admin is block login status false
			 				 );
			 	$this->db->where('userId', $id);
			 	$this->db->update('userRegistration', $data); 
			 	return "false";
			 }
			 else
			 {
			 	$this->db->from('userRegistration');
			 	$this->db->where('userId',$id);
			 	$query 	= $this->db->get();
			 	$data 	= $query->result_array();
			 	/* $message = 'Your account has been blocked by admin';
			 	$userData 		= array(
			 			'users_id' 	=> $data[0]['userId'],
			 			'type' 		=> 'Logout/Block',
			 			);
			 	$this->PushnotificationModel->userDeleteNotification($data[0]['device_id'], $message, $userData);*/
			 	$data = array(
			 					  "is_Block" => "true"
			 					// "is_login" => "false" 	
			 				 ); 
			 	$this->db->where('userId', $id);
			 	$this->db->update('userRegistration', $data);
			 	return "true";
			 }
		}
	}