<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Questions extends CI_Controller
{
	function __construct()
	{
		 parent::__construct();
		 $this->load->model('admin/QuestionsModel');
		 $this->load->library('session');
		 error_reporting(0);
		 if (!$this->session->userdata())
		 {
	  		 redirect('admin', 'refresh');
		 }
	}
	
	function questionList()
	{
		 $Data['questionListData'] = $this->QuestionsModel->questionList();			
		 $header_value = array(
		 	'page_title' => 'Question List',
		 	'nav' 		 => 'Question'
		 );
	     $this->load->view('admin/templates/header', $header_value);
	     $this->load->view('admin/questiontList', $Data);
	     $this->load->view('admin/templates/footer'); 
	}

	function addQuestion()
	{
	/* echo "<pre>";
		print_r($_POST);
		echo "</pre>";  */
		
		//1 Profession 		userProfession
		//2 Topic   		userTopic
		//3 Question test	quizQuestion test (userProfession, 	userTopic id
		//4 quizAnswer		(que id )
		if(isset($_POST['submit']))
		{
			 $config['upload_path'] 		= './uploads/questions/';
			 $config['allowed_types'] 	= '*';
			 $config['max_size'] 		= '0';
			 $config['max_width'] 		= '10000';
			 $config['max_height'] 		= '10000';
			 $this->upload->initialize($config);
			 $this->upload->do_upload('explanationImage', $config);
			 $upload_data 				= $this->upload->data();
			 if ($upload_data['is_image'])
			 {
			 	 $explanationImage = 'uploads/questions/' . $upload_data['file_name'];
			 }
			   else
			 {
			 	 $explanationImage = "uploads/main/noprifile.png";
			 }

			$data = array(
				'professionName' 		=> $this->input->post('professionName') ,
				'topicName' 			=> $this->input->post('topicName') ,
				'questionText' 			=> $this->input->post('questionText') ,
				'quizAnswer' 			=> $this->input->post('quizAnswer') ,
				'isCorrect' 			=> $this->input->post('isCorrect') ,
				'explanationImage' 		=> $explanationImage,
				'explanationText' 		=> $this->input->post('explanationText')
			);
			//print_R($data); die;
		     $data = $this->QuestionsModel->addQuestion($data);
		     $this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Question added Successfully !!</div>");
			 $header_value = array(
					'page_title' => 'Add Question',
					'nav'		 =>	'Question'
					);
			 $Data['get_profession'] 	= $this->QuestionsModel->get_profession();
			 $Data['get_topic'] 		= $this->QuestionsModel->get_topic();
			 $this->load->view('admin/templates/header',$header_value);
			 $this->load->view('admin/addQuestions',$Data);
			 $this->load->view('admin/templates/footer');
		}
		 else
		{
			$header_value = array(
				'page_title' => 'Add Question',
				'nav' 		 => 'Question'
			);
			$Data['get_profession'] = $this->QuestionsModel->get_profession();
			$Data['get_topic'] 		= $this->QuestionsModel->get_topic();
			$this->load->view('admin/templates/header', $header_value);
			$this->load->view('admin/addQuestions',$Data);
			$this->load->view('admin/templates/footer');
		}
	}
	function QuestionDelete($id)
	{
		 $data = $this->QuestionsModel->QuestionDelete($id);
		 if ($data)
		 {
			 $this->session->set_flashdata("message_name", "<div id='request' style = 'color:red;font-size: 18px;font-family: bold;'>Data deleted Successfully !!</div>");
			 header("location:" . base_url() . "admin/questiontList");
		 }
	}
	function edit_question($id)
	{
		
		 $header_value = array(
					'page_title' 	=> 'Update Question',
					'nav' 			=> 'Question'
				);
		 if (isset($_POST['submit']))
		 {
			  $explanationImage1 = $_POST['explanationImage'];
			 $config['upload_path'] 	= './uploads/questions/';
			 $config['allowed_types'] 	= '*';
			 $config['max_size'] 		= '0';
			 $config['max_width'] 		= '10000';
			 $config['max_height'] 		= '10000';
			 $this->upload->initialize($config);
			 $this->upload->do_upload('explanationImage', $config);
			 $upload_data 	= $this->upload->data();
			 if ($upload_data['is_image'])
			 {
			 	 $explanationImage = 'uploads/questions/' . $upload_data['file_name'];
			 }
			  else
			 {
			 	 $explanationImage = $explanationImage1;
			 }
				$ansId_hidden = $this->input->post('ansId_hidden');
			$data = array(
					'professionName' 		=> $this->input->post('professionName') ,
					'topicName' 			=> $this->input->post('topicName') ,
					'questionText' 			=> $this->input->post('questionText') ,
					'quizAnswer' 			=> $this->input->post('quizAnswer') ,
					'isCorrect' 			=> $this->input->post('isCorrect') ,
					'explanationImage' 		=> $explanationImage,
					'explanationText' 		=> $this->input->post('explanationText')
			 );
			
			$data1['question_data'] = $this->QuestionsModel->update_question_query($id, $data,$ansId_hidden);
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Data updated Successfully !!</div>");
			
			header("location:" . base_url() . "admin/questiontList");
			
			/* $data1['get_profession'] 		= $this->QuestionsModel->get_profession();
			$data1['get_topic'] 			= $this->QuestionsModel->get_topic();
			$this->load->view('admin/templates/header', $header_value);
			$this->load->view('admin/edit_question', $data1);
			$this->load->view('admin/templates/footer'); */
		 }
		else
		{
			$data['get_profession'] 	= $this->QuestionsModel->get_profession();
			$data['get_topic'] 			= $this->QuestionsModel->get_topic();
			$data['question_data'] 		= $this->QuestionsModel->edit_question($id);
			
		
			$this->load->view('admin/templates/header', $header_value);
			$this->load->view('admin/edit_question', $data);
			$this->load->view('admin/templates/footer');
		}
	}
}