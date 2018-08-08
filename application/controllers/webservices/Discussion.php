<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Discussion extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('webservices/DiscussionModel');
			error_reporting(-1);
		}
		function index()
		{
			echo "Hello Discussion";
		}
		function create_discussion()
		{
			 $data = array(
						'user_id'       	 		 => $this->input->post('user_id') ,
						'discussion_title'       	 => $this->input->post('title') ,
						'discussion_description'     => $this->input->post('description') ,
					);
			 $query = $this->DiscussionModel->create_discussion($data);
			 if ($query)
			 {
				$result = array(
					'code' 		=> '201',
					'status'  	=> 'success',
					'message'  	=> "Created discussion successfully."
				);
				$data = array_merge($result, $query[0]);
				print_r(json_encode($data));
			 }
			else 
			{
				$result = array(
					'code' 		=> '200',
					'status'  	=> 'failure',
					'message'  	=> "user id not found."
				);
				print_r(json_encode($result));
			}
		}
		function add_commentTo_discussion()
		{
			 $data = array(
						'userId'       	 		 => $this->input->post('user_id') ,
						'discussionId'       	 => $this->input->post('discussion_id') ,
						'comment_text'     		 => $this->input->post('comment_text') ,
					);
			 $query = $this->DiscussionModel->add_commentTo_discussion($data);
			 if ($query)
			 {
				$result = array(
					'code' 		=> '201',
					'status'  	=> 'success',
					'message'  	=> "Comment added successfully."
				);
				$data = array_merge($result, $query[0]);
				print_r(json_encode($data));
			 }
			 else 
			 {
			 	$result = array(
			 		'code' 		=> '200',
			 		'status'  	=> 'failure',
			 		'message'  	=> "user id not found."
			 	);
			 	print_r(json_encode($result));
			 }
		}
		function fetch_discussion_Notification()
		{
			 $data = array(
						'usersId'       	 		 => $this->input->post('user_id') 
					);
			 $query = $this->DiscussionModel->fetch_discussion_Notification($data);
			  if ($query)
			  {
				$result = array(
					'code' 		=> '201',
					'status'  	=> 'success',
					'message'  	=> "Comment added successfully.",
					'data'		=> $query
				);
				//$data = array_merge($result, $query[0]);
				print_r(json_encode($result));
			 }
			 else 
			 {
			 	$result = array(
			 		'code' 		=> '200',
			 		'status'  	=> 'failure',
			 		'message'  	=> "user id not found."
			 	);
			 	print_r(json_encode($result));
			 }
		}

		function delete_discussion_Notification()
		{
			 $data = array(
						'notification_id'      => $this->input->post('notification_id') 
					);
			 $query = $this->DiscussionModel->delete_discussion_Notification($data);
			  if ($query)
			  {
				$result = array(
					'code' 		=> '201',
					'status'  	=> 'success',
					'message'  	=> "Notification deleted successfully."
				);
				//$data = array_merge($result, $query[0]);
				print_r(json_encode($result));
			 }
			 else 
			 {
			 	$result = array(
			 		'code' 		=> '200',
			 		'status'  	=> 'failure',
			 		'message'  	=> "Notification id not found."
			 	);
			 	print_r(json_encode($result));
			 }
		}
		function get_all_Discussion()
		{
			 $query = $this->DiscussionModel->get_all_Discussion();
			 if ($query)
			 {
				$result = array(
						'code' 		=> '201',
						'status'  	=> 'success',
						'message'  	=> "Discussion found successfully.",
						'data'		=> $query
					);
				//$data = array_merge($result, $query[0]);
				print_r(json_encode($result));
			 }
			 else 
			 {
			 	$result = array(
			 		'code' 		=> '200',
			 		'status'  	=> 'failure',
			 		'message'  	=> "Discussion not found."
			 	);
			 	print_r(json_encode($result));
			 }
		}
		function fetch_all_DiscussionComment()
		{
			  $data = array(
						'discussionId'       	 => $this->input->post('discussion_id')
				);
			 $query = $this->DiscussionModel->fetch_all_DiscussionComment($data);
			 if ($query)
			 {
				$result = array(
					'code' 		=> '201',
					'status'  	=> 'success',
					'message'  	=> "Comment found successfully.",
					'data'		=> $query
				);
				//$data = array_merge($result, $query[0]);
				print_r(json_encode($result));
			 }
			 else 
			 {
			 	$result = array(
			 		'code' 		=> '200',
			 		'status'  	=> 'failure',
			 		'message'  	=> "Discussion id not found."
			 	);
			 	print_r(json_encode($result));
			 }
		}
	}