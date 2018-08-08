<?php
class ArticlesModel extends CI_Model
{
	function __construct()
	{
		 parent::__construct();
	}
	function articles_listing()
	{
		 $this->db->select('*');
		 $this->db->from('articles ar');
		 $this->db->join('userTopic ut', 'ut.topicId = ar.topic_id');
		 $this->db->order_by("articles_id", "desc");
		 $query = $this->db->get();
		 return $query->result_array();
	}  
	function  add_article($data)
	{
		 $this->db->insert('articles',$data);
		 return;
	}
	function articleDelete($id)
	{
		 $this->db->where('articles_id', $id);
		 $this->db->delete('articles');
		 return true;
	}
	function edit_article($id)
	{
		 $this->db->select('*');
		 $this->db->from('articles');
		 $this->db->where('articles_id', $id);
		 $query = $this->db->get();
		 return $query->result_array();
	}
	function edit_article_query($data,$id)
	{
		 $this->db->where('articles_id', $id);
		 $this->db->update('articles',$data); 
		 
		 
		 $this->db->select('*');
		 $this->db->from('articles');
		 $this->db->where('articles_id', $id);
		 $query = $this->db->get();
		 return $query->result_array();
	}
}