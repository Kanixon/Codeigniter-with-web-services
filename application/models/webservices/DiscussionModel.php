<?php
class DiscussionModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('webservices/PushnotificationModel');
		$this->load->model('webservices/CommonFormate');
		error_reporting(-1);
	}
	function create_discussion($data)
	{ 
		 $user_id = $data['user_id'];
		 $user_data = $this->CommonFormate->getuserByID($user_id);
		  //print_r($user_data); die;
		  if(!empty($user_data))
		  {
			 $this->db->insert('user_discussion', $data);
			 $lastId 	= $this->db->insert_id();
			 
			 $this->db->select('*');
			 $this->db->from('user_discussion');
			 $this->db->where('discussion_id', $lastId);			
			 $query = $this->db->get();
			 return $statesData = $query->result_array();
		  }
		  else
		  {
			  return false;
		  }
	}
	function add_commentTo_discussion($data)
	{
		 $user_id 		= $data['userId'];
		 $discussionId 	= $data['discussionId'];
		 $comment_text 	= $data['comment_text'];
		 
		 $discOwners	= $this->CommonFormate->fetchDiscussionOwner($discussionId);
		 $user_data 	= $this->CommonFormate->getuserByID($user_id);
		 
		 $OwnersId 		= $discOwners[0]['userId'];
		 $dis_title 	= $discOwners[0]['discussion_title'];
		 $dis_text 		= $discOwners[0]['discussion_description'];
		 
			
		  if(!empty($user_data))
		  { 
			 $this->db->insert('discussion_comment', $data);
			 $lastId1 	= $this->db->insert_id();
			 
			 if($user_id == $OwnersId) // if OWNER do comment
			 {
				 $commentUser	= $this->CommonFormate->fetchAllCommentUser($discussionId,$OwnersId);
				 if(!empty($commentUser))
				 {
					 foreach($commentUser as $cUser) 
					{
					
					 $commenterName = $cUser['firstName'].' '.$user_data[0]['lastName'];
					 $message 		= $commenterName." has also commented on discussion.";
					 
					 $userData 		= array(
									 'text'			=>	$message,
									 'usersId'		=>	$cUser['userId'],
									 'dis_id'		=>	$discussionId,
									 'dis_title'	=>	$dis_title,
									 'dis_text'		=>	$dis_text
								  );
					 
					 $this->PushnotificationModel->send_notifications($cUser['userDeviceId'] ,$message,$userData);
					 
					 $InsData 		= array(
									 'text'			=>	$message,
									 'usersId'		=>	$cUser['userId'],
									 'noti_DisuId'	=>	$discussionId 
								  );
					 $this->db->insert('user_notification', $InsData);
					
					}
				 }
				
			 }
			 else  // if USER do comment
			 {
				 $commentUser	= $this->CommonFormate->fetchAllCommentUserOwner($discussionId,$user_id);
				 if(!empty($commentUser))
				 {
					 foreach($commentUser as $cUser) 
					 {
						
						 $commenterName = $cUser['firstName'].' '.$user_data[0]['lastName'];
						 $message 		= $commenterName." has commented on your discussion.";
						 $userData 		= array(
										 'text'			=>	$message,
										 'usersId'		=>	$cUser['userId'],
										 'dis_id'		=>	$discussionId,
										 'dis_title'	=>	$dis_title,
										 'dis_text'		=>	$dis_text
									  );
								  
									  
						 $this->PushnotificationModel->send_notifications($cUser['userDeviceId'] ,$message,$userData);
						 
						 $InsData 		= array(
										 'text'			=>	$message,
										 'usersId'		=>	$cUser['userId'],
										 'noti_DisuId'	=>	$discussionId 
									  );
						 $this->db->insert('user_notification', $InsData);
						 
					 }
				 }
			 }
			 
			 $this->db->select('*');
			 $this->db->from('discussion_comment');
			 $this->db->where('comment_id', $lastId1);			
			 $query = $this->db->get();
			 return $statesData = $query->result_array();
		  }
		  else
		  {
			  return false;
		  }
	}
	function fetch_discussion_Notification($data)
	{
		$user_data 	= $this->CommonFormate->getuserByID($data['usersId']);
		if(!empty($user_data))
		{
		$this->db->select('un.*,r.userId,r.firstName,r.lastName,r.userProfile,ud.discussion_title,ud.discussion_description');
			
			 $this->db->from('user_notification un');
			 $this->db->JOIN('userRegistration r','r.userId = un.usersId');
			 $this->db->JOIN('user_discussion ud','ud.discussion_id = un.noti_DisuId');

			 $this->db->where('usersId', $data['usersId']);			
			 $query = $this->db->get();
			 return $data = $query->result_array();
		}
		else
		{
			return false;
		}
		 
	}
	function delete_discussion_Notification($data)
	{
		 $this->db->where('notification_id', $data['notification_id']);	
		 $this->db->delete('user_notification');
		 return true;
	}
	function get_all_Discussion()
	{
		 $this->db->select('ud.*,r.firstName,r.lastName,r.userProfile');
		 $this->db->from('user_discussion ud');
		
		 $this->db->JOIN('userRegistration r','r.userId = ud.user_id');
		 $this->db->order_by("discussion_id", "desc");	
		 $query = $this->db->get();
		 $discussion = $query->result_array();
		 
		 foreach($discussion as $disc)
		 {
			 $comment_data = $this->CommonFormate->discussionONcomment($disc['discussion_id']);
			 //$comment_count = count($comment_data);
			 $disc['number_of_comment'] = count($comment_data);
			  $all[] = $disc;
		 }
		  //print_r($all);
		  return $all;
	}
	function fetch_all_DiscussionComment($data)
	{
		 $discussionId = $data['discussionId'];
		 
		 $this->db->select('dc.*,r.firstName,r.lastName,r.userProfile');
		 $this->db->from('discussion_comment dc');
		 $this->db->JOIN('userRegistration r','r.userId = dc.userId');
		 $this->db->order_by("comment_id", "desc");	
		 $this->db->where('discussionId', $discussionId);		
		 $query = $this->db->get();
		 return $query->result_array();
		 //print_r($comment);
	}
}