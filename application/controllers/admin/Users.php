<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller
	{
	function __construct()
	{
		 parent::__construct();
		 $this->load->model('admin/Common_function');
		 $this->load->model('admin/UsersModel');
		 $this->load->model('admin/PushnotificationModel');
		 $this->load->library('session');
		 error_reporting(0);
		 if (!$this->session->userdata())
		 {
	  		 redirect('admin', 'refresh');
		 }
	}

	function userList()
	{
		 $Data['clientsData'] = $this->UsersModel->clienListing();
		 $header_value = array(
						'page_title' => 'User List',
						'nav' 		 => 'User'
						);
		 $this->load->view('admin/templates/header', $header_value);
		 $this->load->view('admin/userList', $Data);
		 $this->load->view('admin/templates/footer');
	}
	function userDelete($id)
	{
		 $data = $this->UsersModel->userDelete($id);
		 if ($data)
		 {
			 $this->session->set_flashdata("message_name", "<div id='request' style = 'color:red;font-size: 18px;font-family: bold;'>Data deleted Successfully !!</div>");
			 header("location:" . base_url() . "admin/clients-list");
		 }
	}
	function edit_Client($id)
	{		
				$header_value = array(
					'page_title' 	=> 'Update User',
					'nav' 			=> 'User'
				);
		if (isset($_POST['submit']))
		{
			 $userProfile1 = $_POST['userProfile'];
			 $config['upload_path'] 		= './uploads/customerImage/';
			 $config['allowed_types'] 	= '*';
			 $config['max_size'] 		= '0';
			 $config['max_width'] 		= '10000';
			 $config['max_height'] 		= '10000';
			 $this->upload->initialize($config);
			 $this->upload->do_upload('userProfile', $config);
			 $upload_data 				= $this->upload->data();
			 if ($upload_data['is_image'])
			 {
			 	 $userProfile = 'uploads/customerImage/' . $upload_data['file_name'];
			 }
			   else
			 {
			 	 $userProfile = $userProfile1;
			 }
			
			$data = array(
				'firstName' 	=> $this->input->post('firstName') ,
				'lastName' 		=> $this->input->post('lastName') ,
				'userEmail' 	=> $this->input->post('userEmail') ,
				'userDOB' 		=> $this->input->post('userDOB') ,
				'userProfile' 	=> $userProfile ,
				'userProfession' => $this->input->post('professionName') ,
				'userCity' 		=> $this->input->post('userCity') ,
				'userState' 	=> $this->input->post('userState') ,
				'userCountry' 	=> $this->input->post('userCountry')
			);
			//print_R($data); die;
			$data1['client_data'] = $this->UsersModel->update_client_query($id, $data);
			$data1['get_profession'] = $this->UsersModel->get_profession();
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;fontfamily: bold;'>Profile updated Successfully !!</div>");
			
			/* $this->load->view('admin/templates/header', $header_value);
			$this->load->view('admin/editUser', $data1);
			$this->load->view('admin/templates/footer'); */
			header("location:" . base_url() . "admin/clients-list");
		}
		else
		{
			$data['client_data'] 	= $this->UsersModel->edit_Client($id);
			$data['get_profession'] = $this->UsersModel->get_profession();
			
			$this->load->view('admin/templates/header', $header_value);
			$this->load->view('admin/editUser', $data);
			$this->load->view('admin/templates/footer');
		}
	}
	function userBlock($id)
	{
		$data = $this->UsersModel->userBlock($id);
		//print_R($data);die;
		if ($data == "false")
		{			
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:green;font-size: 18px;font-family: bold;'>You have unblocked the user..!!</div>");
			header("location:".base_url()."admin/clients-list");
		}
		else
		{
			$this->session->set_flashdata("message_name", "<div id='request' style = 'color:red;font-size: 18px;fon-family: bold;'>You have blocked the user...!!</div>");
			header("location:".base_url()."admin/clients-list");
		}
	}

	}
