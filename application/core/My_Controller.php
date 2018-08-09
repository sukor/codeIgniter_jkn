<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class My_Controller extends CI_Controller {



public function __construct(){

		parent::__construct();

				
		$statuslogin=$this->session->userdata('logged_in');
		if($statuslogin==1){

			}else{

					redirect('useracces/login');

			}


				
			}

}