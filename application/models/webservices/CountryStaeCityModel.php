<?php
class CountryStaeCityModel extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
				$this->load->model('webservices/CommonFormate');
				error_reporting(0);
			}
		function getCountryStaeCity()
			{
				$this->db->select('*');
				$this->db->from('countries');			
				$query = $this->db->get();
				$countriesData = $query->result_array();
				foreach ($countriesData as  $countries) 
				{
					$StateData = $this->CommonFormate->getStateData($countries['id']);
					if($countries['id'] == $StateData[0]['country_id'])
					{
						$countries['State']=$StateData;
					}
					else
					{
						$countries['State']=[];
					}
					$realData[]=$countries;
				}
				return $realData;
			}
		function getCountry()
			{
				$this->db->select('*');
				$this->db->from('countries');			
				$query = $this->db->get();
				return $query->result_array();
			}
		function getState($data)
			{
				$this->db->select('*');
				$this->db->from('states');
				$this->db->where('country_id', $data['country_id']);			
				$query = $this->db->get();
				return $query->result_array();
			}
		function getCity($data)
		{
			$this->db->select('*');
			$this->db->from('cities');
			$this->db->where('state_id',$data['state_id']);			
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>