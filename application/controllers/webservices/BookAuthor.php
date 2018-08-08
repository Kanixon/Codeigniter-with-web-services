<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BookAuthor extends CI_Controller
{
	function __construct()
	{
		 parent::__construct();
		 $this->load->model('webservices/BookAuthorModel');
		 $this->load->model('webservices/CommonFormate');
		 error_reporting(0);
	}
	function index()
	{
		 echo "sanyam singhal";
	}
	function fetch_article_data()
	{
		 $query = $this->BookAuthorModel->fetch_article_data();
		 if ($query)
		 {
			$result = array(
				'code' 		=> '201',
				'status' 	=> 'success',
				'message' 	=> "Article found Successfully.",
				'data'		=> $query
			);
			//$data = array_merge($result, $query[0]);
			print_r(json_encode($result));
		 }
		 else
		 {
			$result = array(
				'code' 		=> '200',
				'status' 	=> 'failure',
				'message' 	=> "Article not found."
			);
			print_r(json_encode($result));
		 }
	}
	
	function fetch_book_Author()
	{
		 $query = $this->BookAuthorModel->fetch_book_Author();
		 if ($query)
		 {
			$result = array(
				'code' 		=> '201',
				'status' 	=> 'success',
				'message' 	=> "Book found Successfully.",
				'data'		=> $query
			);
			//$data = array_merge($result, $query[0]);
			print_r(json_encode($result));
		 }
		 else
		 {
			$result = array(
				'code' 		=> '200',
				'status' 	=> 'failure',
				'message' 	=> "Book not found."
			);
			print_r(json_encode($result));
		 }
	}
}