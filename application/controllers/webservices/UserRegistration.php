<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserRegistration extends CI_Controller
{
	function __construct()
	{
		 parent::__construct();
		 $this->load->model('webservices/UserRegistrationModel');
		 $this->load->model('webservices/CommonFormate');
		 error_reporting(0);
	}
	function index()
	{
		 echo "Manish Kumar Pathak";
	}
	function userRegistration()
	{
		$this->form_validation->set_rules('userEmail', 'UserEmail', 'required|is_unique[userRegistration.userEmail]');
		if ($this->form_validation->run() == FALSE)
			{
				$error 	= strip_tags(validation_errors());
				$result = array(
					'code' 		=> '200',
					'status' 	=> 'failure',
					'message' 	=> $error
				);
				print_r(json_encode($result));
			}
		  else
			{
				$config['upload_path'] 		= './uploads/customerImage/';
				$config['allowed_types'] 	= '*';
				$config['max_size'] 		= '0';
				$config['max_width'] 		= '10000';
				$config['max_height'] 		= '10000';
				$this->upload->initialize($config);
				$this->upload->do_upload('userProfile', $config);
				$upload_data = $this->upload->data();
				if ($upload_data['is_image'])
					{
						$custProfileImage = 'uploads/customerImage/' . $upload_data['file_name'];
					}
				  else
					{
						$custProfileImage = "uploads/main/noprifile.png";
					}
				$data = array(
					'firstName' 		=> $this->input->post('firstName') ,
					'lastName' 			=> $this->input->post('lastName') ,
					'userEmail' 		=> $this->input->post('userEmail') ,
					'userProfession' 	=> $this->input->post('userProfession') ,					
					'userPassword' 		=> $this->input->post('userPassword') ,
					'userProfile' 		=> $custProfileImage,
					'userDeviceId' 		=> $this->input->post('userDeviceId')
				);
				$query = $this->UserRegistrationModel->userRegistration($data);
				if ($query)
					{
						$result = array(
							'code' 		=> '201',
							'status' 	=> 'success',
							'message' 	=> "Register Successfully."
						);
						$data = array_merge($result, $query[0]);
						print_r(json_encode($data));
					}
				  else
					{
						$result = array(
							'code' 		=> '200',
							'status' 	=> 'failure',
							'message' 	=> "Email alresdy in used."
						);
						print_r(json_encode($result));
					}
			}
	}
	function userLogin()
	{
		$data = array(
			'userEmail' 	=> $this->input->post('userEmail') ,
			'userPassword' 	=> $this->input->post('userPassword') ,
			'userDeviceId' 	=> $this->input->post('userDeviceId')
		);
		$query = $this->UserRegistrationModel->userLogin($data);
		//print_r($query);
		if ($query == "block")
		{
			$result = array(
				'code' 		=> '200',
				'status' 	=> 'failure',
				'message' 	=>  "Sorry, your account has been Declined by the admin."
			);
			print_r(json_encode($result));
		}
		else if ($query)
		{
			$result = array(
					'code' 		=> '201',
					'status' 	=> 'success',
					'message' 	=> "Login Successfully."
					);
			$data = array_merge($result, $query[0]);
			print_r(json_encode($data));
		}
		else
		{
			$result = array(
				'code' 		=> '200',
				'status' 	=> 'failure',
				'message' 	=>  "Invalid Email or Password."
			);
			print_r(json_encode($result));
		}
	}
	function userForgotPassword()
	{
		$userEmail 			= $this->input->post('userEmail');
		$acceptableChars 	= "0123456789";
		$randomCode 		= "";
		for ($i = 0; $i < 6; $i++)
			{
				$randomCode.= substr($acceptableChars, rand(0, strlen($acceptableChars) - 1) , 1);
			}
		$code 				= $randomCode;
		$query 				= $this->UserRegistrationModel->userForgotPassword($userEmail, $code);
		if (empty($query))
			{
				$result = array(
					'code' 		=> '200',
					'status' 	=> 'failure',
					'message' 	=> 'Please Enter valid Email.'
				);
				print_r(json_encode($result));
			}
		  else
			{
				$userData 	= $this->CommonFormate->getuserByEmail($userEmail);
				
				    $firstName 	= $userData[0]['firstName'];
					 $lastName 	= $userData[0]['lastName'];
					 $userName = $firstName ." ".$lastName;
    
				$AppName 	= "testewb121@gmail.com";
				$body 		= '
				<html>
					<body style="background-color:#F4F4F4;">
						<table style="max-width:500px;min-width:500px;margin:0 auto;background-color:#fff;text-align:center;">
							<tr>
								<td style="color:#696969;font-family:open sans;font-size:14px;padding:7px 0;text-align:left;
								padding-left:20px;padding-right:20px;padding-top:40px;">
									Hi '.$userName.'
								</td>
							</tr>
							<tr>
								<td style="color:#696969;font-family:open sans;font-size:14px;padding:7px 0;
								text-align:left;padding-left:20px;padding-right:20px;line-height:24px;">
									You have requested the new password. Please enter the following OTP to reset password.
								</td>
							</tr>
							<tr>
								<td style="color:#696969;font-family:open sans;font-size:14px;padding:30px 0;
								text-align:left;padding-left:20px;padding-right:20px;">
									Please use this OTP for reset Password: ' . $code . '
								</td>
							</tr>
							<tr>
								<td style="color:#696969;font-family:open sans;font-size:14px;padding:0;
								text-align:left;padding-left:20px;padding-right:20px;">
									Regards
								</td>
							</tr>
							<tr>
								<td style="color:#23A8E0;font-family:open sans;font-size:14px;padding:0;
								text-align:left;padding-left:20px;padding-right:20px;padding-bottom:40px;">
									Quiz App
								</td>
							</tr>
						</table>
					</body>
				</html>';
				// >>>>>>>>>>>>>>Sending Mail<<<<<<<<<<<<
    
				$headers = "From: " . $AppName . " \r\n";
				$headers.= "MIME-Version: 1.0\r\n";
				$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$mail = @mail($userEmail, "Change Password", $body, $headers);
				if ($mail)
					{
						if ($query > 0)
							{
								$result = array(
									'code' 		=> '201',
									'status' 	=> 'success',
									'message' 	=> "Email sent successfully",
									'OTP Code' 	=> $code
								);
								print_r(json_encode($result));
							}
						  else
							{
								$result = array(
									'code' 		=> '200',
									'status' 	=> 'failure',
									'message' 	=> 'Please Enter valid Email/userName.'
								);
								print_r(json_encode($result));
							}
					}
				  else
					{
						$result = array(
							'code' 		=> '200',
							'status' 	=> 'failure',
							'message' 	=> 'Error in sending Email.'
						);
						print_r(json_encode($result));
					}
			}
	}
	function userChangePassword()
	{
		$data = array(
			'userId' 			=> $this->input->post('userId') ,
			'userOldPassword' 	=> $this->input->post('userOldPassword') ,
			'userNewpassword' 	=> $this->input->post('userNewpassword')
		);
		$query = $this->UserRegistrationModel->userChangePassword($data);
		if ($query)
			{
				$result = array(
					'code' 		=> '201',
					'status' 	=> 'success',
					'message' 	=> "Password have been Changed."
				);
				$data = array_merge($result, $query[0]);
				print_r(json_encode($data));
			}
		  else
			{
				$result = array(
					'code' 		=> '200',
					'status' 	=> 'failure',
					'message' 	=> "Invalid password you entered"
				);
				print_r(json_encode($result));
			}
	}
	function userEditProfile()
	{
		$config['upload_path'] 		= './uploads/customerImage/';
		$config['allowed_types'] 	= '*';
		$config['max_size'] 		= '0';
		$config['max_width'] 		= '10000';
		$config['max_height'] 		= '10000';
		$this->upload->initialize($config);
		$this->upload->do_upload('userProfile', $config);
		$upload_data 				= $this->upload->data();
		if ($upload_data['is_image'])
			{
				$userProfile 	= 'uploads/customerImage/' . $upload_data['file_name'];
			}
		  else
			{
				$userProfile 	= "uploads/main/noprifile.png";
			}
		$data = array(
			'userId' 			=> $this->input->post('userId') ,
			'firstName' 		=> $this->input->post('firstName') ,
			'lastName' 			=> $this->input->post('lastName') ,
			'userCountry' 		=> $this->input->post('userCountry') ,					
			'userState' 		=> $this->input->post('userState') ,
			'userCity' 			=> $this->input->post('userCity') ,
			'userDOB' 			=> $this->input->post('userDOB') ,
			'userProfession' 	=> $this->input->post('userProfession') ,
			'userInstitution' 	=> $this->input->post('userInstitution') ,
			'userProfile' 		=> $userProfile
		);
		$query = $this->UserRegistrationModel->userEditProfile($data);
		if ($query)
			{
				$result = array(
					'code' 		=> '201',
					'status' 	=> 'success',
					'message' 	=> "Customer profile have been Changed."
				);
				$data = array_merge($result, $query[0]);
				print_r(json_encode($data));
			}
		  else
			{
				$result = array(
					'code' 		=> '200',
					'status' 	=> 'failure',
					'message' 	=> "Invalid customer ID"
				);
				print_r(json_encode($result));
			}
	}
	function userResetPassword()
	{
		$data = array(
			'userEmail' 	=> $this->input->post('userEmail') ,
			'OTP' 			=> $this->input->post('OTP') ,
			'userPassword' 	=> $this->input->post('userPassword')
		);
		$query = $this->UserRegistrationModel->userResetPassword($data);
		if ($query == "Reset")
			{
				$result = array(
					'code' 		=> '201',
					'status' 	=> 'success',
					'message' 	=> "Password Reset Successfully"
				);
				print_r(json_encode($result));
			}
		  else
			{
				$result = array(
					'code' 		=> '200',
					'status' 	=> 'failure',
					'message' 	=> "Please enter valid pass code"
				);
				print_r(json_encode($result));
			}
	}
	function getUserProfession()
	{
		$query = $this->UserRegistrationModel->getUserProfession();
		if ($query)
			{
				$result = array(
					'code' 		=> '201',
					'status' 	=> 'success',
					'message' 	=> "User Profession found Successfully.",
					'data'		=> $query
				);
				print_r(json_encode($result));
			}
		  else
			{
				$result = array(
					'code' 		=> '200',
					'status' 	=> 'failure',
					'message' 	=> "User Profession not found."
				);
				print_r(json_encode($result));
			}
	}
	function getAllTopics()
	{
		$query = $this->UserRegistrationModel->getAllTopics();
		if ($query)
			{
				$result = array(
					'code' 		=> '201',
					'status' 	=> 'success',
					'message' 	=> "User Topics found Successfully.",
					'data'		=> $query
				);
				print_r(json_encode($result));
			}
		  else
			{
				$result = array(
					'code' 		=> '200',
					'status' 	=> 'failure',
					'message' 	=> "User Topics not found."
				);
				print_r(json_encode($result));
			}
	}
	
	function send_copyright() //for admin
	{
		$data = array(
			'user_id' 		=> $this->input->post('user_id'),
			'text' 		=> $this->input->post('text')
		);
		$query = $this->UserRegistrationModel->send_copyright($data);
		
		if(!empty($query))
		{
			 $userEmail = $query[0]['userEmail']; //gippus3244@gmail.com
			 $AppName 	= "gippus3244@gmail.com"; //testeweb121@gmail.com
			 $body 		= '
			 <html>
			 <body style="background-color:#F4F4F4;">
			 	<table style="max-width:500px;min-width:500px;margin:0 auto;background-color:#fff;text-align:center;">
			 		<tr>
			 			<td style="color:#696969;font-family:open sans;font-size:14px;padding:7px 0;text-align:left;
			 			padding-left:20px;padding-right:20px;padding-top:40px;">
			 				Hi Cavid
			 				
			 			</td>
			 		</tr>
			 		
			 		<tr>
			 			<td style="color:#696969;font-family:open sans;font-size:14px;padding:30px 0;
			 			text-align:left;padding-left:20px;padding-right:20px;">
			 				Message: ' . $data['text'] . '
			 			</td>
			 		</tr>
			 	
			 		<tr>
			 			<td style="color:#23A8E0;font-family:open sans;font-size:14px;padding:0;
			 			text-align:left;padding-left:20px;padding-right:20px;padding-bottom:40px;">
			 				Regards
			 			</td>
			 		</tr>
			 	</table>
			 </body>
			 </html>';
			 // >>>>>>>>>>>>>>Sending Mail<<<<<<<<<<<<
		 
			 $headers = "From: " . $userEmail . " \r\n";
			 $headers.= "MIME-Version: 1.0\r\n";
			 $headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			 $mail = @mail($AppName, "Copyright Claim Notice", $body, $headers);
			 if ($mail)
			 {
				  $result = array(
					 'code' 		=> '201',
					 'status' 	=> 'success',
					 'message' 	=> "Email sent successfully"
				  );
				  print_r(json_encode($result));
			 }
			 else
			 {
				 $result = array(
						 'code' 	=> '200',
						 'status' 	=> 'failure',
						 'message' 	=> 'Error in sending mail.'
					);
			 print_r(json_encode($result));
			 }
		}
		else
		{
			 $result = array(
							 'code' 	=> '200',
							 'status' 	=> 'failure',
							 'message' 	=> 'User not found.'
						 );
			 print_r(json_encode($result));
		}
	}
}
?>