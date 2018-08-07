<?php

class Film extends CI_Model{
	

	public function __construct(){

		parent::__construct();
	}


	function get_list_film(){

		$this->db->select('ac.first_name,ac.last_name,group_concat(
			concat(fi.title,"|",fi.film_id)) as title,
			count(fi.title) as totalfilm');
		$this->db->from('film_actor fa');
		$this->db->join('actor ac',
		 'ac.actor_id = fa.actor_id',
		 'left');
		$this->db->join('film fi',
		 'fi.film_id = fa.film_id',
		 'right');

		$this->db->where('fi.language_id', 1);

		$language_idarray=[1,2,3];
		//$language_idarray=array(1,2,3);
		$this->db->where_in('fi.language_id', $language_idarray);

		$sqllike="( ac.first_name LIKE '%ed%' ESCAPE '!' OR ac.first_name LIKE '%sa%' ESCAPE '!')";


		$this->db->where($sqllike);
		// $this->db->like('ac.first_name','ed');
		// $this->db->or_like('ac.first_name','sa');

		$this->db->group_by('ac.first_name');

		$this->db->order_by('ac.first_name','desc');

		$this->db->order_by('totalfilm','desc');

	    $this->db->having('totalfilm >',50);




		$query = $this->db->get();



		if($query->num_rows() > 0){
			return $query->result();
		}


	}



	function get_detail_film($filmid){

		$this->db->select('group_concat(ac.first_name) as actorname,fi.*');
		$this->db->from('film_actor fa');
		$this->db->join('actor ac',
		 'ac.actor_id = fa.actor_id',
		 'left');
		$this->db->join('film fi',
		 'fi.film_id = fa.film_id',
		 'right');

		$this->db->where('fi.film_id', $filmid);

		$this->db->group_by('fi.film_id');

		$query = $this->db->get();



		if($query->num_rows() > 0){
			return $query->result();
		}


	}







}