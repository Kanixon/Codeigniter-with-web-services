<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CountryStateCity extends CI_Controller
	{
	function __construct()
		{
			parent::__construct();
			$this->load->model('webservices/CountryStaeCityModel');
			$this->load->model('webservices/CommonFormate');
			error_reporting(0);
		}
	function index()
		{
			echo "Manish Kumar Pathak";
		}
	function getCountryStaeCity()
		{
			$query 		= $this->CountryStaeCityModel->getCountryStaeCity();
			if ($query)
				{
					$result 	= array(
							"response" => array(
								'code' => '201',
								'message' => "Countries list found Successfully.",
								'data' => $query
						)
					);
					print_r(json_encode($result));
				}
			  else
				{
					$result 	= array(
							"response" => array(
								'code' => '200',
								'message' => "Query fail"
						)
					);
					print_r(json_encode($result));
				}
		}
	function getCountry()
		{
			$query 		= $this->CountryStaeCityModel->getCountry();
			if ($query)
				{
					$result 	= array(
							"response" => array(
								'code' => '201',
								'message' => "Countries list found Successfully.",
								'data' => $query
						)
					);
					print_r(json_encode($result));
				}
			  else
				{
					$result 	= array(
							"response" => array(
								'code' => '200',
								'message' => "Query fail"
						)
					);
					print_r(json_encode($result));
				}
		}
	function getState()
		{
			$data = array(
				'country_id' => $this->input->post('country_id') 
			);
			$query 		= $this->CountryStaeCityModel->getState($data);
			if ($query)
				{
					$result 	= array(
							"response" => array(
								'code' => '201',
								'message' => "State list found Successfully.",
								'data' => $query
						)
					);
					print_r(json_encode($result));
				}
			  else
				{
					$result 	= array(
							"response" => array(
								'code' => '200',
								'message' => "Query fail"
						)
					);
					print_r(json_encode($result));
				}
		}
	function getCity()
		{
			$data = array(
				'state_id' => $this->input->post('state_id') 
			);
			$query 		= $this->CountryStaeCityModel->getCity($data);
			if ($query)
				{
					$result 	= array(
							"response" => array(
								'code' => '201',
								'message' => "City list found Successfully.",
								'data' => $query
						)
					);
					print_r(json_encode($result));
				}
			  else
				{
					$result 	= array(
							"response" => array(
								'code' => '200',
								'message' => "Query fail"
						)
					);
					print_r(json_encode($result));
				}
		}
	}
?>