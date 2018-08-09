<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useracces extends CI_Controller {



public function __construct(){

		parent::__construct();

		$this->load->model(['M_staff']);
		
	}



public function login(){


	dprint($_POST);


		$this->load->view('useracces/login');



}





}