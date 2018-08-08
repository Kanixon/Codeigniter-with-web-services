<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Common_function');
		$this->load->model('admin/DashBoardModel');
		$this->load->library('session');
		error_reporting(0);
		if (!$this->session->userdata())
			{
				redirect('admin', 'refresh');
			}
	}
	function dashboardPage()
	{
		$Data['users_count'] 	= $this->DashBoardModel->users_count();
		$Data['question_count'] = $this->DashBoardModel->question_count();
		$Data['article_count'] 	= $this->DashBoardModel->article_count();
		$Data['book_count'] 	= $this->DashBoardModel->book_count();
		$header_value = array(
			'page_title' 	=> 'Dashboard',
			'nav' 			=> 'dashboard'
			);
		$this->load->view('admin/templates/header', $header_value);
		//$this->load->view('admin/adminDashboard');			
		$this->load->view('admin/adminDashboard',$Data);
		 $this->load->view('admin/templates/footer');
	}

}
?>