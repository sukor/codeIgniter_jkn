<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {



	public function index()
	{
		echo "hello world";
	}


	public function test(){

		echo "ini test";
	}

//  ini function test

	public function test1($d='tiada value',$inivalue2){

		echo $d;
		echo "<br>";
		echo $inivalue2;

	}



}
