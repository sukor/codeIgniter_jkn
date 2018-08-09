<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {



public function __construct(){

		parent::__construct();

		//	$this->output->cache(10);

		$statuslogin=$this->session->userdata('logged_in');
		if($statuslogin==1){

			}else{

					redirect('useracces/login');

			}



$this->lang->load('message', 'bahasa');
// $oops = $this->lang->line('message_key');


				
			}




}