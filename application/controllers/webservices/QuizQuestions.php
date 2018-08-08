<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class QuizQuestions extends CI_Controller
	{ 
	function __construct()
		{
			parent::__construct();
			$this->load->model('webservices/QuizQuestionsModel');
			$this->load->model('webservices/CommonFormate');
			error_reporting(0);
		}
	function index()
		{
			echo "Quiz Questions";
		}
	function getAllQuestions()
	{
		$data = array(
					'professionId' => $this->input->post('professionId') ,
					'topicId'      => $this->input->post('topicId') 
					);
		$query 		= $this->QuizQuestionsModel->getAllQuestions($data);
		if ($query)
			{
				$result 	= array(
						"response" => array(
							'code' => '201',
							'message' => "Questions list found Successfully.",
							'data' => $query
					)
				);
				print_r(json_encode($result));
			}
		  else
			{
				$result 	= array(
						"response" => array(
							'code' => '200',
							'message' => "Query fail"
					)
				);
				print_r(json_encode($result));
			}
	}
}