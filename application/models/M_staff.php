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
			return $query->row();
		}


	}


	function get_list_staff($limit, $start){

		$this->db->select('*');
		$this->db->from('staff s');
		$this->db->limit($limit, $start);
	

	
		$query = $this->db->get();



		if($query->num_rows() > 0){
			return $query->result();
		}


	}
function get_total(){

		$this->db->select('*');
		$this->db->from('staff s');

	

	
		$query = $this->db->get();



		
			return $query->num_rows();
		


	}


function getstaff($start,$length,$search,$columns){

		$this->db->select('*');
		$this->db->from('staff s');
		$this->db->limit($length,$start);
		

		if(!empty($columns) &&  !empty($search['value'])){

		foreach ($columns as $row) {

			//	print_r($row['searchable']);
			

			if($row['searchable']=='true'){

				$this->db->or_like($row['name'],$search['value']);

			}
			# code...
		}

			
	}
	
	

	
		$query = $this->db->get();



		if($query->num_rows() > 0){
			return $query->result();
		}


	}




function check_username($username){

		$this->db->select('*');
		$this->db->from('staff s');
		
		$this->db->where('s.username', $username);

	
		$query = $this->db->get();



		if($query->num_rows() > 0){
			return $query->row();
		}


	}



}