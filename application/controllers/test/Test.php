<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Test extends CI_Controller {



public function __construct(){

		parent::__construct();

		$this->load->model(['store'=>'sto','film']);

		
	}




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


	public function test42(){



	$d['content_main']=$this->load->view('viewtest/v_test3',$d,true);

		$this->load->view('template_main',$d);



	}



	public function test5(){



		// $this->load->model('store');

		$liststore=$this->sto->get_store_list('bolehkah');

		echo "<pre>";
		print_r($liststore);
		echo "</pre>";

	}



	public function test6(){

		$liststore=$this->sto->getList();

		echo "<pre>";
		print_r($liststore);
		echo "</pre>";
		$this->output->enable_profiler(TRUE);
	}



	public function test7(){

		$data=$this->film->get_list_film();

		$d['listfilm']=$data;
		// 	echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		$this->output->enable_profiler(TRUE);

	$d['content_main']=$this->load->view('film/v_listfilm',$d,true);

		$this->load->view('template_main',$d);

		
	}



	public function detailfilm($filmid){

		$data=$this->film->get_detail_film($filmid);


		//$dataactor=$this->film->get_actor($filmid);

		$d['detailfilm']=$data;
		//$d['dataactor']=$dataactor;
		// 	echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		//$this->output->enable_profiler(TRUE);

	$d['content_main']=$this->load->view('film/v_detailfilm',$d,true);

		$this->load->view('template_main',$d);

}









}