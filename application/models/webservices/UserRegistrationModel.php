<?php
class UserRegistrationModel extends CI_Model
	{
	function __construct()
	{
		parent::__construct();
		//$this->load->model('webservices/CommonFormate');
		error_reporting(0);
	}
	function userRegistration($data)
	{		
		$this->db->insert('userRegistration', $data);
		$lastId = $this->db->insert_id();
		
		$this->db->select('*');
		$this->db->from('userRegistration ur');
		$this->db->join('userProfession up', 'up.profId = ur.userProfession');
		$this->db->where('userId', $lastId);
		$query = $this->db->get();
		return $query->result_array();
	}
	function userLogin($data)
	{
		 $userEmail = $data['userEmail'];
		 $userPassword = $data['userPassword'];
		 $userDeviceId = $data['userDeviceId'];			
         
		 $usrata 		= $this->CommonFormate->checkuserLogin($userEmail);
		 if($usrata[0]['is_Block']=='true')
		 {
		 	 return "block";
		 }
		 
		 $updateArry = array(
		 			'userDeviceId' => $userDeviceId
		 	);
		 $this->db->where('userEmail', $userEmail);
		 $this->db->update('userRegistration', $updateArry);
		 
		 $this->db->select('*');
		 $this->db->from('userRegistration ur');
		 $this->db->join('userProfession up', 'up.profId = ur.userProfession');
		 $this->db->where('userEmail', $userEmail);
		 $this->db->where('userPassword', $userPassword);
		 $query = $this->db->get();
		 return $query->result_array();
	}
	function userForgotPassword($userEmail, $code)
	{		
		$this->db->set('OTP', $code);
		$this->db->where('userEmail',$userEmail);
		$this->db->update('userRegistration');
		$afftectedRows = $this->db->affected_rows();
		if ($afftectedRows > 0)
			{
				return $afftectedRows;
			}
		  else
			{
				return False;
			}
	}
	function userChangePassword($data)
	{
		$userId 			= $data['userId'];
		$userOldPassword 	= $data['userOldPassword'];
		$userNewpassword 	= $data['userNewpassword'];
		$this->db->select('*');
		$this->db->from('userRegistration');
		$this->db->where('userPassword', $userOldPassword);
		$this->db->where('userId', $userId);
		$query = $this->db->get();
		$userData = $query->result_array();
		if (!empty($userData))
			{
				$updateArry = array(
					'userPassword' => $userNewpassword
				);
				$this->db->where('userId', $userId);
				$this->db->update('userRegistration', $updateArry);
				$this->db->select('*');
				$this->db->from('userRegistration');
				$this->db->where('userId', $userId);
				$query = $this->db->get();
				return $query->result_array();
			}
		  else
			{
				return false;
			}
	}

	function userEditProfile($data)
	{
		$userId 		= $data['userId'];
		$firstName 		= $data['firstName'];
		$lastName 		= $data['lastName'];
		$userCountry 	= $data['userCountry'];
		$userState 		= $data['userState'];
		$userCity 		= $data['userCity'];
		$userDOB 		= $data['userDOB'];
		$userProfile 	= $data['userProfile'];
		$userProfession 	= $data['userProfession'];
		$userInstitution 		= $data['userInstitution'];
		$this->db->select('*');
		$this->db->from('userRegistration');
		$this->db->where('userId', $userId);
		$query = $this->db->get();
		$userData = $query->result_array();
		if (!empty($userData))
			{
				if ($userProfile == "uploads/main/noprifile.png")
					{
						$updateArry = array(
							'firstName' 	=> $firstName,
							'lastName' 		=> $lastName,
							'userCountry'	=> $userCountry,
							'userState'		=> $userState,
							'userProfession' => $userProfession,
							'userCity'		=> $userCity,
							'userInstitution'=> $userInstitution,
							'userDOB'		=> $userDOB
						);
					}
				  else
					{
						$updateArry = array(
							'firstName' 	=> $firstName,
							'lastName' 		=> $lastName,
							'userCountry'	=> $userCountry,
							'userState'		=> $userState,
							'userCity'		=> $userCity,
							'userProfession'=> $userProfession,
							'userInstitution'=> $userInstitution,
							'userDOB'		=> $userDOB,
							'userProfile' 	=> $userProfile
						);
					}
				$this->db->where('userId', $userId);
				$this->db->update('userRegistration', $updateArry);
					$this->db->select('*');
					$this->db->from('userRegistration ur');
					$this->db->join('userProfession up', 'up.profId = ur.userProfession');
				$this->db->where('userId', $userId);
				$query = $this->db->get();
				return $query->result_array();
			}
		  else
			{
				return false;
			}
	}	
	function forgotFourDigitpin($custEmail, $code)
	{
		$where = "custEmail= '$custEmail'  OR custUserName='$custEmail'";
		$this->db->set('custOTP', $code);
		$this->db->where($where);
		$this->db->update('restaurantCustomer');
		$afftectedRows = $this->db->affected_rows();
		if ($afftectedRows > 0)
			{
				return $afftectedRows;
			}
		  else
			{
				return False;
			}
	}
	function userResetPassword($data)
	{
		$userEmail 		= $data['userEmail'];
		$OTP 			= $data['OTP'];
		$userPassword 	= $data['userPassword'];
		$this->db->select('*');
		$this->db->from('userRegistration');
		$this->db->where('userEmail', $userEmail);
		$this->db->where('OTP', $OTP);
		$query = $this->db->get();
		$userData = $query->result();
		if (!empty($userData))
			{
				$this->db->set('userPassword', $userPassword);
				$this->db->set('OTP', '');
				$this->db->where('userEmail', $userEmail);
				$this->db->update('userRegistration');
				$afftectedRows = $this->db->affected_rows();
				if ($afftectedRows > 0)
					{
						return "Reset";
					}
				  else
					{
						return false;
					}
			}
		  else
			{
				return "Hello";
			}
	}
	function forgotPasswordDetails($data)
	{
		$new_Pass = array(
			'custPassword' => $data['custPassword']
		);
		$this->db->where('custEmail', $data['custEmail']);
		$this->db->update('restaurantCustomer', $new_Pass);
		return $this->db->affected_rows();
	}
	function getUserProfession()
	{
		$this->db->select('*');
		$this->db->from('userProfession');				
		$query = $this->db->get();
		return $query->result_array();
	}
	function getAllTopics()
	{
		 $this->db->select('*');
		 $this->db->from('userTopic');				
		 $query = $this->db->get();
		 return $query->result_array();
	}
	function send_copyright($userId)
	{
		 $this->db->select('*');
		 $this->db->from('userRegistration');
		 $this->db->where('userId', $userId['user_id']);
		 $query = $this->db->get();
		 return $query->result_array();
	}
}
?>