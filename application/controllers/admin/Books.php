<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Books extends CI_Controller
{
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->model('admin/BookModel');
		 $this->load->library('session');
		 error_reporting(-1);
		 if(!$this->session->userdata())
		 {
			 redirect('admin','refresh');
		 }
	 }
	 function index()
	 {
		 echo "heloo";
	 }
	 function book_listing()
	 {
		  $Data['book_data'] = $this->BookModel->book_listing();
		  $header_value = array(
							'page_title' => 'Books List',
							'nav' 		 => 'Books'
						  );
          $this->load->view('admin/templates/header', $header_value);
          $this->load->view('admin/book_list', $Data);
          $this->load->view('admin/templates/footer');
	 }
	 function bookDelete($id)
	 {
		 $data = $this->BookModel->bookDelete($id);
		 if ($data)
		 {
			 $this->session->set_flashdata("message_name", "<div id='request' style = 'color:red;font-size: 18px;font-family: bold;'>Data deleted Successfully !!</div>");
			 header("location:" . base_url() . "admin/book-list");
		 }
	 }
	 function add_book()
	 {
		 $header_value = array(
				'page_title' => 'Add Books',
				'nav' 		 => 'Books'
				);
		 if(isset($_POST['submit']))
		 {
			 $data = array(
					'book_name' 		=> $this->input->post('book_name') ,
					'author_name' 		=> $this->input->post('author_name')
				);
			
		     $data = $this->BookModel->add_book($data);
		     $this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Books added Successfully !!</div>");
	
			 $this->load->view('admin/templates/header',$header_value);
			 $this->load->view('admin/addBook');
			 $this->load->view('admin/templates/footer');
		 }
		 else
		 {

			$this->load->view('admin/templates/header', $header_value);
			$this->load->view('admin/addBook');
			$this->load->view('admin/templates/footer');
		 }
	 }
	 function edit_book($id)
	 {
		  $header_value = array(
				'page_title' => 'Update Books',
				'nav' 		 => 'Books'
				);
		 if(isset($_POST['submit']))
		 {
			 $data = array(
					'book_name' 		=> $this->input->post('book_name') ,
					'author_name' 		=> $this->input->post('author_name')
				);
		     $data1['book_data'] = $this->BookModel->update_book_query($data,$id);
		     $this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Data Updated Successfully !!</div>");
				header("location:" . base_url() . "admin/book-list");
			 /* $this->load->view('admin/templates/header',$header_value);
			 $this->load->view('admin/edit_book',$data1);
			 $this->load->view('admin/templates/footer'); */
		 }
		 else
		 {
			$data2['book_data'] = $this->BookModel->update_book($id);
			$this->load->view('admin/templates/header', $header_value);
			$this->load->view('admin/edit_book',$data2);
			$this->load->view('admin/templates/footer');
		 }
	 }
}