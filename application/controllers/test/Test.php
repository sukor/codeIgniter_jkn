<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Test extends CI_Controller {


	public function index(){

		echo 'ini dalam folder test';
	}

	public function test2(){

		echo 'ini dalam folder test2';
	}


	public function test3(){

		$this->load->view('header');

		$this->load->view('viewtest/v_test3');

		$this->load->view('footer');


	}


	public function test4(){


	 $d['nama']='sukor bin muhammad';
	 $d['email']='sukor@test.com';
	 $d['nohp']=['018929101','0202020'];
	 $d['alamat']='melaka';



	$d['content_main']=$this->load->view('viewtest/v_test3',$d,true);

		$this->load->view('template_main',$d);

	}


}