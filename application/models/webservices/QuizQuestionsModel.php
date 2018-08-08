<?php
class QuizQuestionsModel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('webservices/CommonFormate');
			error_reporting(0);
		}
		function getAllQuestions($data)
		{
			//print_r($data);
			$topicId1 = '0'; 
			$this->db->select('*');
			$this->db->from('quizQuestion');
			$this->db->where('professionId', $data['professionId']);
			
			 $this->db->where('topicId', $data['topicId']);

			$this->db->or_where('topicId', 0);
			$this->db->order_by('rand()');				
			$query = $this->db->get();
			$quizQuestionData = $query->result_array();
			//print_r($quizQuestionData); die;
			$c = 1;
			foreach ($quizQuestionData as  $quizQuestion) 
			{
				//$a = $c++;
				$QuestionData =  $this->CommonFormate->getAnswer($quizQuestion['quesId']);
				//$ExplanationData =  $this->CommonFormate->getQuizExplanation($quizQuestion['quesId']);
				if($quizQuestion['quesId'] == $QuestionData[0]['quesIds'])
				{
					$quizQuestion['question_number']=$c++;
					$quizQuestion['Answer']=$QuestionData;				
					
				}
				else
				{
					$quizQuestion['Answer']=[];
				}
				
				/*if($quizQuestion['quesId'] ==$ExplanationData[0]['quesIds'])
				{
					$quizQuestion['Explanation']=$ExplanationData;
				}
				else
				{
					$quizQuestion['Explanation']=[];
				}*/
				$realData[]=$quizQuestion;
				
			}
			return $realData;
		}

	}