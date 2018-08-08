<?php
	class Common_function extends CI_Model
	{
		function __construct()
		{
			parent::__construct();			
			$this->load->model('admin/PushnotificationModel'); //
		}		


	}