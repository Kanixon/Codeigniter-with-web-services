<?php
class PushnotificationModel extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
				error_reporting(0);
			}
		function send_notifications($device_token, $message, $userData = null)
		{
		
			//echo $device_token;echo "<br />";echo $message; echo "<br />"; print_r($userData);//die;
			$this->load->library('Apn_d');
			$this->apn_d->payloadMethod = 'enhance';
			// you can turn on this method for debuggin purpose
			$this->apn_d->connectToPush();
			// adding custom variables to the notification
			$this->apn_d->setData(array(
				'someKey' => true
			));
			$send_result 			=  $this->apn_d->sendMessage($device_token, $message, 2, 'default', $ids = array(
				 	'message' 		=> $userData['text'],
					'usersId'		=> $userData['usersId'],
					'dis_title'		=> $userData['dis_title'],
					'discussion_id'	=> $userData['dis_id'],
					'dis_text'		=> $userData['dis_text']
			));
			
			if ($send_result)
				{
					log_message('debug', 'Sending successful');
				}
			 else
			{
					print_r('error' . $this->apn_d->error);
					$this->apn_d->disconnectPush();
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
	}

?>