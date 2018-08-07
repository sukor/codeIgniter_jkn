<?php

class M_staff extends CI_Model{
	

	public function __construct(){

		parent::__construct();
	}



function get_detail_staff($staff_id){

		$this->db->select('*');
		$this->db->from('staff s');
		
		$this->db->where('s.staff_id', $staff_id);

	
		$query = $this->db->get();



		if($query->num_rows() > 0){
			return $query->result();
		}


	}


}