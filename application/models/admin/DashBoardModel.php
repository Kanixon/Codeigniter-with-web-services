<?php
class DashBoardModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function users_count()
	{
		$this->db->select('*');
		$this->db->from('userRegistration');	
		$query = $this->db->get();
		$userData = $query->result_array();
		return $query->num_rows();	
	}
	function question_count()
	{
		 $this->db->select('*');
		 $this->db->from('quizQuestion');
		 $query = $this->db->get();
		 $userData = $query->result_array();
		 $result = $query->num_rows();
		return $result;
	}
	function article_count()
	{
		 $this->db->select('*');
		 $this->db->from('articles');
		 $query = $this->db->get();
		 $userData = $query->result_array();
		 $result = $query->num_rows();
		return $result;
	}
	function book_count()
	{
		 $this->db->select('*');
		 $this->db->from('book');
		 $query = $this->db->get();
		 $userData = $query->result_array();
		 $result = $query->num_rows();
		return $result;
	}		
}