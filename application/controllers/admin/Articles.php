<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Articles extends CI_Controller
{
	function __construct()
	{
		 parent::__construct();
		 $this->load->model('admin/ArticlesModel');
		 $this->load->model('admin/QuestionsModel');
		 $this->load->library('session');
		 error_reporting(-1);
		 if (!$this->session->userdata())
		 {
	  		 redirect('admin', 'refresh');
		 }
	}
	function index()
	{
		 echo "Sanyam Singahl";
	}
	function articles_listing()
	{
		 $Data['article_data'] = $this->ArticlesModel->articles_listing();			
		 $header_value = array(
							'page_title' => 'Article List',
							'nav' 		 => 'Article'
						 );
	     $this->load->view('admin/templates/header', $header_value);
	     $this->load->view('admin/article_list', $Data);
	     $this->load->view('admin/templates/footer'); 
	}
	
	function add_article()
	{
		$header_value = array(
						'page_title' => 'Add Article',
						'nav'		 =>	'Article'
					);

		if(isset($_POST['submit']))
		{
			 $config['upload_path'] 		= './uploads/article/';
			 $config['allowed_types'] 	= 'pdf';
			 $config['max_size'] 		= '0';
			 $config['max_width'] 		= '10000';
			 $config['max_height'] 		= '10000';
			 $this->upload->initialize($config);
			 $this->upload->do_upload('articles_image', $config);
			 $upload_data 				= $this->upload->data();

			 if ($upload_data['client_name'])
			 {
			 	 $articles_image = 'uploads/article/' . $upload_data['file_name'];
			 }
			   else
			 {
			 	 $articles_image = "uploads/main/noprifile.png";
			 }

			$data = array(
							'title' 			=> $this->input->post('title') ,
							'topic_id' 			=> $this->input->post('topicName'),
							'articles_image' 	=> $articles_image
						   );
			//print_R($data); die;
		     $data = $this->ArticlesModel->add_article($data);
		     $this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Article added Successfully !!</div>");

			 $Data['get_topic'] 		= $this->QuestionsModel->get_topic();
			 $this->load->view('admin/templates/header',$header_value);
			 $this->load->view('admin/addArticle',$Data);
			 $this->load->view('admin/templates/footer');
		}
		 else
		{
			 $Data['get_topic'] 		= $this->QuestionsModel->get_topic();
			 $this->load->view('admin/templates/header',$header_value);
			 $this->load->view('admin/addArticle',$Data);
			 $this->load->view('admin/templates/footer');
		}
	}
	function articleDelete($id)
	{
		 $data = $this->ArticlesModel->articleDelete($id);
		 if ($data)
		 {
			 $this->session->set_flashdata("message_name", "<div id='request' style = 'color:red;font-size: 18px;font-family: bold;'>Article deleted Successfully !!</div>");
			 header("location:" . base_url() . "admin/articles-List");
		 }
	}
	function edit_article($id)
	{
		 $header_value = array(
						'page_title' => 'Update Article',
						'nav'		 =>	'Article'
					);
		 if(isset($_POST['submit']))
		 {
			 $articles_image1 = $_POST['articles_image'];
			 $config['upload_path'] 		= './uploads/article/';
			 $config['allowed_types'] 	= 'pdf';
			 $config['max_size'] 		= '0';
			 $config['max_width'] 		= '10000';
			 $config['max_height'] 		= '10000';
			 $this->upload->initialize($config);
			 $this->upload->do_upload('articles_image', $config);
			 $upload_data 				= $this->upload->data();
			 if ($upload_data['client_name'])
			 {
			 	 $articles_image = 'uploads/article/' . $upload_data['file_name'];
			 }
			   else
			 {
			 	 $articles_image = $articles_image1;
			 }
			$data = array(
							'title' 			=> $this->input->post('title') ,
							'topic_id' 			=> $this->input->post('topicName'),
							'articles_image' 	=> $articles_image
						   );
				//print_R($data); die;
		     $data['article_data'] = $this->ArticlesModel->edit_article_query($data,$id);
			 $data['get_topic']    = $this->QuestionsModel->get_topic();
			 
		     $this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Article Updated Successfully !!</div>");
				header("location:" . base_url() . "admin/articles-List");
			 /* $this->load->view('admin/templates/header',$header_value);
			 $this->load->view('admin/edit_article',$data);
			 $this->load->view('admin/templates/footer'); */
		 }
		 else
		 {
			 $data['article_data'] = $this->ArticlesModel->edit_article($id);
			 $data['get_topic']    = $this->QuestionsModel->get_topic();
			 $this->load->view('admin/templates/header', $header_value);
			 $this->load->view('admin/edit_article',$data);
			 $this->load->view('admin/templates/footer');
		 }
	}
}