<?php
class PushnotificationModel extends CI_Model

	{
	function __construct()
		{
			parent::__construct();
			error_reporting(0);
		}
		
		function bullet_silent_notiication($device_token, $message, $userData)
		{
			//echo $device_token;echo "<br />";echo $message; echo "<br />"; print_r($userData);die;
			
			$this->load->library('Apn');
			$this->apn->payloadMethod = 'enhance';
			// you can turn on this method for debuggin purpose
			$this->apn->connectToPush();
			// adding custom variables to the notification
			$this->apn->setData(array(
				'someKey' => true
			));
			// $send_result = $this->apn->sendMessage($device_token, $message, 2, 'default');
			$send_result 	=  $this->apn->sendMessage($device_token, $message, 2, 'default', $ids = array(
							
							'type' 				=> $userData['type'],
							'total_bullet'		=>$userData['total_bullet']
							));
			//$send_result = $this->apn->sendMessage($device_token, '', '', '',1, '' , $expiry = '', $newstand = false); // silent notification
			if ($send_result)
				{
					log_message('debug', 'Sending successful');
				}
			  else
				{
					print_r('error' . $this->apn->error);
					$this->apn->disconnectPush();
					print_r($send_result);
				}
		}
	/*function send_notifications($device_token, $message, $userData)
		{
			//echo $device_token;echo "<br />";echo $message; echo "<br />"; print_r($userData);die;
			$this->load->library('Apn');
			$this->apn->payloadMethod = 'enhance';
			// you can turn on this method for debuggin purpose
			$this->apn->connectToPush();
			// adding custom variables to the notification
			$this->apn->setData(array(
				'someKey' => true
			));
			// $send_result = $this->apn->sendMessage($device_token, $message, 2, 'default');
			$send_result 			=  $this->apn->sendMessage($device_token, $message, 2, 'default', $ids = array(
				 	'users_id' 			=> $userData['users_id'],
					'FirstName'			=> $userData['FirstName'],
					'LastName'			=> $userData['LastName'],
					'username'			=> $userData['username'],
					'post_id'			=> $userData['post_id'],
					'title'				=> $userData['title'],
					'addsImage'			=> $userData['addsImage'],					
					'profileImage'		=> $userData['profileImage'],			
					'time' 				=> $userData['time'],
					'timeZone' 			=> $userData['timeZone'],
					's_msg' 			=> $userData['s_msg'],
					'isNewEntry'		=> $userData['isNewEntry'],
					'type' 				=> $userData['type'] 
			));
			
			if ($send_result)
				{
					log_message('debug', 'Sending successful');
				}
			  else
				{
					print_r('error' . $this->apn->error);
					$this->apn->disconnectPush();
					print_r($send_result);
				}
		}*/
	function userDeleteNotification($device_token, $message, $userData)
	{
	//	echo $device_token;echo "<br />";echo $message; echo "<br />"; print_r($userData);die;
			$this->load->library('Apn');
			$this->apn->payloadMethod = 'enhance';
			$this->apn->connectToPush();
			$this->apn->setData(array(
				'someKey' => true
			));
			// $send_result = $this->apn->sendMessage($device_token, $message, 2, 'default');
			$send_result 			=  $this->apn->sendMessage($device_token, $message, 2, 'default', $ids = array(
				 	'users_id' 			=> $userData['users_id'],
				 	'type' 				=> $userData['type'] 
			));
			
			if ($send_result)
				{
					log_message('debug', 'Sending successful');
				}
			  else
				{
					print_r('error' . $this->apn->error);
					$this->apn->disconnectPush();
					print_r($send_result);
				}
	}

	function apn_feedback()
		{
		$this->load->library('apn');
		$unactive = $this->apn->getFeedbackTokens();
		if (!count($unactive))
			{
			log_message('info', 'Feedback: No devices found. Stopping.');
			return false;
			}

		foreach($unactive as $u)
			{
			$devices_tokens[] = $u['devtoken'];
			}
		}
	function send_gcm($device_token, $message)
		{
		// echo $device_token;print_r($message);die;
		// simple loading
		// note: you have to specify API key in config before
		$this->load->library('gcm');
		$this->gcm->setMessage($message);
		// add recepient or few
		$this->gcm->addRecepient($device_token);
		/* $this->gcm->addRecepient('New reg id');//set additional data
		$this->gcm->setData(array('some_key' => 'some_val'));*/
		// also you can add time to live
		$this->gcm->setTtl(500);
		// and unset in further
		$this->gcm->setTtl(false);
		// set group for messages if needed
		$this->gcm->setGroup('Test');
		// or set to default
		$this->gcm->setGroup(false);
		// then send
		$this->gcm->send();
		
			/*
			// code for check gcm message
			if ($this->gcm->send())
			{
			echo 'Success for all messages';
			}
			else
			{
			echo 'Some messages have errors';
			}
			// and see responses for more info
			print_r($this->gcm->status);
			print_r($this->gcm->messagesStatuses);
			die(' Worked.');
			*/
		}
	}

?>