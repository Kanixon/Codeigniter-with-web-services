<?php
class CommonFormate extends CI_Model
	{
	function __construct()
	{
			parent::__construct();
			$this->load->model('webservices/PushnotificationModel');
			error_reporting(0);
	}
	function discussionONcomment($id)
	{
		 
		 $this->db->select('*');
		 $this->db->from('discussion_comment');
		 $this->db->where('discussionId', $id);			
		 $query = $this->db->get();
		 return $query->result_array();
	}
	function fetchDiscussionOwner($discussionId)
	{
		 $this->db->select('*');
		 $this->db->from('user_discussion ud');
		  $this->db->JOIN('userRegistration r','r.userId = ud.user_id');
		 $this->db->where('discussion_id', $discussionId);			
		 $query = $this->db->get();
		 return $query->result_array();
	}
	function fetchAllCommentUser($discussionId,$OwnersId)  // $OwnersId is Discusssion owner || user
	{ 
		 $query = $this->db->query("SELECT DISTINCT userId FROM discussion_comment where discussionId = '".$discussionId."' AND userId != '".$OwnersId."' ");
		 
		 $udata =  $query->result_array();
		 $relData = array();
		 foreach ($udata as  $user) {
			 
			 $udata		= $this->CommonFormate->getuserByID($user['userId']);
			 $relData[] = $udata[0];
		 }
		 if(!empty($relData))
		 {
			 return $relData;
		 }
		 else
		 {
			 return false;
		 }
	}
	
	function fetchAllCommentUserOwner($discussionId,$OwnersId)  // $OwnersId is Discusssion owner || user
	{ 
		 //$query = $this->db->query("SELECT DISTINCT userId FROM discussion_comment where discussionId = '".$discussionId."' AND userId != '".$OwnersId."' "); 
		 
		 $query = $this->db->query("SELECT DISTINCT userId FROM ( (SELECT userId FROM discussion_comment where discussionId = '".$discussionId."' AND userId != '".$OwnersId."')
UNION (SELECT user_id FROM user_discussion WHERE discussion_id ='".$discussionId."') )as tmp");
		 
		 $udata =  $query->result_array();
		 $relData = array();
		 foreach ($udata as  $user) {
			 
			 $udata		= $this->CommonFormate->getuserByID($user['userId']);
			 $relData[] = $udata[0];
		 }
		 if(!empty($relData))
		 {
			 return $relData;
		 }
		 else
		 {
			 return false;
		 }
		
	}
	
	
	
	
	function getStateData($id)
		{
				$this->db->select('*');
				$this->db->from('states');
				$this->db->where('country_id', $id);			
				$query = $this->db->get();
				$statesData = $query->result_array();
				foreach ($statesData as  $states) 
				{
					$StateData = $this->getCityData($states['id']);
					if($states['id'] ==$StateData[0]['state_id'])
					{
						$states['city']=$StateData;
					}
					else
					{
						$states['city']=[];
					}
					$realData[]=$states;
				}
				return $realData;
		}
	function getCityData($statesid)
		{
			$this->db->select('*');
			$this->db->from('cities');
			$this->db->where('state_id', $statesid);			
			$query = $this->db->get();
			return $query->result_array();
		}
	function getuserByEmail($email)
	{
		 $this->db->select('*');
		 $this->db->from('userRegistration');
		 $this->db->where('userEmail', $email);			
		 $query = $this->db->get();
		 return $query->result_array();
	}
	function checkuserLogin($email,$userPassword)
	{
		 $this->db->select('*');
		 $this->db->from('userRegistration');
		 $this->db->where('userEmail', $email);
		 $this->db->where('userPassword', $userPassword);
		 $query = $this->db->get();
		 return $query->result_array();
	}
	function getuserByID($user_id)
	{
			$this->db->select('*');
			$this->db->from('userRegistration');
			$this->db->where('userId', $user_id);			
			$query = $this->db->get();
			return $query->result_array();
	}
	function getAnswer($quesId)
		{
			$this->db->select('*');
			$this->db->from('quizAnswer');
			$this->db->where('quesIds', $quesId);			
			$query = $this->db->get();
			return $query->result_array();
		}
	function getQuizExplanation($quesId)
		{
			$this->db->select('*');
			$this->db->from('quizExplanation');
			$this->db->where('quesIds', $quesId);			
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>