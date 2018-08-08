<?php
class BookModel extends CI_Model
{
	function __construct()
	{
	 	 parent::__construct();
	}
	function book_listing()
	{
		 $this->db->select('*');
		 $this->db->from('book');
		 $this->db->order_by("book_id", "Desc");
		 $query = $this->db->get();
		 $book_data = $query->result_array();
		 $all = array();
		 foreach($book_data as $book)
		 {
			 $book_id = $book['book_id'];
			 
			 $this->db->select('*');
			 $this->db->from('author');
			 $this->db->where('bookID', $book_id);
			 $query 		= $this->db->get();
			 $author_data 	= $query->result_array();
			 $book['author_data'] = $author_data;
			 $all[] = $book;
		 } 
		 // echo"<pre>"; print_r($all); echo"</pre>";
		 
		 return $all;
	}
	function bookDelete($id)
	{
		 $this->db->where('book_id', $id);
		 $this->db->delete('book');
		
		 $this->db->where('bookID', $id);
		 $this->db->delete('author');
		 return true;
	}
	function add_book($data)
	{
		 $book_name 	= $data['book_name'];
		 $author_name 	= $data['author_name'];
		 
		 $this->db->insert('book', array(
		 										'book_name' => $book_name
		 										));
		 $insertid = $this->db->insert_id();
		
			 foreach($author_name as $key => $author)
			 {
				 if(!empty($author))
				 {
					$this->db->insert('author', array(
													'bookID' 	  => $insertid,
													'author_name' => $author
												));
				 }
				 else
				 {
					  
				 }
			 }
		  
		 return true;
	}
	function update_book($id)
	{
		return $book_data = $this->fetch_book_author($id);
		 
	}
	function fetch_book_author($id)
	{
		 $this->db->select('*');
		 $this->db->from('book');
		 $this->db->where('book_id', $id);
		 $query = $this->db->get();
		 $book_data = $query->result_array();
		
		 foreach($book_data as $book)
		 {
			 $book_id = $book['book_id'];
			 
			 $this->db->select('*');
			 $this->db->from('author');
			 $this->db->where('bookID', $book_id);
			 $query 		= $this->db->get();
			 $author_data 	= $query->result_array();
			 $book['author_data'] = $author_data;
			 $all[] = $book;
		 } 
		 // echo"<pre>"; print_r($all); echo"</pre>";
		 return $all;
	}
	function update_book_query($data,$id)
	{
		 $book_name 	= $data['book_name'];
		 $author_name 	= $data['author_name'];
		  
		 $this->db->where('book_id', $id);
		 $this->db->update('book',
									array(
											'book_name' => $book_name
										));	
		 
		 $this->db->where('bookID', $id);
		 $this->db->delete('author');	
		 
		 
		 foreach($author_name as $key => $author)
		 {
				 if(!empty($author))
				 {
					 $this->db->insert('author', array(
		 										'bookID' 	  => $id,
		 										'author_name' => $author
		 									));
				 }
		 }
		 return $book_data = $this->fetch_book_author($id);
	}
}