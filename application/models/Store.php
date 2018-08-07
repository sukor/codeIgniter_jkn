<?php

class Store extends CI_Model{
	

	public function __construct(){

		parent::__construct();
	}


	public function get_store_list($value=''){

		$query=$this->db->get('city');
		$data=$query->result();
		return $data;

	}


	public function getList(){


		$this->db->select('city,c.country');
		$this->db->from('city ci');
		$this->db->join('country c', 'c.country_id = ci.country_id');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}

		//return $query->result(); //object
		//return $query->result_array(); //array
		// return $query->num_rows(); // number row
		// return $query->row(); // first row


	}




}