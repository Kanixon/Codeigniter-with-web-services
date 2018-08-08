<?php
class UserPost extends CI_Controller 
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model('webservices/UserPostModel');
          $this->load->model('webservices/CommonFormat');
	 	 $this->load->helper(array('form', 'url'));
     
	 	 error_reporting(-1);
     }
	 function index()
	 {
	 	 echo "hello Travis";
	 }
	 
	  function add_post() //post added by seeker
	 {
		 $Image_name = array();
		 if(!empty($_FILES["post_image"]))
		 {
			 foreach($_FILES["post_image"]["tmp_name"] as $key=>$tmp_name)
			 {
				$file_name = $_FILES["post_image"]["name"][$key];
				$file_tmp  = $_FILES["post_image"]["tmp_name"][$key];
				$newFileName = time().$file_name;
				move_uploaded_file($file_tmp=$_FILES["post_image"]["tmp_name"][$key],"uploads/post/".$newFileName);
				$Image_name[] = 'post/'.$newFileName;
			 }
		 }
		 $postImage = array(
		 			'post_image' => $Image_name,		
		 ); 	 	 

		
	 	 $data = array(
				'post_userId'		=>$this->input->post('login_userId'),
				'post_category'		=>$this->input->post('post_category'),
				'post_title'		=>$this->input->post('post_title'),
				'post_description'	=>$this->input->post('post_description'),
				'post_price'		=>$this->input->post('post_price'),  
				'post_time'			=>$this->input->post('post_time'),
				'postImage'			=>$postImage,
				'nearbyuser'		=>$this->input->post('nearbyuser')
	 	 	); 

   		 $query 	= $this->UserPostModel->add_post($data);
	 	 if ($query)
	 	 {
	 	 	$result = array(
	 	 				'code' 		=> '201',
	 	 				'status'  	=> 'success',
	 	 				'message' 	=> "Post added sucessfully."
	 	 			);
	 	 	//$data = array_merge($result,$query[0]);
	 	 	print_r(json_encode($result));
	 	 }
	 	 else
	 	 {
	 	 	$result = array(
	 	 		'code' 		=> '200',
	 	 		'status'  	=> 'failure',
	 	 		'message' 	=> 'User not register/seeker'
	 	 	);
	 	 	print_r(json_encode($result));
	 	 }
	 }
	 
	 function fetch_NearByuser_toPost()
	 {
		 $data = array(
				'user_id'		=>$this->input->post('login_userId'),
				'user_lat'		=>$this->input->post('user_lat'),
				'user_long'		=>$this->input->post('user_long')
				);
		$query 	= $this->UserPostModel->fetch_NearByuser_toPost($data);
	 	 if ($query)
	 	 {
	 	 	$result = array(
	 	 				'code' 		=> '201',
	 	 				'status'  	=> 'success',
	 	 				'message' 	=> "Near by user found sucessfully.",
						'data'		=> $query
	 	 			);
	 	 	//$data = array_merge($result,$query[0]);
	 	 	print_r(json_encode($result));
	 	 }
	 	 else
	 	 {
	 	 	$result = array(
	 	 		'code' 		=> '200',
	 	 		'status'  	=> 'failure',
	 	 		'message' 	=> 'Near by user not found'
	 	 	);
	 	 	print_r(json_encode($result));
	 	 }
	 }
	 
	 function fetch_seekerPost()
	 {
		 $data = array(
				'user_id'		=>$this->input->post('login_userId')
				);
		 $query 	= $this->UserPostModel->fetch_seekerPost($data); //print_r($query);
		 if ($query == "post")
	 	 {
	 	 	$result = array(
	 	 				'code' 		=> '200',
	 	 				'status'  	=> 'failure',
	 	 				'message' 	=> "Post not found.",
						
	 	 			);
			print_r(json_encode($result));
	 	 }
		 else if($query)
		 {
			$result = array(
	 	 				'code' 		=> '201',
	 	 				'status'  	=> 'success',
	 	 				'message' 	=> "Post found sucessfully.",
						'data'		=> $query
	 	 			);
	 	 	//$data = array_merge($result,$query[0]);
	 	 	print_r(json_encode($result));
		 }
	 	 else
	 	 {
	 	 	$result = array(
	 	 		'code' 		=> '200',
	 	 		'status'  	=> 'failure',
	 	 		'message' 	=> "User id  not found.",
	 	 	);
	 	 	print_r(json_encode($result));
	 	 }
	 }
	 function fetch_seekerSingle_post()
	 {
		 $data = array(
				'user_id'		=>$this->input->post('login_userId'),
				'post_id'		=>$this->input->post('post_id')
				);
		 $query 	= $this->UserPostModel->fetch_seekerSingle_post($data); //print_r($query);
		 if ($query == "post")
	 	 {
	 	 	$result = array(
	 	 				'code' 		=> '200',
	 	 				'status'  	=> 'failure',
	 	 				'message' 	=> "Post not found.",
						
	 	 			);
			print_r(json_encode($result));
	 	 }
		 else if($query)
		 {
			$result = array(
	 	 				'code' 		=> '201',
	 	 				'status'  	=> 'success',
	 	 				'message' 	=> "Post found sucessfully.",
						'data'		=> $query
	 	 			);
	 	 	//$data = array_merge($result,$query[0]);
	 	 	print_r(json_encode($result));
		 }
	 	 else
	 	 {
	 	 	$result = array(
	 	 		'code' 		=> '200',
	 	 		'status'  	=> 'failure',
	 	 		'message' 	=> "User id  not found.",
	 	 	);
	 	 	print_r(json_encode($result));
	 	 }
	 }
	 
	 function fetchedInvitedUser()
	 {
		  $data = array(
				'post_id'		=>$this->input->post('post_id'),
				);
		 $query 	= $this->UserPostModel->fetchedInvitedUser($data); //print_r($query);
		 if ($query)
	 	 {
	 	 	$result = array(
	 	 				'code' 		=> '201',
	 	 				'status'  	=> 'success',
	 	 				'message' 	=> 'Inveted users found sucessfully.',
						'data'		=> $query
	 	 			);
	 	 	//$data = array_merge($result,$query[0]);
	 	 	print_r(json_encode($result));
	 	 }
	 	 else
	 	 {
	 	 	$result = array(
	 	 		'code' 		=> '200',
	 	 		'status'  	=> 'failure',
	 	 		'message' 	=> 'Post not found.'
				);
	 	 	print_r(json_encode($result));
	 	 }
	 }
	 
	 function DeletePost_bySeeker()
	 {
		$data = array(
				'post_id'		=>$this->input->post('post_id'),
		);
		 $query 	= $this->UserPostModel->DeletePost_bySeeker($data); //print_r($query);
		 if ($query)
	 	 {
	 	 	$result = array(
	 	 				'code' 		=> '201',
	 	 				'status'  	=> 'success',
	 	 				'message' 	=> 'Post deleted sucessfully.'
	 	 			);
	 	 	//$data = array_merge($result,$query[0]);
	 	 	print_r(json_encode($result));
	 	 }
	 	 else
	 	 {
	 	 	$result = array(
	 	 		'code' 		=> '200',
	 	 		'status'  	=> 'failure',
	 	 		'message' 	=> 'Post not found.'
				);
	 	 	print_r(json_encode($result));
	 	 }
	 }
	 function fetchAllSeekerQuotations()
	 {
		 $data = array(
				'post_userId'		=>$this->input->post('login_user_id'),
		);
		 $query 	= $this->UserPostModel->fetchAllSeekerQuotations($data); //print_r($query);
		 if ($query)
	 	 {
	 	 	$result = array(
	 	 				'code' 		=> '201',
	 	 				'status'  	=> 'success',
	 	 				'message' 	=> 'Quotations Found sucessfully.',
						'data'		=>$query
	 	 			);
	 	 	//$data = array_merge($result,$query[0]);
	 	 	print_r(json_encode($result));
	 	 }
	 	 else
	 	 {
	 	 	$result = array(
	 	 		'code' 		=> '200',
	 	 		'status'  	=> 'failure',
	 	 		'message' 	=> 'Quotations not found.'
				);
	 	 	print_r(json_encode($result));
	 	 }
	 }
	  function fetchSubmittedQuotation()	# for Service provider
	 {
		 $data = array(
		 		'quotation_userId'		=>$this->input->post('login_user_id'),
		 );
		 $query 	= $this->UserPostModel->fetchSubmittedQuotation($data);// print_r($query);
		 if ($query)
	 	 {
	 	 	$result = array(
	 	 				'code' 		=> '201',
	 	 				'status'  	=> 'success',
	 	 				'message' 	=> 'Quotations Found sucessfully.',
						'data'		=>$query
	 	 			);
	 	 	//$data = array_merge($result,$query[0]);
	 	 	print_r(json_encode($result));
	 	 }
	 	 else
	 	 {
	 	 	$result = array(
	 	 		'code' 		=> '200',
	 	 		'status'  	=> 'failure',
	 	 		'message' 	=> 'Quotations not found.'
				);
	 	 	print_r(json_encode($result));
	 	 }
	 }
	 
	 function acceptPostQuotation()
	 {
		 $data = array(
		 		'post_id'		=>$this->input->post('post_id'),
		 );
		 $query 	= $this->UserPostModel->acceptPostQuotation($data);// print_r($query);
		 if ($query)
	 	 {
	 	 	$result = array(
	 	 				'code' 		=> '201',
	 	 				'status'  	=> 'success',
	 	 				'message' 	=> 'Quotations Found sucessfully.',
						'data'		=>$query
	 	 			);
	 	 	//$data = array_merge($result,$query[0]);
	 	 	print_r(json_encode($result));
	 	 }
	 	 else
	 	 {
	 	 	$result = array(
	 	 		'code' 		=> '200',
	 	 		'status'  	=> 'failure',
	 	 		'message' 	=> 'Quotations not found.'
				);
	 	 	print_r(json_encode($result));
	 	 }
}
	 }