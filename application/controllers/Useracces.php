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



				$newdata = array(
				        'username'  => $usernamestatus->username,
				        'email'     => $usernamestatus->email,
				        'logged_in' => TRUE
				);


				

				$this->session->set_userdata($newdata);

				redirect('admin/staffAdmin');






							}else{

								redirect('useracces/login');
							}



					}else{

						redirect('useracces/login');
					}



				}



}


public function logout(){

	// $array_items = array('username', 'email','logged_in');

 //    $this->session->unset_userdata($array_items);

    $this->session->sess_destroy();

	//dprint($this->session->userdata);

	redirect('useracces/login');
}


}