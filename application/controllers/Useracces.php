<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useracces extends CI_Controller {



public function __construct(){

		parent::__construct();

		$this->load->model(['M_staff']);
		
	}



public function login(){


	$this->form_validation->set_rules('password', 'password', 'required');
	$this->form_validation->set_rules('username', 'Usernama', 'required');


	$this->form_validation->set_message('required', 'Sila isi %s');


			if ($this->form_validation->run() == FALSE)
                {


					$this->load->view('useracces/login');
				}else{


					$username=$this->input->post('username');
					$password=$this->input->post('password');

					$usernamestatus=$this->M_staff->check_username($username);

					if(!empty($usernamestatus)){

							$statusverify=password_verify($password,$usernamestatus->password);


							if($statusverify){

								echo "Betul";

							}else{

								echo "salah";
							}





					}










				}



}





}