<?php
class QuestionsModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function questionList()
	{
		$this->db->select('*');
		$this->db->from('quizQuestion qz');
		$this->db->join('userProfession up', 'up.profId = qz.professionId');
		$this->db->order_by("quesId", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_profession()
	{
		 $this->db->select('*');
		 $this->db->from('userProfession');
		 $query = $this->db->get();
		 return $query->result_array();
	}

	function get_topic()
	{
		 $this->db->select('*');
		 $this->db->from('userTopic');
		 $query = $this->db->get();
		 return $query->result_array();
	}

	function addQuestion($data)
	{
		 $professionName 	= $data['professionName'];
		 $topicName 		= $data['topicName']; /* question option */
		 $questionText 		= $data['questionText'];
		 $explanationImage 	= $data['explanationImage'];
		 $explanationText 	= $data['explanationText'];
		 $quizAnswer 		= $data['quizAnswer']; /* question option */
		 $isCorrect 		= $data['isCorrect'][0];

		 
		 foreach($professionName as $pro_id)
		 {
			$this->db->insert('quizQuestion', array(
		 										'professionId' 		=> $pro_id,
		 										'topicId' 			=> $topicName,
		 										'questionText' 		=> $questionText,
		 										'explanationText' 	=> $explanationText,
		 										'explanationImage' 	=> $explanationImage
		 										));
			 $insertid = $this->db->insert_id();
			 
			 foreach($quizAnswer as $key => $quiz)
			 {
				 if(!empty($quiz))
				 {
					if ($key == $isCorrect) //$isCorrect value compare with $quizAnswer key
					{
						$quizAnswer_data = array(
												'quesIds' 		=> $insertid,
												'quizAnswer' 	=> $quiz,
												'isCorrect' 	=> 'true'
											);
					}
					 else
					{
							$quizAnswer_data = array(
										'quesIds'	 => $insertid,
										'quizAnswer' => $quiz,
										'isCorrect'  => 'false'
										);
					}
					$this->db->insert('quizAnswer', $quizAnswer_data);
				 }
			 }
		 }
		 
	}
	function QuestionDelete($id)
	{
		 $this->db->where('quesId', $id);
		 $this->db->delete('quizQuestion');
		 
		 $this->db->where('quesIds', $id);
		 $this->db->delete('quizAnswer');
		 return true;
	}

	function fetch_question_data($id)
	{
		 $this->db->select('*');
		 $this->db->from('quizQuestion qz');
		 $this->db->join('userProfession up', 'up.profId = qz.professionId');
		 $this->db->join('userTopic ut', 'ut.topicId = qz.topicId','left');
		 $this->db->where('quesId', $id);
		 $query = $this->db->get();
		 $queData = $query->result_array();
		 foreach($queData as $que)
		 	{
		 		 $this->db->select('*');
		 		 $this->db->from('quizAnswer');
		 		 $this->db->where('quesIds', $que['quesId']);
		 		 $query 		= $this->db->get();
		 		 $optionData = $query->result_array();
		 		 $que['option_data'] = $optionData;
		 		 $all[] 		= $que;
		 	}
		 return $all;
	}
	function edit_question($id)
	{
	 	 return $Que_data = $this->fetch_question_data($id);
	}
	function update_question_query($id, $data, $ansId_hidden)
	{
		$isCorrect 	= $data['isCorrect'][0];
		$quizAnswer = $data['quizAnswer'];			
		$this->db->where('quesId', $id);
		$this->db->update('quizQuestion', array(
											'professionId' 		=> $data['professionName'],
											'topicId' 			=> $data['topicName'],
											'questionText' 		=> $data['questionText'],
											'explanationImage' 	=> $data['explanationImage'],
											'explanationText' 	=> $data['explanationText']
										)); 
										
		$this->db->where('quesIds', $id);
		$this->db->delete('quizAnswer');
		
		foreach($quizAnswer as $key => $qAns)
		{
			if(!empty($qAns))
			 {
				if ($key == $isCorrect)
				{
					$this->db->insert('quizAnswer', array(
														'quizAnswer' 	=> $qAns,
														'quesIds' 		=> $id,
														'isCorrect' 	=> 'true'
														));
				}
				else
				{
					$this->db->insert('quizAnswer', array(
													'quizAnswer' 	=> $qAns,
													'quesIds' 		=> $id,
													'isCorrect' 	=> 'false'
													));
				}
			 }
		}
		return $Que_data = $this->fetch_question_data($id);
	}
}