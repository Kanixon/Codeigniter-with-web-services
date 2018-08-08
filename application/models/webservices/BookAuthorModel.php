<?php
class BookAuthorModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('webservices/CommonFormate');
		error_reporting(-1);
	}
	function fetch_article_data()
	{
		 $this->db->select('*');
		 $this->db->from('articles');
		 //$this->db->order_by('rand()');
		 $query = $this->db->get();
		 return $query->result_array();
	}
	function fetch_book_Author()
	{
		 $this->db->select('*');
		 $this->db->from('book');
		 $query 	= $this->db->get();
		 $book_data = $query->result_array();
		 foreach($book_data as $book)
		 {
			 $this->db->select('*');
			 $this->db->from('author');
			 $this->db->where('bookID',$book['book_id']);
			 $query 	= $this->db->get();
			 $book_data = $query->result_array();
			 if(!empty($book_data))
			 {
				 $book['author_data'] = $book_data;
			 }
			 else
			 {
				 $book['author_data'] = [];
			 }
			 $all[] = $book;
		 }
		 return $all;
	}
}